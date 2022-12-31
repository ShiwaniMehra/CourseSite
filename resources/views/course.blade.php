@extends('layouts.navbarAndHeader')

@section('nav')

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" >
    <div class="container text-center">
        <h1 class="text-white display-1">Courses</h1>
        <div class="d-inline-flex text-white mb-3">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{url('/')}}">Home </a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase"> Courses </p>
        </div>
        <div class="mx-auto" style="width: 100%; max-width: 600px;">
            <form action="">
                <div class="input-group">
                    <input type="search" class="form-control border-light" id="search" name="search"
                        style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">  Our Courses</h6>
                    <h1 class="display-4"> Checkout New Releases Of Our Courses</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($Courses as $AllCourses) 
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                    href="{{url('/')}}/SingleCourse/view/{{$AllCourses['id']}}">
                    <iframe width="415" height="300" src="{{ $AllCourses['video'] }}"
                        title="Complete Road Map To Prepare NLP-Follow This Video-You Will Able to Crack Any DS Interviews"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3"> {{ $AllCourses['title'] }} </h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-white">&#8377;{{ $AllCourses['course_price'] }}</span>
                                <span class="text-white">
                                    <i class="fa fa-star mr-2"></i>{{ $AllCourses['duration'] }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="container mt-5">
            <div class="nav-link m-auto" style="width: 10.1%;">
                {!! $Courses->appends(Request::all())->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->
@endsection