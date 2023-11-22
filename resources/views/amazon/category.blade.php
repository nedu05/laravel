@extends('layouts.adminpanel')
@section('main-content')

<h3 class="text-center my-2">Add Catgory</h3>

<div class="container  justify-content-center  my-2  ">

    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
   </div>
   @endif


    <form action="{{ route('categorystore') }}" method="POST" enctype="multipart/form-data">


        @csrf



        <label >Category Name</label>
        <input type="text" class="form-control mb-3 w-75 @error('category_name') is-invalid @enderror" name="category_name" id="" value="{{ old('category_name') }}">


        @error('category_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <label >Category  Title</label>
        <input type="text" class="form-control mb-3 w-75 @error('category_title') is-invalid @enderror " name="category_title" id="" value="{{ old('category_title') }}">
            @error('category_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


      <label >Category Quantity</label>
        <input type="number" class="form-control mb-3 w-75 @error('category_quantity') is-invalid @enderror " name="category_quantity" id="" value="{{ old('category_quantity') }}">
        @error('category_quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror







        <div class="d-flex justify-content-center my-2">
            <a href="{{ route('viewcategory') }}" class="btn btn-danger w-25 me-3">back</a>

            <button type="submit" class="btn btn-info form-control w-25 fw-bold text-light"> Submit</button>
        </div>

    </form>
</div>



@endsection




