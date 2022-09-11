<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Country::create([
            'name' => 'Pakistan',
            'sign' => 'PK',
            'status' => 'active'
        ]);

        $this->call([
            // BlogCategorySeeder::class,
            UserSeeder::class,
            // CategorySeeder::class,
            CitySeeder::class,
        ]);

        // Post::factory(50)->create();
        // BlogPost::factory(50)->create();
    }
}
