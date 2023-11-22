@extends('layouts.app')

@section('content')

<div class="bg-info-subtle p-2 text-start rounded-3 ">
    <h3 class="fs-3 text-center">Notifications</h3>
</div>

<div>
<ul class="list-unstyled">
    @forelse (auth()->user()->request as $user)

        <div class="mt-4 text-start m-2">


            <div class="d-grid gap-2 d-md-flex  justify-content-between">
              <div>
                <a href="{{ route('profile',$user) }}" class="text-decoration-none">
               <img src="{{  $user->avatar  }}" alt="" width="60px" class="rounded-circle">
               <span class="ms-3 fs-4">{{ $user->name }}</span>
                </a>
              </div>


               <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-2">

               <form action="{{ route('update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                   <button class="btn btn-primary me-md-2" type="submit">Accept</button>
               </form>

               <form action="{{ route('delete',$user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                   <button class="btn btn-danger" type="submit">Decline</button>
               </form>
               </div>
             </div>
        </div>
    @empty
    <li class="text-center mt-4">No Notifications </li>
    @endforelse
</ul>
</div>




@endsection
