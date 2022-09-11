<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Govt Job'],
            ['name' => 'Private Job'],
            [
                'name' => 'PSSC',
                'parent_id' => 1
            ],
            [
                'name' => 'FPSC',
                'parent_id' => 1
            ],
            [
                'name' => 'SPSC',
                'parent_id' => 1
            ],
            [
                'name' => 'WAPDA',
                'parent_id' => 1
            ],
            [
                'name' => 'Sui Gas',
                'parent_id' => 1
            ],
            [
                'name' => 'Bank Job',
                'parent_id' => 2
            ],
            [
                'name' => 'Patrolium',
                'parent_id' => 2
            ],
            [
                'name' => 'IT Sector',
                'parent_id' => 2
            ],
            [
                'name' => 'Engineering',
                'parent_id' => 2
            ],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
