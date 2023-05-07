<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['About','Career','Vision','Mission'];
        $count=0;
        foreach($pages as $page){
            $count++;
            $data=[
                'title'=>$page,
                'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                Odio quae ullam atque ex amet quos quod tenetur et,
                                perferendis veritatis mollitia doloremque impedit culpa accusamus aspernatur 
                                Odio quae ullam atque ex amet quos quod tenetur et,
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                consequatur sapiente soluta recusandae.perferendis veritatis mollitia doloremque 
                                impedit culpa accusamus aspernatur 
                                Odio quae ullam atque ex amet quos quod tenetur et,',
                'image'=>'front/images/Page.png',
                'order'=>$count,
                'slug'=>Str::slug($page)
            ];
            Page::create($data);
        }
    }
}
