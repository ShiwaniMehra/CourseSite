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
                        placeholder="search by Amount , Transaction No" />
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
                        <th scope="col">
                            @sortablelink('amount','Refunded Amount')    
                        </th>
                        <th scope="col">@sortablelink('transaction_no', 'Transaction No')</th>
                    </tr>
                </thead>
                <tbody class="m-auto">
                    <!-- foreach loop to get all users every detail -->
                    @foreach($refunded as $refunded_orders)
                    <tr scope="row">
                        <th scope="col">{{ $refunded_orders['amount'] }}</th>
                        <td scope="col">{{ $refunded_orders['transaction_no'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-left: 60%;">{!! $refunded->appends(Request::all())->links() !!}</div>
        </div>
    </div>
    @endsection