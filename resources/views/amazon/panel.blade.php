@extends('layouts.adminpanel')

@section('main-content')


<div ng-app="myApp" ng-controller="HomeController as homeCtrl">

    <div class="alert alert-danger text-center" role="alert" ng-if="homeCtrl.del">
        @{{ homeCtrl.del }}
    </div>






@if($message = Session::get('success'))
<div class="alert alert-danger">
  <p class="text-center">{{$message}}</p>
</div>
@endif

<div class="container-fluid my-4 text-center ">




    <table class="table table-bordered text-center border ">
        <thead class=" ">
          <tr class="table-dark">

            <th scope="col">S.No</th>
            <th scope="col">Product Image</th>

            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Description</th>
            <th scope="col" >Aviable Quantity</th>
            <th scope="col">Status</th>
            <th scope="col" class="">Action</th>
          </tr>

        </thead>


        @if(count($datas)>0)
          @foreach ($datas as $index=>$data)
        <tbody class="text-start ">

          <tr class="json">

            <td>{{$index+1}}</td>
            <td><img src="{{ asset('storage/'.$data->product_image) }}" alt=""  width="100px"></td>

            <td>{{ $data->product_name }}</td>
            <td> <i class="fa-solid fa-indian-rupee-sign  me-1"></i>{{ $data->product_price }}</td>
            <td>{{ $data->product_description }}</td>
            <td class="d-flex">{{ $data->product_quantity }}</td>
            <td>
                        <button  ng-click="homeCtrl.disapprove($event,{{ $data->id }})" type="submit" class=" {{ $data->status == 0 ?'btn btn-primary':'btn btn-danger'}}" class="btn text-light">
                            {{ $data->status == 0 ?'Approve':'Disapprove'}}
                        </button>

            </td>
            <td class="d-flex ">


                    <a href="{{ route('edit', $data->id) }}" class="btn btn-warning me-2">Edit</a>

                    <form ng-submit="homeCtrl.delete($event,{{  $data->id }})">
                   <button type="submit" class="btn btn-danger" >Delete</button>

                    </form>

            </td>
          </tr>
        </tbody>
        @endforeach
        @else
        <p class="fs-2 text-success">no product</p>
        @endif

    </table>


</div>

</div>


<div class="d-flex justify-content-center">{{ $datas->links() }}  </div>

@section('script')
<script src="{{ asset('js/sample.js') }}" defer></script>
@endsection

@endsection
