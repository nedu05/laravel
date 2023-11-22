@extends('layouts.app')

@section('content')
    <header class="position-relative">
        <div class="relative">
            <img src="{{ asset('images/default.jpg') }}" alt="" width="830px" height="250px" class="ms-3 rounded-5">

            <img src="{{ $user->avatar }}" alt="no image"
            class="rounded-circle mt-5 border border-dark position-absolute top-50 start-50 translate-middle"
            style="width:150px;">



        </div>


        <div class="d-flex justify-content-between mt-3 ">

            <div class="ms-3 text-start" style="max-width: 200px">
                <h3 class="fw-bold ms-0 text-capitalize">{{ $user->name }}</h3>
                <small>Joined {{ $user->created_at->diffForHumans() }}</small>

            </div>

            <div>


                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                @can('edit',$user)

                    <a href="{{ $user->path('edit') }}" class="btn rounded-1 text-dark border border-2">Edit Profile</a>


                @endcan


                <!-- Follow & unfollow button-->

                @unless (auth()->user()->is($user))

                    <form action="{{ route('follow',$user->username) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-info rounded-1 text-light">
                            {{auth()->user()->following($user) ? 'Requested' : 'Follow' }}
                        </button>
                    </form>
                    @endunless
                </div>







            </div>
        </div>

        <p class="mt-3 text-start ms-3" >In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form
            of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder
            before final copy is available.</p>

    </header>



    @include('timeline', ['tweets' => $tweets])
@endsection
