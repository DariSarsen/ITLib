@extends('layouts.auth')

@section('title','Sign in to ITLib')

@section('content')
    <div class="container mx-5 mx-auto">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-light">

                <div class="border border-dark rounded py-4 px-2 mx-3" style="background-color: #101a1f">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" style="background-color: #040e11" class="form-control border border-dark text-light @error('email') is-invalid @enderror"
                                       name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input type="password"
                                       style="background-color: #040e11" class="form-control border border-dark text-light @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--                        <div class="row mb-3">--}}
                        {{--                            <div class="col-md-6 offset-md-4">--}}
                        {{--                                <div class="form-check">--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                        {{--                                    <label class="form-check-label" for="remember">--}}
                        {{--                                        {{ __('Remember Me') }}--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="row mb-4 border-bottom border-dark pb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-light btn-sm w-100">
                                    {{ __('Login') }}
                                </button>

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
                            </div>
                        </div>

                        <p class="text-center my-0">Don't have an account yet? <a href="{{route('register')}}" class="text-decoration-none">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
