<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Level 1
        $electronics = Category::create(['name' => 'Electronics']);
        $fashion     = Category::create(['name' => 'Fashion']);

        // Level 2
        $mobiles  = Category::create(['name' => 'Mobiles', 'parent_id' => $electronics->id]);
        $laptops  = Category::create(['name' => 'Laptops', 'parent_id' => $electronics->id]);

        $men     = Category::create(['name' => 'Men', 'parent_id' => $fashion->id]);
        $women   = Category::create(['name' => 'Women', 'parent_id' => $fashion->id]);

        // Level 3
        Category::create(['name' => 'Android', 'parent_id' => $mobiles->id]);
        Category::create(['name' => 'iPhone', 'parent_id' => $mobiles->id]);

        Category::create(['name' => 'Gaming Laptops', 'parent_id' => $laptops->id]);
        Category::create(['name' => 'Business Laptops', 'parent_id' => $laptops->id]);

        Category::create(['name' => 'Shirts', 'parent_id' => $men->id]);
        Category::create(['name' => 'Jeans', 'parent_id' => $men->id]);

        Category::create(['name' => 'Dresses', 'parent_id' => $women->id]);
        Category::create(['name' => 'Handbags', 'parent_id' => $women->id]);
    }
}
