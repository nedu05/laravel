        @extends('layouts.amapp')

        @section('main-content')
        @auth



        <div class="container-fluid text-center mt-3 mx-4" ng-app="myApp" ng-controller="ProductController as productCtrl">


        {{-- <div class="alert alert-danger" role="alert" ng-if=" productCtrl.delmsg">
        @{{ productCtrl.delmsg }}
        </div> --}}


        <div class="alert alert-success" role="alert" ng-if="productCtrl.sucssmsg">
        @{{ productCtrl.sucssmsg }}
        </div>


        <p class="fs-2 text-start">Shopping Cart</p>

        @if (count($categories) > 0)
        <div class="row">
        <div class="col-9">
        <table class="table table-borderless border text-center">
        <thead>

        </thead>
        <tbody>
        @foreach ($categories as $cart)
        <tr id="{{ $cart->product_id }}">
        <th scope="row"> <img src="{{ asset('storage/' . $cart->product_image) }}"
        alt="..." width="200px"></th>
        <td>
        <ul class="list-unstyled text-start">
        <li class="fw-bold">{{ $cart->product_name }}</li>
        <li>{{ $cart->product_description }}</li>
        <li class=" mt-3 fw-bold">Quantity</li>
        <li>

        <input type="number" name="quantity" class="qyt"     value="{{ $cart->quantity }}"       ng-click="productCtrl.upd($event,{{ $cart->product_id }})" min="1">





        </li>

        @if (auth()->user())
        {{-- <button class="btn btn-warning" ng-click="{{ $cart->quantity }}">Update</button> --}}
        <li class=" mt-3 ">


        {{-- <button
        ng-click="productCtrl.add({{ $cart->product_id }},{{ auth()->user()->id }},{{ $cart->quantity }}) ">
        update
        </button> --}}

        </li>

        <li class="mt-2">

        <form
        ng-submit="productCtrl.delete($event,{{ $cart->product_id }},{{ auth()->user()->id }}) ">


        <button class="btn btn-danger btn-sm">delete</button>
        </form>
        @endif

        </li>

        </ul>
        </td>
        <td>

        <P>Price</P>
        <p class="fw-bold " ng-init="productCtrl.qyt"> ₹{{ $cart->product_price  }}</p>

        </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        </div>
        <div class="col-3 border text-start">
        <p>Your order is eligible for FREE Delivery. <br> Select this option at checkout. Details</p>
        <p><span class="">Subtotal ({{ $total }})</span>: <span class="nnj"> {{ $sum }}</span></p>
        <p>This order contains a gift</p>

        <div class="text-center">

        <a href="{{ route('buy', auth()->user()->id) }}" class="btn btn-success px-5">Proceed To buy</a>


        </div>
        </div>
        @else
        <p class="text-center fs-3"> no products </p>
        @endif
        </div>


        </div>

        @section('script')
        <script src="{{ asset('js/addproduct.js') }}" defer></script>
        @endsection

        @endauth
        @if (auth()->user())
        @else
        <p class="text-center">oops sorry you can register now <a href="{{ route('register') }}">Register</a> </p>
        @endif
        @endsection
