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
                @include('messages.detail')
            </div>
        @empty
            <div class="col-12">
                Oops! No hay mensajes :-(
            </div>
        @endforelse
        @if(count($messages))
            {{ $messages->links('pagination::simple-bootstrap-4') }}
        @endif
    </div>
@endsection