@extends('layouts.navbarAndHeader')

@section('nav')

@foreach($singleCourses as $Course)

@endforeach

<div class="container">

    <!-- Course Adding Success Message -->
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <!-- Course Adding Error Message -->
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    <div class="card mb-3">
        <div class="row g-0 p-0 m-0">
            <div class="col-md-4 mb-0 pb-0">
                <iframe style="margin: 0px; padding: 0%; width:100%; height:100%" src="{{ $Course->video }}"
                    title="Complete Road Map To Prepare NLP-Follow This Video-You Will Able to Crack Any DS Interviews"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">{{ $Course->title }}</p>
                    <p class="card-text">{{ $Course->description }}</p>
                    <p class="card-text">Course Price:&#8377;{{ $Course->course_price }}</p>
                    <p class="card-text">Course Duration:{{ $Course->duration }}</p>

                    <a href="{{url('/')}}/add_to_cart/{{$Course->id}}" role="button" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection