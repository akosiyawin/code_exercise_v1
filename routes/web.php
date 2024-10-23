<?php

use App\Livewire\Counter;
use App\Livewire\Opportunities;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/counter', Counter::class);
Route::get('/opportunities', Opportunities::class);