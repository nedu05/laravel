@extends('layouts.adminpanel')
@section('main-content')


<div class="container mt-2 ">
    <table class="table table-borderless table-bordered ">
    <thead>
        <tr class="table-dark">
        <th scope="col">S.no</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created</th>
      </tr>
    </thead>
    <tbody >

@foreach ($users as $index=>$user)


      <tr>
        <th scope="row"  >{{ $index+1 }}</th>
        <td >{{ $user->name }}</td>
        <td >{{ $user->email }}</td>
        <td >{{ $user->created_at->toDateString() }}</td>

      </tr>

      @endforeach
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-center">{{  $users->links() }}  </div>


@endsection
