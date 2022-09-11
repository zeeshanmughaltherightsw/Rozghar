<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCategories = [
            ['name' => 'Entertainment'],
            ['name' => 'Technology'],
            ['name' => 'Sports'],
            ['name' => 'Health'],
            [
                'name' => 'People',
                'parent_id' => 1
            ],
            [
                'name' => 'Hollywood Life',
                'parent_id' => 1
            ],
            [
                'name' => 'Film for Fun',
                'parent_id' => 1
            ],
            [
                'name' => 'Drama Serial',
                'parent_id' => 1
            ],
            [
                'name' => 'Social Media',
                'parent_id' => 1
            ],
            [
                'name' => 'Computer World',
                'parent_id' => 2
            ],
            [
                'name' => 'Android Central',
                'parent_id' => 2
            ],
            [
                'name' => 'Information Technology',
                'parent_id' => 2
            ],
            [
                'name' => 'Artificial Intelligence',
                'parent_id' => 2
            ],
            [
                'name' => 'High-Tech-News',
                'parent_id' => 2
            ],
            [
                'name' => 'Cricket',
                'parent_id' => 3
            ],
            [
                'name' => 'Hockey',
                'parent_id' => 3
            ],
            [
                'name' => 'Football',
                'parent_id' => 3
            ],
            [
                'name' => 'Tennis',
                'parent_id' => 3
            ],
            [
                'name' => 'Basketball',
                'parent_id' => 3
            ],
            [
                'name' => 'Healthy Habits',
                'parent_id' => 4
            ],
            [
                'name' => 'Weaknesses and Strengths',
                'parent_id' => 4
            ],
            [
                'name' => 'Bone Care',
                'parent_id' => 4
            ],
            [
                'name' => 'Infectious Diseases',
                'parent_id' => 4
            ],
            [
                'name' => 'Medical',
                'parent_id' => 4
            ],
        ];

        foreach($blogCategories as $category){
            BlogCategory::create($category);
        }
    }
}
