@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Login</h2>
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
