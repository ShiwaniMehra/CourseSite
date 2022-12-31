@extends('layouts.app')

@section('content')
<!-- 
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif -->

<div class="container-fluid justify-content-center">
    <div class="container d-flex mb-5 float-left">

        <!-- back button -->
        <div class="btn btn-primary me-4">
            <a href="{{url('/')}}/home" class="nav-link text-light">back</a>
        </div>

        <!-- searchbar -->
        <form action="">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" value="{{$search}}" id="search" name="search" class="form-control"
                        placeholder="search by Payments , Orders Price , Order Status , User" />
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

    </div>
    <div class="row justify-content-center m-0 p-0">

        <!-- all courses table -->
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('User', 'User')</th>
                        <th scope="col">@sortablelink('order_TotalPrice', 'Orders Price')</th>
                        <th scope="col">@sortablelink('order_status', 'Order Status')</th>
                        <th scope="col">@sortablelink('Payment', 'Payment Type')</th>
                        <th scope="col">@sortablelink('Payment', 'Payment Status')</th>
                        <th scope="col">@sortablelink('Payment', 'Transaction No')</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- foreach loop to get all users every detail -->
                    @foreach($orders as $Allorders)
                    <tr scope="row">
                        <th scope="col">{{ $Allorders['id'] }}</th>
                        <td scope="col">{{ $Allorders->User['first_name'] }}</td>
                        <td scope="col">{{ $Allorders['order_TotalPrice'] }}</td>
                        <td scope="col">{{ $Allorders['order_status'] }}</td>
                        <td scope="col">{{ $Allorders->Payment['payment_type'] }}</td>
                        <td scope="col">{{ $Allorders->Payment['payment_status'] }}</td>
                        <td scope="col">{{ $Allorders->Payment['transaction_no'] }}</td>
                        <td scope="col">
                            <a href="{{url('/')}}/AllOrders/edit/{{ $Allorders['id'] }}" class="btn">
                                <i class="fa-solid text-black fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->appends(Request::all())->links() !!}
    </div>
</div>
@endsection