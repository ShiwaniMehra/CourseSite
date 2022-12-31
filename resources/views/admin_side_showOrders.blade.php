@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($show_orders as $show_orders)

@endforeach
<div class="container justify-content-center p-5">
    <div class="btn btn-primary me-4">
        <a href="{{ url('/') }}/AllOrders/" class="nav-link text-light">back</a>
    </div>
    <div class="row justify-content-center">
        <!-- edit courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit Order') }}</h3>
                    <form method="post" action="{{ url('/') }}/AllOrders/edit/{{$show_orders->id}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="payment_id" class="form-label">{{ __(' Payment') }}</label>

                                <div class="form-outline">
                                    <input id="payment_id" type="text" disabled
                                        class="form-control @error('payment_id') is-invalid @enderror" name="payment_id"
                                        value="{{$show_orders->payment_id}}" autocomplete="payment_id" autofocus>

                                    @error('payment_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="order_TotalPrice" class="form-label">{{ __(' show_orders Price') }}</label>

                                <div class="form-outline">
                                    <input id="order_TotalPrice" type="text" disabled
                                        class="form-control @error('order_TotalPrice') is-invalid @enderror"
                                        name="order_TotalPrice" value="{{ $show_orders->order_TotalPrice }}"
                                        autocomplete="order_TotalPrice" autofocus>

                                    @error('order_TotalPrice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="order_status" class="form-label">{{ __('Order Status') }}</label>

                                <div class="form-outline">
                                    <input id="order_status" type="text"
                                        class="form-control @error('order_status') is-invalid @enderror"
                                        name="order_status" autofocus value="{{ $show_orders->order_status }}">

                                    @error('order_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="user_id" class="form-label">{{ __('User') }}</label>

                                <div class="form-outline">
                                    <input id="user_id" type="text" disabled
                                        class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                        autofocus value="{{ $show_orders->user_id }}">

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ms-auto form-outline">
                            <button type="submit" class="btn btn-primary">
                                {{ __('edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection