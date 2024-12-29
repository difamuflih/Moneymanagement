<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/person', function () {
    return view('person');
});

Route::get('/team', function () {
    return view('team');
});
