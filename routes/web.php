<?php

use App\Livewire\ShowTweets;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tweets');
});

Route::get('/tweets', ShowTweets::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
