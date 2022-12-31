@extends('layouts.navbarAndHeader')

@section('nav')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container-fluid justify-content-center p-0 m-0">
     <div class="container d-flex mb-5">
        <!-- back button -->
        <div>
            <a href="{{url('/')}}/myOrders" class="nav-link text-light btn btn-primary">back</a>
        </div>
    </div>
    <div class="row justify-content-center p-0 m-0">
        <!-- all courses table -->
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($returnItem as $items)
                    <tr>
                        <td scope="col">{{ $items->Course['title'] }}</td>
                        <td scope="col">
                            @if($items->order_status == 'Refunded')
                                <span style="background-color: red; padding: 8px; border-radius:10px">Already Refunded</span>
                            @else
                                <a class="btn btn-success" href="{{url('/')}}/refund/{{ $items['id']}}">REFUND</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- add courses form -->

    </div>
</div>
@endsection
