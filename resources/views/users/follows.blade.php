@extends('layouts.app')

@section('content')
@foreach($user->follows as $follow)
<li>{{ $follow->username }}</li>
@endforeach
@endsection