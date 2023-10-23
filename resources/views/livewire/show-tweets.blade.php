<div>
    <h1>Tweets</h1>

    @foreach($tweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content }} ({{ $tweet->created_at }})</p>
    @endforeach
</div>
