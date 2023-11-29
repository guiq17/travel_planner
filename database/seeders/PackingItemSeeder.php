<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackingItem;

class PackingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackingItem::create([
            'packing_category_id' => 1,
            'name' => '現金',
        ]);
        PackingItem::create([
            'packing_category_id' => 1,
            'name' => 'クレジットカード',
        ]);
        PackingItem::create([
            'packing_category_id' => 2,
            'name' => '航空券',
        ]);
        PackingItem::create([
            'packing_category_id' => 2,
            'name' => 'JRパス',
        ]);
        PackingItem::create([
            'packing_category_id' => 3,
            'name' => 'カメラ',
        ]);
        PackingItem::create([
            'packing_category_id' => 3,
            'name' => 'スマホ',
        ]);
        PackingItem::create([
            'packing_category_id' => 4,
            'name' => 'シャンプー',
        ]);
        PackingItem::create([
            'packing_category_id' => 4,
            'name' => 'ボディソープ',
        ]);
        PackingItem::create([
            'packing_category_id' => 5,
            'name' => 'Tシャツ',
        ]);
        PackingItem::create([
            'packing_category_id' => 5,
            'name' => '靴下',
        ]);
        PackingItem::create([
            'packing_category_id' => 6,
            'name' => '本',
        ]);
    }
}
