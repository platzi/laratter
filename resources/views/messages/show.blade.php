@extends('layouts.app')

@section('content')
    <img class="img-thumbnail" src="{{ $message->image ?? asset('images/default.png') }}" alt="{{ $message->content }}">
    <p class="card-text">
        {{ $message->content }}
    </p>
@endsection