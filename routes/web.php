<?php

use App\Livewire\ShowTweets;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tweets');
});

Route::get('/tweets', ShowTweets::class);
