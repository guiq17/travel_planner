<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TravelSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(PackingCategorySeeder::class);
        $this->call(PackingItemSeeder::class);
        $this->call(SouvenirCategorySeeder::class);
        $this->call(SouvenirItemSeeder::class);
        $this->call(MemoSeeder::class);
    }
}
