<?php

use App\Http\Controllers\moneyPerson;
use App\Http\Controllers\moneyTeam;
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

Route::get('person', [moneyPerson::class, 'index'])->name('views.person.index'); 
Route::post('person/hitung', [moneyPerson::class, 'hitung'])->name('views.person.hitung');
Route::post('person/prepare', [moneyPerson::class, 'prepare'])->name('views.person.prepare');

Route::get('team', [moneyTeam::class, 'index'])->name('views.team.index'); 
Route::post('team/hitung', [moneyTeam::class, 'hitung'])->name('views.team.hitung');
Route::post('team/prepare', [moneyTeam::class, 'prepare'])->name('views.team.prepare');


