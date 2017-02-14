@extends('layouts.app')

@section('content')
    <form method="post" action="/auth/{{ $provider }}/register">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <img class="img-thumbnail float-left" src="{{ $data->avatar }}">
            </div>
            <div class="card-block">
                <div class="form-group">
                    <label for="name" class="col-md-4 form-control-label">Name</label>
                    <input class="form-control" type="text" readonly name="name" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>
                    <input class="form-control" type="text" readonly name="email" value="{{ $data->email }}">
                </div>

                <div class="form-group">
                    <label for="username" class="col-md-4 form-control-label">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Nombre de usuario">
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Registrarse</button>
            </div>
        </div>
    </form>
@endsection