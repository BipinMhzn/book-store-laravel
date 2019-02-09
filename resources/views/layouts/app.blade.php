<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book Store</title>

    {{-- jQuery Scripts --}}
    <script src="{{asset('js/jQuery.min.js')}}"></script>

    {{-- Bootstrap scripts --}}
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

    {{-- Toastr scripts --}}
    <script src="{{asset('toastr/toastr.js')}}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Bootstrap Style --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css">

    {{-- Toastr styles --}}
    <link rel="stylesheet" href="{{asset('toastr/toastr.css')}}">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #9C27B0;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Book Store
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        @if(Auth::user()->admin)
                            <ul class="navbar-nav navbar-left">
                                <li class="nav-item">
                                    <a href="{{route('products')}}" class="nav-link">Products</a>
                                </li>

                                <li class="nav-item">
                                <a href="{{route('product.create')}}" class="nav-link">New Products</a>
                                </li>
                            </ul>
                        @endif
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">

                        {{-- show cart --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Cart::content()->count() }} <span class="cart">Cart</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-item text-center">
                                    <div class="text-muted h5 text-center">
                                        Rs. {{ Cart::total() }}
                                    </div>
                                    <a href="{{ route('cart') }}" class="btn btn-info btn-md-6">View Cart</a>
                                </div>
                            </div>
                        </li>
    
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-center h5" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')
        </main>
    </div>

    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
</body>
</html>
