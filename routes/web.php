<?php

use App\Livewire\ShowTweets;
use App\Livewire\User\UploadProfilePhoto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tweets');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/upload-photo', UploadProfilePhoto::class);
    });
    Route::get('/tweets', ShowTweets::class);


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
