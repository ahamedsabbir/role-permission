<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'elctronic',
                'slug' => 'elctronic',
                'status' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'fashion',
                'slug' => 'fashion',
                'status' => 'active',
            ],
            [
                'id' => 3,
                'name' => 'furniture',
                'slug' => 'furniture',
                'status' => 'active',
            ],
            [
                'id' => 4,
                'name' => 'grocery',
                'slug' => 'grocery',
                'status' => 'active',
            ],
            [
                'id' => 5,
                'name' => 'sports',
                'slug' => 'sports',
                'status' => 'active',
            ]
        ]);
    }
}
