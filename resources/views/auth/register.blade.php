@extends('layouts.auth')

@section('title','Join ITLib')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-light">
                <div class="border border-dark rounded py-4 px-2 mx-3" style="background-color: #101a1f">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" style="background-color: #040e11" class="form-control border border-dark text-light @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" style="background-color: #040e11" class="form-control border border-dark text-light @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input type="password" style="background-color: #040e11" class="form-control border border-dark text-light @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input type="password" style="background-color: #040e11" class="form-control border border-dark text-light"
                                       name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-4 border-bottom border-dark pb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-light btn-sm w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <p class="text-center my-0">Have an account? <a href="{{route('login')}}" class="text-decoration-none">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
@endsection
