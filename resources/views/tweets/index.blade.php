@extends('layouts.app')

@section('content')

@include('publish')


@include('timeline')

@endsection

<!--<div class="container-fluid ">
    <div class="row justify-content-center text-center  mx-5">

        {{-- first column --}}
        <div class="col-sm-2 ">
            @include('sidebar')
        </div>


        {{-- second column --}}

        <div class="col ">
            @include('publish')
            <div class="row">
                <div class="col-sm-12 m-3 border border-primary pb-3 rounded-5">
                    @foreach ($tweets as $tweet)
                    @include('tweet')
                    @endforeach
                </div>
            </div>
        </div>


        {{-- Third column --}}

        <div class="col-sm-4 ms-5 ">
            @include('friends')
        </div>


    </div>
</div>-->
