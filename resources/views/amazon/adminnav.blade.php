<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid text-light">

        <a class="navbar-brand" href="{{ route('amazon') }}">
            <img src="{{ asset('images/amazondummi.png') }}" alt="Logo" width="80" height="40"
                class="d-inline-block align-text-top">
            <span>.in</span>
        </a>

        <button class="navbar-toggler border border-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-dark"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                <li class="nav-item  mt-2 " >
                    <form class="d-flex" role="search" action="{{ route('adminsearch') }}" method="get">
                            @csrf
                        <select class="form-control  ms-4 rounded-end-0" name="cato" style="width:auto">

                            <option value="" selected>All categories</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" class="text-capitalize">{{ $item->category_name }}</option>
                            @endforeach

                        </select>

                        <input class="form-control rounded-0 px-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ session()->get('word') }}" style="width:500px!important; ">
                        <button class="btn btn-warning bg-gradient rounded-start-0" type="submit"><i
                                class="fa-solid fa-magnifying-glass fa-xl text-dark"></i></button>

                    </form>
                </li>
                <li class="nav-item mt-2 ms-3" >

                    <a href="{{ route('viewcategory') }}" class="{{ Request::is('amazon/admin-cartegory/viewcategory')?'bg-danger':'bg-info' }} text-light btn  ">View Category</a>
                    <a href="{{ route('category') }}" class="{{ Request::is('amazon/admin-cartegory')?'bg-danger':'bg-info' }} text-light btn ">Add Category</a>
                    <a href="{{ route('viewusers') }}" class="{{ Request::is('amazon/admin-view-users')?'bg-danger':'bg-info' }} text-light btn ">View users</a>
                    <a href="{{ route('admin') }}" class="{{ Request::is('amazon/admin')?'bg-danger':'bg-info' }} text-light btn ">Add Product</a>
                    <a href="{{ route('panel') }}" class=" {{ Request::is('amazon/admin-panel')?'bg-danger':'bg-info' }} text-light btn ">view Product</a>
                 </li>
                <img src=" {{ auth()->user()->avatar }}" alt="" width="45px" height="45px" class="rounded-circle ms-2 mt-2">

                   </li>
                <li class="nav-item">

                    <div class="dropdown text-start">
                        <button class="btn dropdown-toggle text-light text-start" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <small>Welcome Admin, {{ auth()->user()->name }}</small><br>
                            <span class="fw-bold ms-4"> Account</span>
                        </button>
                        <ul class="dropdown-menu text-center px-5">


                            <li class="  fw-bolder text-start">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class=" btn btn-danger px-3 " style="padding-left: 1px;">Logout</button>

                                </form>
                            </li>


                        </ul>
                    </div>

                </li>


            </ul>

        </div>
    </div>
</nav>




