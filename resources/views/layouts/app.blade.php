<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel en Platzi</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="jumbotron" style="text-align: center">
        <h1 class="display-3">Laratter</h1>
        <p>
            @include('sections.nav')
        </p>
        <p>
            <form action="/messages/create" method="POST">
                {{ csrf_field() }}
                <div class="form-group @if($errors->any()) has-danger @endif">
                    <input type="text" name="message" class="form-control" placeholder="Qué estás pensando?" value="{{ old('message') }}">
                    @if($errors->has('message'))
                        @foreach($errors->get('message') as $error)
                            <div class="form-control-feedback text-left">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </form>
        </p>
    </div>
    @yield('content')
</div>

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@show
</body>
</html>
