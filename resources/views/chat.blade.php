@extends('layouts.app')

@section('content')
{{-- @dd($user_chat) --}}
{{-- @dd($friendchat) --}}

<div class="container-fluid border border-info  " >

    <nav class="navbar bg-info border-bottom border-body mt-2 ">
{{-- @dd($user->id) --}}
        <div class="container">
          <a class="navbar-brand" href="{{ route('profile',$user) }}">
            <img src="{{ $user->avatar }}" alt="Logo" width="40" height="40" class="rounded-circle">
            <span class="ms-2 text-light fs-4">{{ $user->name }} </span>
          </a>
          <a href="{{ route('message') }}"><i class="fa-solid fa-xmark fa-xl text-danger"></i></a>
        </div>
    </nav>


    <!-- show chat messages-->
    <div class="overflow-y-auto my-2 " style="height:460px;overflow-x:hidden">
        <div class="row text-light">
            <div class="col">
                @foreach ($user_chat as $uschat )

                <p class="text-dark fs-4 my-4 p-2 text-start"> <img src="{{$user->avatar }}" alt="no"  width="40" height="40" class="rounded-circle border border-dark">
                    <span class="ms-2 bg-dark-subtle rounded-3  px-2">{{ $uschat->message }}</span>
                </p>
                @endforeach
            </div>
            <div class="col">
                @foreach ($friendchat as $frnds )
                <p class=" fs-4  p-2 me-3 text-end "> <span class="me-1 bg-success bg-opacity-10  px-2 rounded-3 " >
                     {{ $frnds->message }} </span><img src="{{ auth()->user()->avatar }}" alt=""  width="40" height="40" class="rounded-circle border border-dark"></p>

                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-info  mb-2" style="margin-top:450px fixed-bottom">

        <form action="{{ route('chatting',$user->id ) }}" method="post">
            @csrf

            <div class="row p-2">
                <div class="col-auto " >
                   <img src="{{ auth()->user()->avatar }}" alt=""  width="40" height="40" class="rounded-circle ">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="message" name="message"  required autofocus>
                </div>
                <div class="col-auto " >
                    <input  value="send" type="submit" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
