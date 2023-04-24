<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Category1','Category2','Category3','Category4'];
        foreach($categories as $category){
            $data=[
                'name'=>$category,
                'slug'=>Str::slug($category)
            ];
            Category::create($data);
        }
            
    }
}
