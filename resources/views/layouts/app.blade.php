<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NotesSharing</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:grey">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @if(Auth::check())
                    <a class="navbar-brand" href="{{ url('/') }}">
                        NotesSharing
                    </a>
                @else
                    <a class="navbar-brand">
                        NotesSharing
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex">
        @if (Auth::check())
        <div class="col-2 p-1 pt-4">
            <div class="text-white bg-dark card p-2">
                <hr>
                    <div class="card m-2">
                        <a class="btn btn-dark col-12" href="{{ route('notes.index') }}">Notes</a>
                    </div>
                    <div class="card m-2">
                        <a class="btn btn-dark col-12" href="{{ route('friends.index') }}">Friends</a>
                    </div>
                    <div class="card m-2">
                        <a class="btn btn-dark col-12 p-2" href="{{ route('friend_requests.index') }}">Friend Requests</a>  
                    </div>
                    @if(Auth::user()->id === 1)
                    <div class="card m-2">
                        <a class="btn btn-warning col-12 p-2" href="#">Users</a>  
                    </div>
                    <div class="card m-2">
                        <a class="btn btn-warning col-12 p-2" href="{{ route('join_requests.index') }}">Join Requests</a>  
                    </div>
                    @endif
                <hr>
                <div class="card m-2 mb-0">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            <img src="{{ asset('storage/default_profile.png') }}" class="rounded-circle img-fluid" style="width: 100px;">
                        </div>
                        <h4 class="mb-2">{{ Auth::user()->name }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        @endif
        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>  
        </div>        
    </div>
</body>
</html>
