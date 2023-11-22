@extends('layouts.amapp')
@section('main-content')


<div class="row">
    <div class="col-2 border">
        <ul class="list-unstyled  text-start m-4">
            <li class="fw-bold">Delivery Day</li>
            <li>
                <input type="checkbox" name="" id="" class="me-2">Get It by Tomorrow
            </li>
            <li>
                <input type="checkbox" name="" id="" class="me-2">Get It 2 Days
            </li>
            <li class="fw-bold">Category</li>
            <li>Smartphones & Basic Mobiles</li>
            <li>Smartphones</li>
            <li>Mobile Accessories</li>

            <li class="fw-bold"> Customer Review</li>
            <li class="fs-5"><i class="fa-solid fa-chevron-left me-2"> </i> clear</li>
            <li>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                &up
            </li>
            <li>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                &up
            </li>
            <li>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                &up
            </li>
            <li>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                <i class="fa-regular fa-star text-warning"></i>
                &up
            </li>
            <li class="fw-bold mt-3">Brand</li>
            <li>
                <input type="checkbox" name="" id="" class="me-2"> Samsung
            </li>
            <li>
                <input type="checkbox" name="" id="" class="me-2"> OnePlus
            </li>
            <li>
                <input type="checkbox" name="" id="" class="me-2"> Xiaomi
            </li>
            <li>
                <input type="checkbox" name="" id="" class="me-2"> Iphone
            </li>
            <li>
                <input type="checkbox" name="" id="" class="me-2"> Mi
            </li>
            <li class="fw-bold mt-3">Price</li>
            <li>Under ₹1,000</li>
            <li>₹1,000 - ₹5,000</li>
            <li>₹5,000 - ₹10,000 </li>
            <li>₹10,000 - ₹20,000</li>
            <li>Over ₹20,000</li>
            <li class="fw-bold mt-3">Deals & Discounts</li>
            <li> Discounts</li>
            <li>Today's Deals</li>
            <li class="fw-bold mt-3">Item Condition</li>
            <li> New</li>
            <li>Renewed</li>
            <li class="fw-bold mt-3">Discount</li>
            <li>% Off or more</li>
            <li>25% Off or more</li>
            <li>35% Off or more</li>
            <li>50% Off or more</li>
            <li>60% Off or more</li>
            <li>70% Off or more</li>
            <li class="fw-bold">Availability</li>
            <li>Include Out of Stock</li>



        </ul>
    </div>

    <div class="col-8 m-5">
        @if(count($categories)>0)


        @foreach ($categories as $item)



        <div class="row text-start">
            <div class="col-4 mt-3" >
                <img src="{{ asset('storage/'.$item->product_image) }}" width="300px" alt="...">

            </div>
            <div class="col">
                <a href="{{ route('view', $item->id) }}">
                    <div class="ms-1">
                        <p class="fw-bold text-capitalize">{{ $item->product_name }}</p>
                        <p class="fw-bold me-2">M.R.P: ₹{{ $item->product_price }}(45% off)</p>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                                &up
                            </li>
                        </ul>
                        <button type="button" class="btn btn-warning mb-1">

                            Great Indian Festival
                            <span class="badge text-bg-secondary"></span>
                          </button>
                        <p > {{ $item->product_description }}</p>
                        <p class="fs-5"> FREE Delivery by Amazon</p>
                      </div>
                </a>

            </div>
        </div>
        @endforeach

        @else
        <p class="text-center fs-3">Sorry you searched product not found </p>

        @endif


</div>
<div class="d-flex justify-content-center">{{ $categories->links() }} </div>



@endsection
