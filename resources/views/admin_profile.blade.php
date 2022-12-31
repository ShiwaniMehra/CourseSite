@extends('layouts.app')

@section('content')
@foreach($adminData as $admin_info)

@endforeach
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container">
    
    <section class="gradient-custom">
        <div class="btn btn-primary me-4">
            <a href="{{url('/')}}/home" class="nav-link text-light">back</a>
        </div>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">{{ __('Edit Admin Profile') }}</h3>
                            <form method="POST" action="{{ url('/') }}/admin/{{ $admin_info->id }}" enctype="multipart/form-data">
                                @csrf
                               <div class="row">                       <!--  DONE   -->
                                    <div class="col-md-5 mb-4">
                                        <div class="float-start">
                                            <img class="rounded-circle" style="width: 150px; height: 150px;" src="/images/{{$admin_info->avatar}}">
                                        </div>
                                
                                        <div class="mt-5">
                                            <input id="avatar" type="file" style="width: 95px; height: 35px;"
                                                class="form-control float-end mt-5 @error('avatar') is-invalid @enderror" name="avatar" value="{{$admin_info->avatar}}"
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
                                    <div class="col-md-6 mb-4">
                                        <label for="first_name" class="form-label">{{ __(' First Name') }}</label>

                                        <div class="form-outline">
                                            <input id="first_name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ $admin_info->first_name }}"
                                                autocomplete="first_name" autofocus>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="last_name" class="form-label">{{ __(' Last Name') }}</label>

                                        <div class="form-outline">
                                            <input id="last_name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ $admin_info->last_name }}"
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
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>

                                        <div class="form-outline">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                autofocus value="{{ $admin_info->email }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="phone" class="form-label">{{ __('Phone') }}</label>

                                        <div class="form-outline">
                                            <input id="phone" type="tel"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                autofocus value="{{ $admin_info->phone }}">

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
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection