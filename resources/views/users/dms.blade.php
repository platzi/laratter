@extends('layouts.app')

@section('content')
    <h1>Conversación con <a href="/{{ $user->username }}">{{ $user->name }}</a></h1>
    <form class="form-inline mt-2" action="/{{ $user->username }}/dms" method="post">
        {{ csrf_field() }}
        <input class="form-control" type="text" name="message" placeholder="Mensaje privado...">
        <button type="submit" class="btn btn-outline-primary">Enviar</button>
    </form>
    @foreach($conversation->privateMessages as $message)
        <div class="card mb-2">
            <div class="card-block">
                <h2 class="h5 mr-auto text-info">
                    {{ $message->user->name }} dijo...
                </h2>
                <p>{{ $message->message }}</p>
                <p class="float-right text-muted">{{ $message->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
@endsection