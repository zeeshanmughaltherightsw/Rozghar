<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name();
        return [
            'title' => $title,
            'blog_category_id' => mt_rand(1,24),
            'slug' => Str::slug($title),
            'short_description' => $this->faker->realText(),
            'description' => $this->faker->realText(2000, 2),
        ];

    }
}
