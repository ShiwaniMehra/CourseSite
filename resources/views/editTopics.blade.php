@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($EditTopic as $edit_topic)

@endforeach
<div class="container justify-content-center p-5">
    <div class="btn btn-primary me-4">
        <a href="{{ url('/') }}/topics" class="nav-link text-light">back</a>
    </div>
    <div class="row justify-content-center">
        <!-- edit courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit Course') }}</h3>
                    <form method="post" action="{{ url('/') }}/topics/edit/{{$edit_topic->id}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title" class="form-label">{{ __(' Topic Name') }}</label>
                                <div class="form-outline">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{$edit_topic->title}}" autocomplete="title" autofocus>

                                    @error('title')
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