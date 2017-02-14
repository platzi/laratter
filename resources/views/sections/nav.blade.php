<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laratter') }}</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}" href="/contact-us">Contact us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 @if($errors->any()) has-danger @endif" action="/messages">
            <div class="input-group my-2 my-sm-0">
                <input type="text" name="query" class="form-control" placeholder="Buscar..." value="{{ request('query') }}">
                <span class="input-group-btn">
                    <button class="btn btn-outline-success" type="submit">🔍</button>
                </span>
            </div>
            @if($errors->has('query'))
                @foreach($errors->get('query') as $error)
                    <div class="form-control-feedback ml-2">{{ $error }}</div>
                @endforeach
            @endif
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link {{ Request::is('/login') ? 'active' : '' }}" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('/register') ? 'active' : '' }}" href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
