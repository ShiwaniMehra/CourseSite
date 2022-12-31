@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($EditCourse as $edit_course)

@endforeach
<div class="container justify-content-center p-5">
    <div class="btn btn-primary me-4">
        <a href="{{ url('/') }}/courses/" class="nav-link text-light">back</a>
    </div>
    <div class="row justify-content-center">
        <!-- edit courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit Course') }}</h3>
                    <form method="post" action="{{ url('/') }}/courses/edit/{{$edit_course->id}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title" class="form-label">{{ __(' Title') }}</label>

                                <div class="form-outline">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{$edit_course->title}}" autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="description" class="form-label">{{ __(' Description') }}</label>

                                <div class="form-outline">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ $edit_course->description }}"
                                        autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row m-auto">
                            <div class="col-md-6 mb-4">
                                <select class="form-select" name="topic_id" id="topic_id">
                                    <option value="">SELECT TOPICS</option>
                                    @foreach ($topics as $allTopics)
                                    @if($allTopics->id == $edit_course->topic_id)
                                    <option selected value=" {{$allTopics['id']}}">{{$allTopics['title']}}</option>
                                    @else
                                    <option value=" {{$allTopics['id']}}">{{$allTopics['title']}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <select class="form-select" name="speaker_id" id="speaker_id">
                                    <option value="">SELECT SPEAKER</option>
                                    @foreach ($speakers as $allSpeakers)
                                    @if($allSpeakers->id == $edit_course->speaker_id)
                                    <option selected value=" {{$allSpeakers['id']}}">{{$allSpeakers['speaker']}}
                                    </option>
                                    @else
                                    <option value=" {{$allSpeakers['id']}}">{{$allSpeakers['speaker']}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="course_price" class="form-label">{{ __('Price') }}</label>

                                <div class="form-outline">
                                    <input id="course_price" type="text"
                                        class="form-control @error('course_price') is-invalid @enderror"
                                        name="course_price" autofocus value="{{ $edit_course->course_price }}">

                                    @error('course_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="duration" class="form-label">{{ __('Duration') }}</label>

                                <div class="form-outline">
                                    <input id="duration" type="text"
                                        class="form-control @error('duration') is-invalid @enderror" name="duration"
                                        autofocus value="{{ $edit_course->duration }}">

                                    @error('duration')
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