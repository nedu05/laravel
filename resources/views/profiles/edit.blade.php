@extends('layouts.app')

@section('content')


<form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

<div class="form-group row">

    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-6">

        <input id="name" type="text" class="form-control
         @error('name') is-invalid @enderror" name="name"
         value="{{ $user->name }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
    <div class="col-md-6">
        <input id="username" type="text" class="form-control
         @error('username') is-invalid @enderror" name="username"
         value="{{ $user->username }}" required autocomplete="username" autofocus>

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>
    <div class="col-md-6">
        <input id="avatar"
               type="file"
               class="form-control


         @error('avatar') is-invalid @enderror" name="avatar"
         autocomplete="avatar" autofocus>

        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<img src="{{ $user->avatar }}" alt="" width="150px" class="pb-2 ms-5">


<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
         value="{{ $user->email }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control
         @error('password') is-invalid @enderror" name="password"
            required autocomplete="password" autofocus>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control
         @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
          required autocomplete="password_confirmation" autofocus>

        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="mt-4 ms-5">

    <button type="submit" class="btn btn-info text-light">Submit</button>


    <a href="{{ $user->path() }}" class="text-decoration-none btn btn-danger ms-2" >Cancel</a>
</div>

</form>




@endsection
