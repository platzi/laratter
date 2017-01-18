@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Laravel en Platzi
    </div>
    <p style="font-size: 2rem">
        por
        @if(isset($twitter))
            <a href="https://twitter.com/{{ $twitter }}">
                {{ $teacher }}
            </a>
        @else
            {{ $teacher }}
        @endif
    </p>
    <div class="links">
        @foreach ($temas as $tema)
            <a href="https://laravel.com">{{ $tema }}</a>
        @endforeach
    </div>
@endsection
