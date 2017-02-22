<div class="card">
    <img class="card-img-top" src="{{ $message->image or asset('images/default.png') }}" alt="{{ $message->content }}">
    <div class="card-block">
        <h2 class="h4 card-title">
            <a href="/{{ $message->parent ? $message->parent->user->username : $message->user->username }}">
                {{ $message->parent ? $message->parent->user->name : $message->user->name }}
            </a>
        </h2>
        @if ($message->parent)
            <h6 class="card-subtitle text-muted mb-2">
                <em>Reposteado por <a href="/{{ $message->user->username }}">{{ '@'.$message->user->username }}</a></em>
            </h6>
        @endif
        <p class="card-text">
            {{ $message->content }}
        </p>
        <small class="card-subtitle text-muted float-right">{{ $message->created_at->diffForHumans() }}</small>
    </div>
    <div class="card-footer d-flex">
        <a class="card-link" href="/messages/{{ $message->id }}">Leer más</a>
        <div class="ml-auto">
            <message-interactions
                :message="{{ $message->id }}"
                :liked="{{ json_encode($message->isLikedBy(auth()->user())) }}"
                :reposted="{{ json_encode($message->isRepostedBy(auth()->user())) }}"
            ></message-interactions>
        </div>
    </div>
</div>