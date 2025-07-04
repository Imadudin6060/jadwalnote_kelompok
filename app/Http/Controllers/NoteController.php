<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $activeNotes = Note::where('user_id', $userId)
            ->where('is_done', false)
            ->orderBy('schedule_date', 'asc')
            ->get();

        $archivedNotes = Note::where('user_id', $userId)
            ->where('is_done', true)
            ->orderBy('schedule_date', 'asc')
            ->get();

        return view('notes.index', compact('activeNotes', 'archivedNotes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'schedule_date' => 'required|date',
        ]);

        Note::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'schedule_date' => $validated['schedule_date'],
            'is_done' => false,
        ]);

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil disimpan!');
    }

    public function toggle($id)
    {
        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        $note->is_done = !$note->is_done;
        $note->save();

        return redirect()->back()->with('success', 'Status catatan berhasil diperbarui!');
    }

    public function edit($id)
    {
        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'schedule_date' => 'required|date',
        ]);

        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dihapus!');
    }
}
