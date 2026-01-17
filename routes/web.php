<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Students;

// Home page route
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/', Students::class);

// Update student route
Route::get('/edit/{student_id}', [Students::class, 'edit'])->name('layout.edit');
