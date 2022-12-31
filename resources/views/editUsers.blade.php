@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach($EditUser as $editUsers)

@endforeach
<div class="container justify-content-center p-5">
    <div class="btn btn-primary me-4">
        <a href="{{ url('/') }}/users" class="nav-link text-light">back</a>
    </div>
    <div class="row justify-content-center">
        <!-- edit courses form -->
        <div class="col-md-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">{{ __('Edit User') }}</h3>
                    <form method="post" action="{{ url('/') }}/users/edit/{{$editUsers->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">                       <!--  DONE  -->
                            <div class="col-md-12 mb-4">
                                <div class="float-start">
                                    <img class="rounded-circle" style="width: 150px; height: 150px;" src="/images/{{$editUsers->avatar}}">
                                </div>
                        
                                <div class="mt-5">
                                    <input id="avatar" type="file" style="width: 95px; height: 35px;"
                                        class="form-control float-end mt-5 @error('avatar') is-invalid @enderror" name="avatar" value="{{$editUsers->avatar}}"
                                        autocomplete="avatar" autofocus>
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="first_name" class="form-label">{{ __(' First Name') }}</label>

                                <div class="form-outline">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{$editUsers->first_name}}" autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="last_name" class="form-label">{{ __(' Last Name') }}</label>

                                <div class="form-outline">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ $editUsers->last_name }}"
                                        autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="email" class="form-label">{{ __('Email') }}</label>

                                <div class="form-outline">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" autofocus value="{{ $editUsers->email }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>

                                <div class="form-outline">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        autofocus value="{{ $editUsers->phone }}">

                                    @error('phone')
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