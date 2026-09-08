<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes', compact('notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Note::create($request->all());
        return redirect()->back();
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back();
    }
}