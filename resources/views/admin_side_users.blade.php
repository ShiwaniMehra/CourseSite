@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container-fluid justify-content-center">
    <div class="container d-flex mb-5 float-left">

        <!-- back button -->
        <div class="btn btn-primary me-4">
            <a href="{{url('/')}}/home" class="nav-link text-light">back</a>
        </div>

        <!-- searchbar -->
        <form action="">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" value="{{$search}}" id="search" name="search" class="form-control"
                        placeholder="search by First Name , Last Name , Email , Phone" />
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

    </div>
    <div class="row justify-content-center m-0 p-0">

        <!-- all courses table -->
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('avatar', 'Avatar')</th>
                        <th scope="col">@sortablelink('first_name', 'First Name')</th>
                        <th scope="col">@sortablelink('last_name', 'Last Name')</th>
                        <th scope="col">@sortablelink('email', 'Email')</th>
                        <th scope="col">@sortablelink('phone', 'Phone')</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- foreach loop to get all users every detail -->
                    @foreach($users as $AllUsers)
                    <tr scope="row">
                        <th scope="col">{{ $AllUsers['id'] }}</th>
                        <td scope="col"><img style="width: 100px; height: 100px;" src="/images/{{$AllUsers ->avatar}}" /></td>
                        <td scope="col">{{ $AllUsers['first_name'] }}</td>
                        <td scope="col">{{ $AllUsers['last_name'] }}</td>
                        <td scope="col">{{ $AllUsers['email'] }}</td>
                        <td scope="col">{{ $AllUsers['phone'] }}</td>
                        <td scope="col">
                            <a href="{{url('/')}}/users/edit/{{ $AllUsers['id'] }}" class="btn">
                                <i class="fa-solid text-black fa-pen-to-square"></i>
                            </a>
                            <a href="{{url('/')}}/users/delete/{{ $AllUsers['id'] }}" class="btn">
                                <i class="fa-solid text-black fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->appends(Request::all())->links() !!}
        </div>
        <div class="col-4 col-lg-4 col-xl-4">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{ __('Add User') }}</h3>
                <form method="POST" action="{{ url('/') }}/users">
                    @csrf

                     <div class="row">               <!--  DONE   -->
                        <div class="col-md-12 mb-4">
                            <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                           <div class="form-outline">
                                <input id="avatar" type="file"
                                    class="form-control @error('avatar') is-invalid @enderror" name="avatar" autocomplete="avatar" autofocus>
        
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
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name" autocomplete="first_name" autofocus>
        
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
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" autocomplete="last_name" autofocus>
        
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" autofocus>
        
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
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" autofocus>
        
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="form-outline">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" autofocus>
        
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
        
                            <div class="form-outline">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                    autocomplete="password-confirm" autofocus>
        
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
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