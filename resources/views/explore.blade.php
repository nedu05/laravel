@extends('layouts.app')

@section('content')
    <div class="">

        @foreach ($users as $user)

        <a href="{{ $user->path() }} " class="text-decoration-none">
            <div class="d-flex mb-4 ">

                <img src="{{ $user->avatar }}" alt="" width="60px" class="rounded-circle">

                <h4 class="pt-3 ms-3"> {{ '@' . $user->username }} </h4>
               

            </div>
        </a>
        @endforeach
        {{ $users->links() }}
    </div>
@endsection
