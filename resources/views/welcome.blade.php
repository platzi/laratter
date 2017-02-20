@extends('layouts.app')

@section('content')
<div class="title m-b-md">
    Laratter, by <a href="https://platzi.com">Platzi
    </a>
</div>

@if (isset($teacher))
<p>Profesor: {{ $teacher }}</p>
@else
<p>Profesor a definir</p>
@endif

<div class="links">
    @foreach ($links as $link => $text)
    <a href="{{ $link }}">{{ $text }}</a>
    @endforeach
</div>
@endsection
