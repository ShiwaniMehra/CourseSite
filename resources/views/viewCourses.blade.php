@extends('layouts.app')

@section('content')
@foreach($viewCourse as $course_info)

@endforeach
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container">
    <div class="btn btn-primary me-4">
        <a href="{{ url('/') }}/courses/" class="nav-link text-light">back</a>
    </div>
    <div class="col-12 col-lg-9 col-xl-7 m-auto">
        <div class="card mb-3">
            <div class="row g-0 p-0 m-0">
                
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $course_info->title }}</b></h5>
                        <p class="card-text">{{ $course_info->description }}</p>
                        <p class="card-text">{{ __('Price ') }}{{ $course_info->course_price }}</p>
                        <p class="card-text">{{ __('Duration ') }}{{ $course_info->duration }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection