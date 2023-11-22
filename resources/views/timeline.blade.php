<div class="row">
    <div class="col-sm-12 m-3 border border-primary pb-3 rounded-5">

    @forelse ($tweets as $tweet)

        @include('tweet')

     @empty


     <p class="pt-4"> No tweets yet.</p>

    @endforelse


     <div class="d-flex justify-content-center">

         {{ $tweets->links() }}

     </div>



    </div>
</div>
