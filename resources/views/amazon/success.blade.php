@extends('layouts.amapp')
@section('main-content')

<div class="container my-5">
    <p class="text-center text-success fs-1"> Your ordered placed sucessfully </p>
</div>

@section('script')
<script>
     setTimeout(
        function(){
            window.location = "/amazon/amazon";
        },
    3000);
</script>

@endsection

@endsection
