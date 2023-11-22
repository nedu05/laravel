@extends('layouts.app')

@section('content')


<div class="bg-info-subtle  p-2 rounded-3 ">
    <h3 class="fs-3 text-center">Messages</h3>
</div>

<div class="container mt-3 border border-black ">
<ul class="list-unstyled mt-3">
    @forelse (auth()->user()->followers as $user)

<li class=" fw-bold {{ $loop->last?  '' : 'my-3' }} ">
        <div class="d-flex justify-content-between">
            <div >
            <a href="{{ route('profile',$user) }}" class="text-decoration-none">
            <img src="{{ $user->avatar }}" alt="" width="50px" height="50px" class="rounded-circle mx-2">
            <span class=" text-capitalize text-center ">{{ $user->name }}</span>
        </a>
        </div>

<div class="mt-3 ">
    <i class="fa-solid fa-video fa-xl mx-2 text-info"></i>
    <i class="fa-solid fa-phone fa-xl mx-2 text-info"></i>
    <a href="{{ route('chat',$user) }}"><i class="fa-regular fa-message fa-xl ms-2"></i></a>
    {{-- <a href="{{ route('chat') }}"><i class="fa-regular fa-message fa-xl ms-2"></i></a> --}}
</div>

</div>

    </li>
    @empty
    <li class="text-center mt-4">No friends</li>
    @endforelse
</ul>
</div>









@endsection
