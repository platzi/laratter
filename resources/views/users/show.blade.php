@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-block">
            <img class="img-thumbnail float-left mr-2" src="{{ $user->avatar or asset('default-avatar.png') }}">
            <h1 class="card-title">{{ $user->name }}</h1>
            <h2 class="card-subtitle">{{ '@'.$user->username }}</h2>
            @if(Gate::allows('dm', $user))
                <form class="form-inline mt-2" action="/{{ $user->username }}/dms" method="post">
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="message" placeholder="Mensaje privado...">
                    <button type="submit" class="btn btn-outline-primary">Enviar</button>
                </form>
            @endif
        </div>
        <div class="card-footer">
            <p>Follows: {{ $user->follows->count() }}</p>
            <p>Followers: {{ $user->followers->count() }}</p>
            @if($user->isFollowedBy(auth()->user()))
            <form action="/{{ $user->username }}" method="POST">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <button class="btn btn-danger">Unfollow</button>
            </form>
            @else
            <form action="/{{ $user->username }}" method="POST">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <button class="btn btn-primary">Follow</button>
            </form>
            @endif
        </div>
    </div>
    <div class="row">
    @foreach ($user->messages as $message)
        <div class="col-4">
            @include('messages.detail')
        </div>
    @endforeach
    </div>
@endsection