@extends('layouts.adminpanel')
@section('main-content')




<div class="container mt-2">
    <table class="table table-borderless table-bordered ">
        <thead>
          <tr class="table-dark">
            <th scope="col">S.no</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Title</th>
            <th scope="col">Aviable Quantity</th>
            {{-- <th scope="col">Action</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index=>$data )

          <tr>

            <td>{{$index+1}}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_title }}</td>
            <td>{{ $data->category_quantity }}</td>
            {{-- <td class="d-flex">
                <a href="{{ route('edit', $data->id) }}" class="btn btn-warning me-2">Edit</a>

                <form ng-submit="homeCtrl.delete({{  $data->id }})">
                <button type="submit" class="btn btn-danger" >Delete</button>

                </form>
            </td> --}}
          </tr>
          @endforeach
        </tbody>
    </table>

</div>
<div class="d-flex justify-content-center">{{  $categories->links() }}  </div>
<div >

</div>
@endsection
