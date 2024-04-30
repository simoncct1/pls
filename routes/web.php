<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');

require __DIR__.'/auth.php';
