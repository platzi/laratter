@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">Resultados para <em>"{{ request('query') }}"</em></div>
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