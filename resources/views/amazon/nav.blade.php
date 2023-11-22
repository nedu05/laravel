


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid text-light">

            <a class="navbar-brand" href="{{ route('amazon') }}">
                <img src="{{ asset('images/amazondummi.png') }}" alt="Logo" width="80" height="40"
                    class="d-inline-block align-text-top">
                <span>.in</span>
            </a>


            <button class="navbar-toggler border border-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-dark"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-start">
                        <div>
                            <span class="me-1"><i class="fa-sharp fa-solid fa-xl fa-location-dot my-3"></i></span>
                            <small>Delivering to Madurai 625020</small><br>
                            <small class="ms-4">Update location </small>
                        </div>
                    </li>

                    <li class="nav-item  mt-2">
                        <form class="d-flex" role="search" action="{{ route('search') }}" method="get">
                                @csrf
                            <select class="form-control  ms-4 rounded-end-0" name="cato" style="width:auto">

                                <option value="" selected>All categories</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}" class="text-capitalize">{{ $item->category_name }}</option>
                                @endforeach

                            </select>

                            <input class="form-control rounded-0 px-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ session()->get('search') }}" style="width:500px!important">
                            <button class="btn btn-warning bg-gradient rounded-start-0" type="submit"><i
                                    class="fa-solid fa-magnifying-glass fa-xl text-dark"></i></button>

                        </form>
                    </li>
                    <li class="nav-item  mt-2">
                        <div class="dropdown text-light">
                            <button class="btn  dropdown-toggle text-light" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('images/flag.png') }}" alt="" width="21px" height="16px">
                                <span class="text-light">EN</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English -EN</a></li>
                                <li><a class="dropdown-item" href="#">தமிழ்-TA</a></li>
                                <li><a class="dropdown-item" href="#">हिन्दी-HI </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">


@if(auth()->user())

                        <div class="dropdown text-start">
                            <button class="btn dropdown-toggle text-light text-start" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <small>Hello, {{ auth()->user()->name }}</small><br>
                                <span class="fw-bold"> Account & Lists</span>
                            </button>
                            <ul class="dropdown-menu text-center px-5">


                                <li class=" mb-3 fw-bolder text-start">
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class=" btn btn-warning px-3 " style="padding-left: 1px;">Logout</button>

                                    </form>
                                </li>


                            </ul>
                        </div>


@else
                        <div class="dropdown text-start">
                            <button class="btn dropdown-toggle text-light text-start" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <small>Hello, sign in</small><br>
                                <span class="fw-bold"> Account & Lists</span>
                            </button>
                            <ul class="dropdown-menu text-center px-5">
                                <li>
                                    <a href="{{ route('login') }}" class=" btn btn-warning px-3 ">Login</a>

                                    {{-- <button class=" btn btn-warning px-3 ">Sign in</button> --}}
                                </li>

                                <li>
                                    <button class="dropdown-item mt-2"><small>New Customer?<a href="{{ route('register') }}">Start here.</a>
                                        </small></button>

                                </li>

                            </ul>
                        </div>



                        @endif
                    </li>

                    @if (auth()->user())




                    <li>
                     <img src=" {{ auth()->user()->avatar }}" alt="" width="45px" height="45px" class="rounded-circle ms-2 mt-2">

                    </li>

                    @endif


                    <li class="nav-item  mt-2 ms-3">
                        <div class="text-start">

                            <small>Returns</small><br>
                            <span class="fw-bold">& Orders</span>
                        </div>
                    </li>

@if (auth()->user())



                    <li class="nav-item  mt-2 ms-3">
                        <a href="{{ route('viewcart',auth()->user()->id) }}" class="text-light">
                            <div>
                                <span class="ms-4 mb-0 text-warning cart">{{ $total }}</span><br>
                                <img src="{{ asset('images/cart.png') }}" alt="" style="margin-top:-25px!important ">
                                <p style="margin-top: -45px;margin-left:54px " class="text-warning">Cart</p>
                            </div>
                        </a>

                    </li>

@else
                    <li class="nav-item  mt-2 ms-3">

                        <a href="{{ route('register') }}">
                            <div>
                                <span class="ms-4 mb-0 ">0</span><br>
                                <img src="{{ asset('images/cart.png') }}" alt="" style="margin-top:-25px!important ">
                                <p style="margin-top: -45px;margin-left:54px">Cart</p>
                            </div>
                        </a>

                    </li>

                    @endif

                </ul>

            </div>
        </div>
    </nav>
