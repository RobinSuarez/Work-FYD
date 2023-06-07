<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Arimo" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @yield('head')
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownMF" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Master Files
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMF">
                                <a class='dropdown-item' href="\banks">Banks</a>
                                <a class='dropdown-item' href="\clients">Clients</a>
                                <a class='dropdown-item' href="\salesmen">Salesman</a>
                                <a class='dropdown-item' href="\services">Services</a>
                                <a class='dropdown-item' href="\tax-types">Tax Types</a>
                                <a class='dropdown-item' href="\uoms">Unit of Measures</a>
                                <a class='dropdown-item' href="\areas">Areas</a>
                                <a class='dropdown-item' href="\companies">Companies</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdownTS" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Transactions
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownTS">
                                <a class='dropdown-item' href="\proposals">Proposals</a>
                                <a class='dropdown-item' href="\contracts">Contracts</a>
                                <a class='dropdown-item' href="\soas">SOA</a>
                                <a class='dropdown-item' href="\ors">OR</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownRP" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Reports
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownRP">
                                <a class="dropdown-item" href="\ar-lr-cust\aging-report">AR AGING REPORT</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdownSYS" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                System
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownRP">
                                <a class="dropdown-item" href="\users">Users</a>
                                <a class='dropdown-item' href="\statuses">Statuses</a>
                            </div>
                        </li>
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
                                    <a class='dropdown-item' href="{{ route('users.edit', ['user' => Auth::id()]) }}" >
                                        Account Profile
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="pt-4 ml-3 mr-3">
                
                @yield('content')
                @switch(true)
                    @case(Session::has('status'))
                        @alerts([
                            'show' => 'show',
                        ])
                        {{ Session::get('status') }}
                        @endalerts
                        @break
                    @case(Session::has('alert'))
                        @alerts([
                            'show' => 'show',
                            'type' => 'danger',
                        ])
                        {{ Session::get('alert') }}
                        @endalerts
                        @break
                    @case($errors->any())
                        @errors
                        @enderrors
                        @break
                    @default
                @endswitch

                
            </div>
        </main>
    </div>
</body>
</html>
<script type="module">
    $(window).on('load', function() {
    $('#errors').modal('show');
    });

    $(window).on('load', function() {
        $('#alert').modal('show');
    });
</script>
@yield('scripts')