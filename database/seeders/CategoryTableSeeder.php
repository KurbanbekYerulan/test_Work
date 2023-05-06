<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'title'=>'Научная фантастика',
                'slug'=> 'Научная фантастика'
            ],
            [
                'title'=>'Фэнтези',
                'slug'=> 'Фэнтези'
            ],
            [
                'title'=>'Романы',
                'slug'=> 'Романы'
            ],
            [
                'title'=>'Историческое',
                'slug'=> 'Историческое'
            ],
            [
                'title'=>'Детективы',
                'slug'=> 'Детективы'
            ],
        ];
        Category::insert($roles);
    }
}
