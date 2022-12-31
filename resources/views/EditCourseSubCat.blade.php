@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($EditallCourseSubCat as $EditCourseSubCat)

@endforeach
<div class="container justify-content-center p-5">
    <div class="btn btn-primary me-4">
        <a href="{{url('/')}}/home" class="nav-link text-light">back</a>
    </div>
    <div class="row justify-content-center">
        <!-- edit courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit Course Sub Category') }}</h3>
                    <form method="post" action="{{ url('/') }}/CourseSubCat/edit/{{ $EditCourseSubCat->id }}">
                        @csrf
                        <div class="row m-auto">
                            <div class="col-md-12 mb-4">
                                <label for="course_sub_name" class="form-label">{{ __(' Topic') }}</label>
                                <select class="form-select" name="topic_id" id="topic_id">
                                    <option value="">SELECT TOPICS</option>
                                    @foreach ($topics as $allTopics)
                                    @if($allTopics->id == $EditCourseSubCat->topic_id)
                                    <option selected value=" {{$allTopics->id}}">{{$allTopics->title}}</option>
                                    else
                                    <option value=" {{$allTopics->id}}">{{$allTopics->title}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="course_sub_name" class="form-label">{{ __(' Course Sub Category') }}</label>
                                <div class="form-outline">
                                    <input id="course_sub_name" type="text"
                                        class="form-control @error('course_sub_name') is-invalid @enderror"
                                        name="course_sub_name" value="{{ $EditCourseSubCat->course_sub_name }}"
                                        autocomplete="course_sub_name" @error('course_sub_name') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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