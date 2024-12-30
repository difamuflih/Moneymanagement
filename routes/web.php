<?php

use App\Http\Controllers\moneyPerson;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

// Route::get('/person', function () {
//     return view('person');
// });

Route::get('/person', [moneyPerson::class, 'index'])->name('views.person.index'); 
Route::post('/person', [moneyPerson::class, 'hitung'])->name('views.person.hitung');


Route::get('/team', function () {
    return view('team');
});
