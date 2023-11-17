<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SouvenirItem;

class SouvenirItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SouvenirItem::create([
            'souvenir_category_id' => 1,
            'name' => 'お土産1',
            'quantity' => 1,
            'price' => 1000,
        ]);
        SouvenirItem::create([
            'souvenir_category_id' => 2,
            'name' => 'お土産2',
            'quantity' => 2,
            'price' => 2000,
        ]);
        SouvenirItem::create([
            'souvenir_category_id' => 3,
            'name' => 'お土産3',
            'quantity' => 3,
            'price' => 3000,
        ]);
        SouvenirItem::create([
            'souvenir_category_id' => 4,
            'name' => 'お土産4',
            'quantity' => 4,
            'price' => 4000,
        ]);
    }
}
