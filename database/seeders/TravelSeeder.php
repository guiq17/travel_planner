<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Travel::create([
            'user_id' => 1,
            'title' => '旅行1',
            'start_date' => '2023-11-16',
            'end_date' => '2023-11-18',
        ]);
        Travel::create([
            'user_id' => 2,
            'title' => '旅行2',
            'start_date' => '2023-11-19',
            'end_date' => '2023-11-21',
        ]);
    }
}
