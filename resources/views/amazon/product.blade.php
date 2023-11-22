@extends('layouts.amapp')

@section('main-content')
    <div class="container-fluid my-5 text-center " ng-app="myApp" ng-controller="CartController as cartCtrl">




<div class="alert alert-success" role="alert" ng-if="cartCtrl.success">
    @{{ cartCtrl.success }}
</div>

        <div class="row">
            <div class="col">
                <img src="{{ asset('storage/' . $categories->product_image) }}" alt="..." class="d-flex w-100">
            </div>
            <div class="col fw-bold text-start">
                {{ $categories->product_name }} <br>


                <ul class="list-unstyled">
                    <li>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-regular fa-star text-warning"></i>
                        <i class="fa-solid fa-angle-down"></i>
                        2,747 ratings <br>
                        |269 answered questions
                    </li>
                </ul>
                <button type="button" class="btn btn-warning">
                    #1 Best Seller
                </button><br>
                <p class=""> 2K+ bought in past month </p>
                <hr>
                <button type="button" class="btn btn-danger"> Great Indian Festival </button><br>
                <p>Inclusive of all taxes</p>
                <p> ₹{{ $categories->product_price }}</p>
                <p>M.R.P.: <span class="text-decoration-line-through">₹70,990</span></p><br>

                <span>EMI starts at ₹1,454. No Cost EMI available EMI options <i class="fa-solid fa-angle-down"></i> </span>


                <div class="fs-6 mt-2">
                    {{ $categories->product_description }} <br>
                </div>



                <hr>
                <img src="{{ asset('images/offer.png') }}" alt="" srcset="" width="25px" height="25px"><span
                    class="ms-2 mt-1">Offers</span>

                <div class="row mt-2">
                    <div class="col border pt-1">
                        <p>Partner Offers</p>
                        <p>Receive 1 Free Buds on Checkout on purchase of Oneplus 11 free when you purchase 1 or more
                            Qualifying items offered by Darshita Electronics.</p>
                    </div>
                    <div class="col border mx-2">
                        <p>Bank Offer</p>
                        <p>Additional Flat INR 2250 Instant Discount on ICICI Bank Credit Cards (excluding Amazon Pay ICICI
                            Credit Card) Credit Card Txn. </p>
                    </div>
                    <div class="col border">
                        <p>No Cost EMI</p>
                        <p>Upto ₹4,647.24 EMI interest savings on select Credit Cards</p>
                    </div>

                </div>

                <hr>
             <div class="row">
                <div class="col">
                    <img src="{{ asset('images/garente.png') }}" alt="" width="40px" height="40px">
                    <p>7 days Service Centre Replacement
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/ship.png') }}" alt="" width="40px" height="40px">
                    <p>Free Delivery</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/warenty.png') }}" alt="" width="40px" height="40px">
                    <p>1 Year Warranty</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/ship.png') }}" alt="" width="40px" height="40px">
                    <p>Amazon Delivered</p>
                </div>
             </div>
            </div>
            <div class="col-2 border mx-4">
                <div class="col border bg-dark-subtle">
                    With Exchange Up to 50,150.00 off
                    <input type="radio" name="" id="">
                </div>



                <p>FREE delivery Wednesday, 8 November. Details</p>

                <p>
                    Or fastest delivery Tomorrow, 8 November. Order within 1 hr 27 mins. Details
                </p>

                <p>
                    In stock
                    Sold by Darshita Electronics and Fulfilled by Amazon.
                </p>

                <p> Add a Protection Plan:</p>
                <div class="text-start mb-2">
                    <input type="checkbox" name="" id="">OnePlus Care Accidental Damage Protection - 1 Year for ₹3,799.00 <br>
                    <input type="checkbox" name="" id="">Screen Protection Plan by Acko for ₹2,349.00 <br>
                    <input type="checkbox" name="" id="">Total Protection Plan by Quess for ₹3,499.00
                </div>




@if (auth()->user())


                <form ng-submit="cartCtrl.Addcart({{ $categories->id }},{{ auth()->user()->id }}) ">

                    <button class="btn btn-warning">Add to cart</button>
                </form>
                @else

                    <a href="{{  route('register') }}"  class="btn btn-warning">Add to cart</a>


@endif

@if (auth()->user())
<a href="{{ route('buy', $categories->id ) }}" class="btn btn-warning  mt-2">BUY</a>

@else

<a href="{{  route('register') }}"  class="btn btn-warning">BUY</a>
@endif












            </div>
        </div>
    </div>


    @section('script')
<script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
@endsection
