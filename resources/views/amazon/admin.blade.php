@extends('layouts.adminpanel')
@section('main-content')

<h3 class="text-center my-2">ADD product</h3>

<div class="container my-2  ">

    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
   </div>
   @endif


    <form action="{{ route('datastore') }}" method="POST" enctype="multipart/form-data">


        @csrf
        <label >Categories</label>

        <select name="category_id" id="" class="form-control w-75 mb-3 ">
                   <option value="" selected>Choose Category </option>
                    @foreach ($items as $item)
                    <option value="{{ $item->id }}" class="text-capitalize">{{ $item->category_name }}</option>
                    @endforeach
        </select>


        <label >product name</label>
        <input type="text" class="form-control mb-3 w-75 @error('product_name') is-invalid @enderror" name="product_name" id="" value="{{ old('product_name') }}">


        @error('product_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <label >product Description</label>
        <input type="text" class="form-control mb-3 w-75 @error('product_description') is-invalid @enderror " name="product_description" id="" value="{{ old('product_description') }}">
            @error('product_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <label >Product price</label>
        <input type="number" class="form-control mb-3 w-75 @error('product_price') is-invalid @enderror " name="product_price" id="" value="{{ old('product_price') }}">
        @error('product_price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

        <label >product Quantity</label>
        <input type="number" class="form-control mb-3 w-75 @error('product_quantity') is-invalid @enderror  " name="product_quantity" id="" min="0" value="{{ old('product_quantity') }}">


        @error('product_quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <label >Image upload</label>
        <input type="file" class="form-control mb-3 w-75 @error('product_image') is-invalid @enderror " name="product_image" id="image" value="{{ old('product_image') }}">


        @error('product_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <label >Status</label>
        <input type="number" class="form-control mb-3 w-75 @error('status') is-invalid @enderror " name="status" id="" min="0" max="1" value="{{ old('status') }}">
        @error('product_status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <div class="d-flex justify-content-center my-2">
            <a href="{{ route('panel') }}" class="btn btn-danger w-25 me-3">back</a>

            <button type="submit" class="btn btn-info form-control w-25 fw-bold text-light"> Submit</button>
        </div>

    </form>







</div>



@endsection



