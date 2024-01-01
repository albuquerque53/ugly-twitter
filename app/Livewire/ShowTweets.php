<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public string $content = '';

    protected array $rules = [
        'content' => 'required|string|min:2|max:255',
    ];

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $tweets = Tweet::with('user')
            ->latest()
            ->paginate(10);

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
        $tweet->user_id = auth()->user()->id;

        $tweet->save();

        $this->resetFields();
    }

    public function likeTweet(Tweet $tweet): void
    {
        if ($tweet->hasLike()) {
            return;
        }

        $like = new Like;

        $like->tweet_id = $tweet->id;
        $like->user_id = auth()->user()->id;

        $like->save();
    }

    public function unlikeTweet(Tweet $tweet): void
    {
        if (! $tweet->hasLike()) {
            return;
        }

        Like::query()
            ->where([
                'tweet_id' => $tweet->id,
                'user_id' => auth()->user()->id,
            ])
            ->delete();
    }

    private function resetFields(): void
    {
        $this->content = '';
    }
}
