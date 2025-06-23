<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Note;

Route::middleware('auth:sanctum')->get('/calendar-events', function (Request $request) {
    try {
        $userId = $request->user()->id;

        // Ambil hanya catatan milik user yang login dan punya schedule_date
        $notes = Note::where('user_id', $userId)
                    ->whereNotNull('schedule_date')
                    ->get()
                    ->map(function ($note) {
                        return [
                            'title' => $note->title,
                            'start' => $note->schedule_date,
                        ];
                    });

        return response()->json($notes);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
