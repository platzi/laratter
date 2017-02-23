<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laratter') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="container" id="app">
        <div class="jumbotron" style="text-align: center">
            <h1 class="display-3">Laratter</h1>
            @include('sections.nav')
        </div>
        @if(Auth::check())
            <div class="row">
                <div class="col-8 offset-md-2">
                    <form action="/messages/create" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group @if($errors->has('message')) has-danger @endif">
                            <textarea name="message" class="form-control" placeholder="Qué estás pensando?" value="{{ old('message') }}" rows="3"></textarea>
                            @if($errors->has('message'))
                                @foreach($errors->get('message') as $error)
                                    <div class="form-control-feedback ml-2">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('image')) has-danger @endif">
                            <label for="image" class="form-control-label">
                                Imagen
                            </label>
                            <input type="file" name="image" class="form-control-file">
                            @if($errors->has('image'))
                                @foreach($errors->get('image') as $error)
                                    <div class="form-control-feedback ml-2">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@show
</body>
</html>
