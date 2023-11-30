<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'travel_id' => 1,
            'date' => '2023-11-16',
            'start_time' => '10:00',
            'end_time' => '12:00',
            'event' => '観光',
            'url' => 'https://example.com',
        ]);
        Schedule::create([
            'travel_id' => 1,
            'date' => '2023-11-16',
            'start_time' => '13:00',
            'end_time' => '15:00',
            'event' => '昼食',
            'url' => 'https://example.com',
        ]);
        Schedule::create([
            'travel_id' => 2,
            'date' => '2023-11-19',
            'start_time' => '10:00',
            'end_time' => '12:00',
            'event' => '観光',
            'url' => 'https://example.com',
        ]);
        Schedule::create([
            'travel_id' => 2,
            'date' => '2023-11-19',
            'start_time' => '13:00',
            'end_time' => '15:00',
            'event' => '昼食',
            'url' => 'https://example.com',
        ]);
    }
}
