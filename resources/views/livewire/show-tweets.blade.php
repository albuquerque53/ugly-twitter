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
        <p>{{ $tweet->user->name }} - {{ $tweet->content }} ({{ $tweet->created_at }})</p>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
