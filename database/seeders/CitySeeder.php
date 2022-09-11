<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Sukkur',
                'country_id' => 1,
                'status' => 'active' 
            ],
            [
                'name' => 'Karachi',
                'country_id' => 1,
                'status' => 'active' 
            ],
            [
                'name' => 'Islamabad',
                'country_id' => 1,
                'status' => 'active' 
            ],
            [
                'name' => 'Lahore',
                'country_id' => 1,
                'status' => 'active' 
            ],
        ];

        City::insert($cities);
    }
}
