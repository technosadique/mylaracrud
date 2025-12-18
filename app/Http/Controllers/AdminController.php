<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {  
        return view('admin.dashboard');
    }

    public function users()
    {  
        $users = User::all();
        return view('admin.users', compact('users'));
    }
	
	public function categories()
	{   	$categories = Category::whereNull('parent_id')
			->with('children')
			->get();
			
			
			$allcategories=Category::get();

		return view('admin.categories.index',['categories'=>$categories,'allcategories'=>$allcategories]);
	}
	
	public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',['categories'=>$categories]);
    }
	
	public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Category created');
    }
	
	public function edit($id)
    {
        $category   = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();

        return view('admin.categories.edit', compact('category','categories'));
    }
	public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name'      => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Category updated successfully');
    }
	
	public function destroy($id)
	{
		$category = Category::with('children')->findOrFail($id);

		$this->deleteRecursive($category);

		return redirect()->route('admin.categories')
			->with('success', 'Category and subcategories deleted.');
	}

	private function deleteRecursive($category)
	{
		foreach ($category->children as $child) {
			$this->deleteRecursive($child);
		}
		$category->delete();
	}

	

}

