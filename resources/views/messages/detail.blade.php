<div class="card">
    <img class="card-img-top" src="{{ $message->image or asset('images/default.png') }}" alt="{{ $message->content }}">
    <div class="card-block">
        <h2 class="h4 card-title">
            <a href="/{{ $message->user->username }}">{{ $message->user->name }}</a>
        </h2>
        <p class="card-text">
            {{ $message->content }}
        </p>
        <small class="card-subtitle text-muted float-right">{{ $message->created_at->diffForHumans() }}</small>
    </div>
    <div class="card-footer">
        <a class="card-link" href="/messages/{{ $message->id }}">Leer más</a>
    </div>
</div>