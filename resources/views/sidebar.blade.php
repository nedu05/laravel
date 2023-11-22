<div class="bg-info-subtle p-4 rounded-3">
    <ul class="list-unstyled ">

        <li class=" mb-3 fw-bolder text-start"><a href="{{ route('home') }}"
                class="text-dark fs-4 text-decoration-none">Home</a></li>
        <li class=" mb-3 fw-bolder text-start"><a
                href="{{ route('explore') }}"class="text-dark fs-4 text-decoration-none">Explore</a></li>
        <li class=" mb-3 fw-bolder text-start"><a
                href="{{ route('request', auth()->user()) }}"class="text-dark fs-4 text-decoration-none">Requests <span
                class="badge rounded-pill text-bg-primary">{{ auth()->user()->request->count() }}</span></a></li>
        <li class=" mb-3 fw-bolder text-start"><a
                href="{{ route('message') }}"class="text-dark fs-4 text-decoration-none">Message</a></li>
        <li class=" mb-2   fw-bolder text-start"><a
                href="{{ route('profile', auth()->user()) }}"class="text-dark fs-4 text-decoration-none">Profile</a>
        </li>


        



        <li class=" mb-3 fw-bolder text-start">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class=" btn fs-4 fw-bolder" style="padding-left: 1px;">Logout</button>

            </form>
        </li>




    </ul>
</div>
