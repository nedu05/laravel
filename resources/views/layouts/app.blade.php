<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/amazon.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>


    {{-- <div id="app">
        <!-- nav bar-->



        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand ms-5" href="#">
                <img src="{{ asset('images/logo.png') }}" width="50px" height="50px">
                <span class="fs-3">Twitter</span>
              </a>
                <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
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
                        <li class="nav-item ">
                            <a id="navbarDropdown " class="nav-link  me-5 text-capitalize fw-bold" href="#" role="button" data-toggle="dropdown"  aria-expanded="false" v-pre>
                             Welcome   {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
    </nav> --}}



    @if (Route::has('tweety'))
    <main>

        <div class="container-fluid ">
                <div class="row justify-content-center text-center  mx-5">

                    {{-- first column --}}
                    @if (auth()->check())
                        <div class="col-sm-2 ">
                            @include('sidebar')
                        </div>
                    @endif


                    {{-- second column --}}

                    <div class="col-sm ">

                        @yield('content')

                    </div>


                    {{-- Third column --}}
                    @if (auth()->check())
                    <div class="col-sm-2 ms-5 ">
                        @include('friends')
                    </div>
                    @endif


                </div>
            </div>



    </main>


    </div>
    {{-- @endif --}}


 {{-- @if (Route::has('amazon'))

@include('amazon.nav') --}}





 @endif
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
