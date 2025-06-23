<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Tampilkan semua catatan milik user yang login
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->get();
        return view('notes.index', compact('notes'));
    }

    // Tampilkan form untuk buat catatan baru
    public function create()
    {
        return view('notes.create');
    }

    // Simpan catatan baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'schedule_date' => 'required|date',
        ]);

        Note::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'schedule_date' => $validated['schedule_date'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Catatan berhasil disimpan!');
    }
}
