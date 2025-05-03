<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CarWizard;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/auto-toevoegen', CarWizard::class)->middleware(['auth', 'role:aanbieder'])->name('car.create');
Route::middleware('auth')->group(function () {
    //
});

require __DIR__.'/auth.php';
