<?php

namespace Database\Factories;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'category_id' => mt_rand(1,2),
            'salary' => mt_rand(20000, 50000),
            'education' => 'BS',
            'vacancy' => mt_rand(1,5),
            'city_id' => mt_rand(1 , 4),
            'note' => $this->faker->realText(),
            'description' => $this->faker->realText(2000, 2),
            'last_date' => Carbon::now()->addDays(5)
        ];
    }
}
