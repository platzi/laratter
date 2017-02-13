@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-block">
            <img class="img-thumbnail float-left mr-2" src="{{ $user->avatar or asset('default-avatar.png') }}">
            <h1 class="card-title">{{ $user->name }}</h1>
            <h2 class="card-subtitle">{{ '@'.$user->username }}</h2>
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