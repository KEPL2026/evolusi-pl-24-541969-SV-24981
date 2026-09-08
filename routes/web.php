<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index']);
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');