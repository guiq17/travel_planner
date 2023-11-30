<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackingCategory;

class PackingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackingCategory::create([
            'name' => '貴重品',
        ]);
        PackingCategory::create([
            'name' => '交通',
        ]);
        PackingCategory::create([
            'name' => '記録媒体',
        ]);
        PackingCategory::create([
            'name' => '洗面用具',
        ]);
        PackingCategory::create([
            'name' => '衣類',
        ]);
        PackingCategory::create([
            'name' => 'その他',
        ]);
    }
}
