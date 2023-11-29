<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SouvenirCategoryList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SouvenirCategoryListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SouvenirCategoryList::create([
            'name' => '自分用',
        ]);
        SouvenirCategoryList::create([
            'name' => '家族用',
        ]);
        SouvenirCategoryList::create([
            'name' => '友達用',
        ]);
        SouvenirCategoryList::create([
            'name' => '職場用',
        ]);
    }
}
