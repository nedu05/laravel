@extends('layouts.amapp')
@section('main-content')

<div class="container">


<p class="text-center fs-3">Ordered successfully</p>

@if($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{$message}}</p>
</div>
@endif


{{-- {{ $categories}} --}}

<form action="{{ route('order',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
    @csrf



    <label >User Name</label>
    <input type="text" class="form-control mb-3 w-75 @error('user_name') is-invalid @enderror" name="user_name" id="" value="{{ auth()->user()->name }}">


    @error('user_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <label >Address</label>
    <input type="text" class="form-control mb-3 w-75 @error('user_address') is-invalid @enderror " name="user_address" id="" value="{{ old('user_address') }}" required>
        @error('cuser_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        @csrf
        <label >Payment Method</label>

        <select name="pay_mode" id="" class="form-control w-75 mb-3 " @error('pay_mode') is-invalid @enderror  required>
                    <option value="" selected>Choose Payment mode</option>
                    <option value="gpay" class="text-capitalize">Gpay</option>
                    <option value="cash" class="text-capitalize">cash</option>
                    <option value="paytm" class="text-capitalize">paytm</option>
                    <option value="amazonpay" class="text-capitalize">amazonpay</option>

        </select>


        @error('pay_mode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>



    <div class="container">
        <p class="text-center fs-3">products</p>
        <table class="table table-borderless">
            <tbody>
                @foreach ($categories as $product)
                <tr>
                  <td>
                    <img src="{{ asset('storage/' . $product->product_image) }}"
                                                    alt="..." width="200px">
                  </td>
                <td>product Name: <br> {{ $product->product_name  }}</td>
                <td>product Quantity: <br> {{ $product->quantity  }}
                    <input type="hidden" name="product_ids[]" value="{{  $product->id }}">
                </td>
                <td>price : {{ $product->product_price* $product->quantity }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
         <div class="d-flex justify-content-end" style=" margin-right: 200px!important;">
            <label > Total Price:</label>
         <input type="text" name="total" value="{{ $sum }}"  readonly="true">
    </div>









  </div>

    <div class="d-flex justify-content-center my-2 mt-3">
        <a href="{{ route('viewcart',auth()->user()->id) }}" class="btn btn-danger me-3">back</a>


        <button type="submit" class="btn btn-primary">
           Procced to checkout <span class="badge text-bg-warning rounded-circle">{{ $total }}</span>
          </button>


    </div>

</form>












</div>


@section('script')
{{-- <script>


setTimeout(function(){
    window.location.href = "/amazon/amazon";
}, 60000);


</script> --}}
@endsection


@endsection
