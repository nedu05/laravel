<div class="row">
<div class="col-12 mx-3 border border-primary p-3 rounded-5">


 <form action="{{ url('tweety/tweets') }}" method="POST">
    @csrf
  <textarea name="body" id="" class="border border-0 form-control p-4" placeholder="What's up doc?" required autofocus></textarea>

  <hr class="border border-dark">
  <footer class="d-flex justify-content-between">

      <img src=" {{ auth()->user()->avatar }}" alt="" width="40px" height="40px" class="rounded-circle ms-2">

      <button class="btn btn-info rounded-5 text-light">Tweet-a-roo! </button>
  </footer>

</form>
        @error('body')
        <div class="text-danger mt-3 fs-3">{{ $message }}</div>
        @enderror



</div>
</div>

