@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Laravel en Platzi</h1>
        </div>
    </div>
    <div class="row">
        @forelse($messages as $message)
            <div class="col-6 col-lg-3">
                <img class="img-thumbnail" src="{{ $message->image }}" alt="{{ $message->content }}">
                <p class="card-text">
                    {{ $message->content }}
                    <a href="/messages/{{ $message->id }}">Leer más</a>
                </p>
            </div>
        @empty
            <div class="col-12">
                Oops! No hay mensajes :-(
            </div>
        @endforelse
    </div>
@endsection