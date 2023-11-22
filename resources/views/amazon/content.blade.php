<div class="container">
    <div class="position-relative">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="{{ asset('images/background.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('images/back_3.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('images/back_4.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    {{-- contents --}}



    <!-- orginal-->
    <div class="position-absolute start-50  translate-middle container  margin-control">
{{-- {{ rand(1,10) }} --}}
        <!-- col-1-->
        <div class="row">
            <div class="col-sm-3 bg-light border">
                <div class="row">
                    @foreach ($items as $item)
                    @if ($item->id == 1)
                    <a href="{{ route('search','cato='.$item->id) }}">
                            <p class="text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                    <a href="{{ route('search','cato='.$item->id) }}">

                                        <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                        alt="...">
                                        {{-- <input type="hidden" value="{{ $item->id }}"> --}}
                                    <p class="text-center"> {{ $product->product_name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                <a href="">See histrory</a>
            </div>

            <div class="col-sm-3 bg-light border">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 2)
                    <a href="{{ route('search','cato='.$item->id) }}">

                            <p class="text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(1) as $product)
                                <div class="col-sm">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                        <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                        alt="...">
                                    <p class="text-center"> {{ $product->product_name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

         <a href="">See more deals</a>
            </div>
            <div class="col-sm-3 bg-light text-center">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 3)
                    <a href="{{ route('search','cato='.$item->id) }}">

                            <p class="text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                    <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                    alt="...">
                                <p class="text-center"> {{ $product->product_name }}</p>
                                   </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="">See more deals</a>
            </div>
            <div class="col-sm-3 bg-light text-center">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 4)
                    <a href="{{ route('search','cato='.$item->id) }}">

                            <p class="text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                    <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                    alt="...">
                                <p class="text-center"> {{ $product->product_name }}</p>
                                   </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>


            </div>
        </div>
    </div>


    <div class="container-fluid  " style="margin-top:280px;">

        <div class="row">
            <div class="col-sm-3 bg-light">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 5)
                    <a href="{{ route('search','cato='.$item->id) }}">

                        <p class=" text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                    <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                    alt="...">
                                    <p class="text-center"> {{ $product->product_name }}</p>
                                  </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="">See more deals</a>
            </div>

            <div class="col-sm-3 bg-light">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 6)
                    <a href="{{ route('search','cato='.$item->id) }}">

                        <p class=" text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(1) as $product)
                                <div class="col-sm">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                        <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                        alt="...">
                                  <p class=" text-center">  {{ $product->product_name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="">See more deals</a>
            </div>



            <div class="col-sm-3 bg-light">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 7)
                    <a href="{{ route('search','cato='.$item->id) }}">

                        <p class=" text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                        <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                        alt="...">
                                        <p class=" text-center">  {{ $product->product_name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="">See more deals</a>
            </div>

            <div class="col-sm-3 bg-light">
                <div class="row">
                    @foreach ($items as $item)
                        @if ($item->id == 8)
                    <a href="{{ route('search','cato='.$item->id) }}">

                        <p class=" text-center fw-bold"> {{ $item->category_title }}</p>
                    </a>
                            @foreach ($item->products->take(4) as $product)
                                <div class="col-sm-6">
                                    <a href="{{ route('search','cato='.$item->id) }}">

                                        <img src="{{ asset('storage/'.$product->product_image) }}" class="d-block w-100"
                                        alt="...">
                                        <p class=" text-center">  {{ $product->product_name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="">See more deals</a>
            </div>
                </div>


            </div>
                </div>

                @if (auth()->user())



        <div class="container mt-3">
            {{-- {{ $trending }} --}}
            <div class="row">
               {{-- {{ $trending }} --}}
                <p class="fs-3">Trending Sales</p>
                @foreach ($trending as $trends)

                <div class="col">

                    <a href="{{ route('search') }}">
                        <img src="{{ asset('storage/'.$trends->product_image) }}" class="d-block w-100"
                        alt="...">
                    <p> {{ $trends->product_name }}</p>
                    </a>

                </div>
                @endforeach

            </div>
        </div>

        @endif

    {{-- bottom --}}


    {{-- <div id="carouselExampleControls" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active ">

                <div class="row mx-3">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                </div>
            </div>


            <div class="carousel-item">
                <div class="row mx-3">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                </div>
            </div>

            <div class="carousel-item">
                <div class="row mx-3">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/prime.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}

@if (auth()->user())

@else
<div class="container-fluid text-center border mt-3">
    <p class="mb-0 mt-3">See personalized recommendations</p>
    <a  href="{{ route('login') }}" class="btn btn-warning px-5 fw-bold">Login</a>
    <p class="mt-2">New customer? <a  href="{{ route('register') }}" class="text-decoration-none">Start here.</a></p>
</div>

@endif










