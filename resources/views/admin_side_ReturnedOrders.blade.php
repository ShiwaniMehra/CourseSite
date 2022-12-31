@extends('layouts.app')

@section('content')

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
                        placeholder="search by User , Order , Refund" />
                </div>
                <button class="btn btn-primary">
                 <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
       <div class="row m-auto m-0 p-0">
           <!-- all courses table -->
        <div class="col-md-8 m-auto">
            <table class="table text-center">
                    <thead class="m-auto">
                        <tr>
                            <th scope="col">@sortablelink('User', 'User')</th>
                            <th scope="col">@sortablelink('User', 'Email')</th>
                            <th scope="col">@sortablelink('User', 'Phone')</th>
                            <th scope="col">@sortablelink('RefundOrder', 'Refund Amount')</th>
                            <th scope="col">@sortablelink('RefundOrder', 'Refund Transaction No')</th>
                        </tr>
                    </thead>
                    <tbody class="m-auto">
                        <!-- foreach loop to get all users every detail -->
                        @foreach($returned_orders as $returnedOrder)
                        <tr scope="row">
                            <th scope="col">{{ $returnedOrder->User['first_name'] }}</th>
                            <th scope="col">{{ $returnedOrder->User['email'] }}</th>
                            <th scope="col">{{ $returnedOrder->User['phone'] }}</th>
                            <td scope="col">{{ $returnedOrder->RefundOrder['amount'] }}</td>
                            <td scope="col">{{ $returnedOrder->RefundOrder['transaction_no'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div style="margin-left: 60%;">{!! $returned_orders->appends(Request::all())->links() !!}</div>
            </div>
        </div>
        @endsection