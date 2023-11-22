
<div class="d-flex justify-content-start mt-3 {{ $loop->last ? '' :  'border-bottom border-secondary-sublet' }} ">
    <a href="{{ $tweet->user->path() }}">

    <img src="{{ $tweet->user->avatar }}" alt="" width="50px" height="50px" class="rounded-circle ">

</a>
    <div class="ms-2 ">
        <a href="{{ $tweet->user->path() }}" class="text-decoration-none">
        <p class="d-flex justify-content-start text-uppercase mb-0 fw-bolder">{{ $tweet->user->name }} </p>
        </a>

        <p class="text-start">{{ $tweet->body }}</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start my-4">

                <form action="/tweety/tweets/{{ $tweet->id }}/like" method="post">
                    @csrf

                    <button type="submit" class="btn {{ $tweet->isLikedBy(auth()->user()) ? 'text-info' : 'text-secondary' }}"><i class="fa-regular fa-thumbs-up fa-xl "></i></button ><span>{{ $tweet->likes ?:0 }}</span>

                </form>

                <form action="/tweety/tweets/{{ $tweet->id }}/like" method="post">

                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn {{ $tweet->isDisLikedBy(auth()->user()) ? 'text-info' : 'text-secondary' }}"> <i class="fa-regular fa-thumbs-down fa-xl "></i></button ><span>{{ $tweet->dislikes ?:0 }}</span>
                </form>
              </div>
    </div>
</div>

