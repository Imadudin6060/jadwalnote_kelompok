<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Models\Note;

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
    Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::patch('/notes/{id}/toggle', [NoteController::class, 'toggle'])->name('notes.toggle');
    Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy'); // ✅ Tambahkan ini!

    Route::get('/calendar', function () {
        return view('calender');
    })->name('calendar');

    Route::get('/calendar-events', function () {
        try {
            $userId = auth()->id();

            $events = Note::where('user_id', $userId)
                ->whereNotNull('schedule_date')
                ->get()
                ->map(fn ($note) => [
                    'title' => $note->title,
                    'start' => $note->schedule_date,
                ]);

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('calendar.events');

    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__ . '/auth.php';
