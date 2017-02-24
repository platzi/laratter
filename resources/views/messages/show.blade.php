@extends('layouts.app')

@section('content')
<h1 class="h3">Mensaje id: {{ $message->id }}</h1>
@include('messages.message')

<responses :message="{{ $message->id }}"></responses>
@endsection