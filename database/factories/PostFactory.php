<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=fake()->sentence(3);
        return [
            'category_id'=>fake()->numberBetween(1,4),
            'title'=>$title,
            'image'=>fake()->imageUrl(600,300,'cats'),
            'description'=>fake()->text(),
            'hit'=>0,
            'slug'=>Str::slug($title),
            'created_at'=>fake()->dateTimeThisDecade()
        ];
    }
    protected $model = Post::class;
}
