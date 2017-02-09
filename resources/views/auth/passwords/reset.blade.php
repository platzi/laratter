@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Reset Password</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
