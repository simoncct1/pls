<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Input;
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
Route::post('/user/{id}', 'App\Http\Controllers\ProfileController@update');
Route::post('/user/badgesite/{id}', 'App\Http\Controllers\ProfileController@badgesite');

require __DIR__.'/auth.php';
