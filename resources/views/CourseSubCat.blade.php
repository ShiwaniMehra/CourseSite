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
                        placeholder="search by Course Sub Category ,Topic" />
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <!-- all courses table -->
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('course_sub_name', 'Course Sub Category')</th>
                        <th scope="col">@sortablelink('topic_id', 'Topic')</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($CourseSubCats as $AlCourseSubCat)
                    <tr scope="row" class="">
                        <th scope="col">{{ $AlCourseSubCat['id'] }}</th>
                        <td scope="col">{{ $AlCourseSubCat['course_sub_name'] }}</td>
                        <td scope="col">{{ $AlCourseSubCat->Topic['title'] }}</td>
                        <td scope="col">
                            <a href="{{url('/')}}/CourseSubCat/edit/{{ $AlCourseSubCat['id'] }}">
                                <i class="fa-solid text-black fa-pen-to-square"></i></a>
                            <a href="{{url('/')}}/CourseSubCat/delete/{{ $AlCourseSubCat['id'] }}">
                                <i class="fa-solid text-black fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $CourseSubCats->appends(Request::all())->links() !!}
        </div>
    </div>
    @endsection