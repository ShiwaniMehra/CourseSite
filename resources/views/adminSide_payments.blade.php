@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container justify-content-center p-5">
    <div class="container d-flex mb-5 float-left">

        <div class="btn btn-primary me-4">
            <a href="{{url('/')}}/home" class="nav-link text-light">back</a>

        </div>
        <form action="">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" value="{{$search}}" id="search" name="search" class="form-control"
                        placeholder="search by Payment Type , Payment Status , 	Transaction No" />
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

    </div>
    <div class="row justify-content-center">
        <!-- all payments table -->
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('payment_type', 'Payment Type')</th>
                        <th scope="col">@sortablelink('payment_status', 'Payment Status')</th>
                        <th scope="col">@sortablelink('transaction_no', 'Transaction No')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $AllPayments)
                    <tr scope="row" class="">
                        <th scope="col">{{ $AllPayments['payment_type'] }}</th>
                        <td scope="col">{{ $AllPayments['payment_status'] }}</td>
                        <td scope="col">{{ $AllPayments['transaction_no'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $payments->appends(Request::all())->links() !!}
        </div>
    </div>
    @endsection