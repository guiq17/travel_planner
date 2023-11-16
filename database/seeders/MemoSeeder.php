<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Memo;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Memo::create([
            'travel_id' => 1,
            'note' => '旅行の計画を立てる前のワクワク感がたまりません！どんな素敵な場所に行こうか考えるのが楽しみです。',
        ]);
        Memo::create([
            'travel_id' => 2,
            'note' => '次の旅行に備えて、持ち物リストやアクティビティのリサーチを進め中。楽しい冒険が待っていることを予感しています。',
        ]);
    }
}
