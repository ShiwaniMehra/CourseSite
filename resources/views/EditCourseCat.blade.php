@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($EditallCourseCat as $EditallCourseCats)

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
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit Course Category') }}</h3>
                    <form method="post" action="{{ url('/') }}/CourseCat/edit/{{$EditallCourseCats->id}}">
                        @csrf
                        <div class="row m-auto">
                            <div class="col-md-12 mb-4">
                                <label for="course_sub_id" class="form-label">{{ __(' Course Sub Category') }}</label>
                                <select class="form-select" name="course_sub_id" id="course_sub_id">
                                    <option value="">SELECT Sub Course Category</option>

                                    @foreach ($ShowCourseSubCat as $allSub)
                                    @if($allSub->id == $EditallCourseCats->course_sub_id)
                                    <option selected value=" {{$allSub['id']}}">{{$allSub->course_sub_name}}</option>
                                    else
                                    <option value=" {{$allSub['id']}}">{{$allSub->course_sub_name}}</option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="course_cat_name" class="form-label">{{ __(' Course Category') }}</label>
                                <div class="form-outline">
                                    <input id="course_cat_name" type="text"
                                        class="form-control @error('course_cat_name') is-invalid @enderror"
                                        name="course_cat_name" value="{{ $EditallCourseCats->course_cat_name }}"
                                        autocomplete="course_cat_name" autofocus>
                                    @error('course_cat_name')
                                    <span class="invalid-feedback" role="alert">
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