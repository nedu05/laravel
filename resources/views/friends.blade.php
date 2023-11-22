<div class="bg-info-subtle p-2 text-start rounded-3 ">
    <h3 class="fs-3 text-center">Following</h3>

<ul class="list-unstyled">
    @forelse (auth()->user()->followers as $user)

<li class=" fw-bold {{ $loop->last?  '' : 'my-3' }} ">
        <div >
            <a href="{{ route('profile',$user) }}" class="text-decoration-none">
            <img src="{{ $user->avatar }}" alt="" width="50px" height="50px" class="rounded-circle mx-2">
            <span class=" text-capitalize text-center ">{{ $user->name }}</span>
        </a>
        {{-- <a href="{{ route('message') }}"><span class="ms-4"><i class="fa-regular fa-message fa-xl"></i></span></a> --}}
        </div>

    </li>
    @empty
    <li class="text-center mt-4">No friends</li>
    @endforelse
</ul>
</div>


