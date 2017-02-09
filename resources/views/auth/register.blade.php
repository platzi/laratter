@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Register</h2>
        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label for="name" class="col-md-4 form-control-label">Name</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <strong class="form-control-feedback">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <label for="username" class="col-md-4 form-control-label">Username</label>

                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' form-control-danger' : '' }}" name="username" value="{{ old('username') }}" required>
                </div>

                @if ($errors->has('username'))
                    <strong class="form-control-feedback">{{ $errors->first('username') }}</strong>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <strong class="form-control-feedback">{{ $errors->first('email') }}</strong>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <label for="password" class="col-md-4 form-control-label">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <strong class="form-control-feedback">{{ $errors->first('password') }}</strong>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <label for="password-confirm" class="col-md-4 form-control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
