<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Note::create([
            'user_id' => 1,
            'title' => 'Catatan Laravel',
            'content' => 'Laravel itu powerful banget! Jangan lupa artisan migrate.'
        ]);
    }
}
