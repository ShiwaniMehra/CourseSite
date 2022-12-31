@extends('layouts.navbarAndHeader')

@section('nav')

<div class="container">

<div class="container d-flex mb-5 float-left">
        <!-- back button -->
        <div>
            <a href="{{url('/')}}/myOrders" class="nav-link text-light btn btn-primary">back</a>
        </div>
    </div>
    
    @foreach ($ViewOrder as $SingleOrderView)
    @if($SingleOrderView->order_status == 'Refunded')
        <div class="card mb-3  my-5 p-3">
            <div class="row g-0 p-0 m-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="alert alert-danger">This Course Already Refunded</h3>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-3  my-5 p-3">
            <div class="row g-0 p-0 m-0">
                <div class="col-md-4 mb-0 pb-0">
                    <iframe style="margin: 0px; padding: 0%; width:100%; height:100%"
                        src="{{ $SingleOrderView->Course['video'] }}"
                        title="Complete Road Map To Prepare NLP-Follow This Video-You Will Able to Crack Any DS Interviews"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text fw-bold">{{ $SingleOrderView->Course['title'] }}</p>
                        <p class="card-text">{{ $SingleOrderView->Course->description }}</p>
                        <p class="card-text">Price:{{ $SingleOrderView->orderItem_price }} </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
</div>

@endsection
