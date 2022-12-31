@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container-fluid justify-content-center m-0 p-0">
    <div class="container d-flex mb-5 float-left">

        <div class="btn btn-primary me-4">
            <a href="{{url('/')}}/home" class="nav-link text-light">back</a>
        </div>
        <form action="">
                <div class="input-group">
                <div class="form-outline">
                    <input type="search" size="34" value="{{$search}}" id="search" name="search" class="form-control" placeholder="search by Title ,  Price , Duration" />
                </div>
            <button class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
    </div>

    <div class="row justify-content-center p-0 m-0">
        <!-- all courses table -->
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('title', 'Title')</th>
                        <th scope="col">@sortablelink('description', 'Description')</th>
                        <th scope="col">@sortablelink('speaker_id', 'Speaker')</th>
                        <th scope="col">@sortablelink('course_price', 'Price')</th>
                        <th scope="col">@sortablelink('duration', 'Duration')</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminCourses as $AllCourses)
                    <tr>
                        <th scope="col">{{ $AllCourses['id'] }}</th>
                        <td scope="col">{{ $AllCourses['title'] }}</td>
                        <td style="display:block; text-overflow: ellipsis; width: 300px; overflow: hidden; white-space: nowrap;"
                            scope="col">{{ $AllCourses['description'] }}</td>
                        <td scope="col">{{ $AllCourses->Speaker['speaker'] }}</td>
                        <td scope="col">{{ $AllCourses['course_price'] }}</td>
                        <td scope="col">{{ $AllCourses['duration'] }}</td>
                        <td scope="col">
                            <a href="{{url('/')}}/courses/edit/{{ $AllCourses['id'] }}"><i
                                    class="fa-solid text-black fa-pen-to-square"></i></a>
                            <a href="{{url('/')}}/courses/delete/{{ $AllCourses['id'] }}"><i
                                    class="fa-solid text-black fa-trash"></i></a>

                            <a href="{{url('/')}}/courses/view/{{ $AllCourses['id'] }}" class="btn"><i
                                    class="fa-solid text-black fa-eye"></i></a>
                        </td>
                        @endforeach
                </tbody>
            </table>
            {!! $adminCourses->appends(Request::all())->links() !!}

        </div>
        <!-- add courses form -->
        <div class="col-md-3 p-0 m-0">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Add Course') }}</h3>
                    <form method="POST" action="{{ url('/') }}/courses">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title" class="form-label">{{ __(' Title') }}</label>

                                <div class="form-outline">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{old('title')}}" autocomplete="title" autofocus>

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
                                        name="description" value="{{ old('description') }}" autocomplete="description"
                                        autofocus>

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
                                    <option value=" {{$allTopics['id']}}">{{$allTopics['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <select class="form-select" name="speaker_id" id="speaker_id">
                                    <option value="">SELECT SPEAKER</option>
                                    @foreach ($speakers as $allSpeakers)
                                    <option value=" {{$allSpeakers['id']}}">{{$allSpeakers['speaker']}}</option>
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
                                        name="course_price" autofocus value="{{ old('course_price') }}">

                                    @error('course_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="video" class="form-label">{{ __('Video') }}</label>

                                <div class="form-outline">
                                    <input id="video" name="video" type="text"
                                        class="form-control @error('video') is-invalid @enderror" autofocus
                                        value="{{ old('video') }}">

                                    @error('video')
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
                                        autofocus value="{{ old('duration') }}">

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
                                {{ __('Add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection