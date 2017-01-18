@extends('layouts.app')

@section('content')
    <img class="img-thumbnail" src="{{ $message->image }}" alt="{{ $message->content }}">
    <p class="card-text">
        {{ $message->content }}
    </p>
@endsection