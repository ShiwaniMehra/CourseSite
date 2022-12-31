@extends('layouts.navbarAndHeader')

@section('nav')

<div class="container">
    <section class=gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{ __('Register') }}</h3>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                       <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                                        <div class="form-outline">
                                            <input id="avatar" type="file"
                                               class="form-control @error('avatar') is-invalid @enderror"
                                                name="avatar"
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
                                                name="first_name" value="{{ old('first_name') }}"
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
                                                name="last_name" value="{{ old('last_name') }}" autocomplete="last_name"
                                                autofocus>

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
                                                autofocus>

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
                                                autofocus>

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
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" autofocus>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>

                                        <div class="form-outline">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password_confirmation" autocomplete="password-confirm" autofocus>

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
                                        {{ __('Register') }}
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