@extends('layouts.navbarAndHeader')

@section('nav')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container">
    <div class="container d-flex mb-5 float-left">
        <!-- back button -->
        <div>
            <a href="{{url('/')}}/course" class="nav-link text-light btn btn-primary">back</a>
        </div>
    </div>
    <h1>My Orders</h1>
    <div class="row m-0 p-0">
        <div class="col">
            <table class="table">
                <thead class="text-uppercase">
                    <tr>
                        <th>Order No.</th>
                        <th> Order Date</th>
                        <th> Total Price</th>
                        <th> Order Status</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($MyOrders as $orders)
                    <tr>
                        <td> {{$orders['id']}} </td>
                        <td> {{$orders['created_at']}} </td>
                        <td> {{$orders['order_TotalPrice']}} </td>
                        <td> {{$orders['order_status']}} </td>
                        <td>
                            <a class="btn btn-success" href="{{url('/')}}/courseItem/{{ $orders['id'] }}"> View</a>
                            <a class="btn btn-primary" href="{{url('/')}}/return/{{ $orders['id'] }}"> Return </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection