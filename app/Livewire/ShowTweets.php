<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public string $content = '';

    protected $rules = [
        'content' => 'required|string|min:2|max:255',
    ];

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $tweets = Tweet::with('user')->get();

        return view(
            view: 'livewire.show-tweets',
            data: [
                'tweets' => $tweets,
            ]
        );
    }

    public function tweet(): void
    {
        $this->validate();

        $tweet = new Tweet();

        $tweet->content = $this->content;
        $tweet->user_id = 1;

        $tweet->save();

        $this->content = '';
    }
}
