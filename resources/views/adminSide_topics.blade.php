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
                        placeholder="search by Topic" />
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <!-- all courses table -->
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('title', 'Topics')</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $AllTopics)
                    <tr scope="row" class="">
                        <th scope="col">{{ $AllTopics['id'] }}</th>
                        <td scope="col">{{ $AllTopics['title'] }}</td>
                        <td scope="col">
                            <a href="{{url('/')}}/topics/edit/{{ $AllTopics['id'] }}">
                                <i class="fa-solid text-black fa-pen-to-square"></i>
                            </a>
                            <a href="{{url('/')}}/topics/delete/{{ $AllTopics['id'] }}">
                                <i class="fa-solid text-black fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $topics->appends(Request::all())->links() !!}
        </div>
        <!-- add courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Add Topic') }}</h3>
                    <form method="POST" action="{{ url('/') }}/topics">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title" class="form-label">{{ __(' Topic Name') }}</label>
                                <div class="form-outline">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{old('title')}}" autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        role=?alert?? <strong>{{ $message }}</strong>
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