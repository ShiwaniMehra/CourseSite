@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex flex-column flex-shrink-0 p-0" style="width: 380px;">

        <ul class="nav nav-pills flex-column mb-auto list-group text-center">

            <li class="nav-item bg-primary mb-2 list-group-item list-group-item">
                <a href="/courses" class="nav-link  text-light"> Courses </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/users" class="nav-link  text-light"> Users </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/payments" class=" nav-link  text-light"> Payments </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/topics" class="nav-link  text-light"> Topic </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/CourseCat" class=" nav-link  text-light"> Course Category </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/CourseSubCat" class=" nav-link  text-light"> Course Sub Category </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/AllOrders" class=" nav-link  text-light"> All Orders </a>
            </li>
            <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/ReturnedOrders" class=" nav-link  text-light"> Returned Orders </a>
            </li>
            <!-- <li class="nav-item bg-primary mb-2 list-group-item">
                <a href="{{url('/')}}/RefundedOrders" class=" nav-link  text-light"> Refunded Orders </a>
            </li> -->

        </ul>

    </div>
    
</div>
@endsection