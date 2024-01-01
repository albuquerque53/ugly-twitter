<div>
    <h1>Tweets</h1>

    <form method="post" wire:submit.prevent="tweet">
        <label for="content">Tweet something!</label>
        <input type="text" name="content" id="content" wire:model="content">

        @error('content')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit">
            Tweet!
        </button>
    </form>

    @foreach($tweets as $tweet)
        <div class="flex">

            <div class="w-2/8">
                @if ($tweet->user->profilePhoto)
                    <img src="{{ url("storage/{$tweet->user->profilePhoto}") }}" alt="profile-photo" width="75" height="75"/>
                @else
                    <img src="{{ url('imgs/no-image.png') }}" alt="profile-photo" width="75" height="75"/>
                @endif

                {{ $tweet->user->name }} at {{ $tweet->created_at }}
            </div>


            <div class="w-6/8">
                <p>{{ $tweet->content }} </p>

                @if ($tweet->hasLike())
                    <a href="#" wire:click="unlikeTweet({{ $tweet }})">Unlike</a>
                @else
                    <a href="#" wire:click="likeTweet({{ $tweet }})">Like</a>
                @endif
            </div>

        </div>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
