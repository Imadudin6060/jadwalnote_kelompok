<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Note;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');


    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');


    Route::get('/calendar-events', function () {
        try {
            $userId = auth()->id();

            $events = Note::where('user_id', $userId)
                ->whereNotNull('schedule_date')
                ->get()
                ->map(function ($note) {
                    return [
                        'title' => $note->title,
                        'start' => $note->schedule_date,
                    ];
                });

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('calendar.events');
});

require __DIR__.'/auth.php';
