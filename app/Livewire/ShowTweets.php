<?php

namespace App\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('livewire.show-tweets');
    }
}
