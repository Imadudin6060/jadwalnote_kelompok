<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'user_id' => 1,
            'title' => 'Kuliah Pemrograman',
            'description' => 'Belajar Laravel dan database',
            'date' => now()->addDay()->format('Y-m-d'),
            'start_time' => '08:00',
            'end_time' => '10:00',
            'location' => 'Zoom',
            'is_online' => true
        ]);
    }
}
