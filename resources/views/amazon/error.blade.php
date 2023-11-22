@extends('layouts.amapp')
@section('main-content')


<div class="container  mt-2">
    <img src="{{ asset('images/error.webp') }}" alt="" class="d-flex w-100 ">
<div class="d-flex justify-content-center  position-absolute top-100 start-50 translate-middle">
<a href="{{ route('amazon') }}" class="btn btn-warning px-5 text-light">BACK TO HOME</a>

</div>

</div>



@endsection
