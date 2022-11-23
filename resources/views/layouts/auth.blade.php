<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
{{--background-image: linear-gradient(#034,black)--}}
<body style="background-color: #040e11;">
<div class="col-md-6 my-4 mx-auto">

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show pb-0" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
<div id="app" class="my-5">
    <div>
        <svg aria-hidden="true" viewBox="0 0 27 27" version="1.1" style="fill:white" height="90" width="100%"
             data-view-component="true"><a href="{{route('books.index')}}">
            <path fill-rule="evenodd"
                  d="m14 14c-2-1-4-1-5-1l0 0v-6c1 0 3 0 5 1 2-1 4-1 5-1v6c-1 0-3 0-5 1m4-2v-4c-1 0-2 0-3 .6l0 3.9c1-.5 2-.5 3-.5m-5 .5v-3.9c-1-.6-2-.6-3-.6v4c1 0 2 0 3 .5m-4 2.5v4h1l0-4zm4 4 0-3-1.5 0 0-1 4 0 0 1-1.5 0 0 3zm4-4v4h2l0-1h-1l0-3zm4-11c-1-1-3-1-3-2l0-1c2 1 3 1 4 2 2 2 1 3 2 3 1 2 1 3 0 3-2-6-4-4-3-5m-8-4c-4 2-3 0-4 1-3 1-1-1-3 2-1 2-3 2-2 4-4 4-2 3-2 4-1 5 0 2.6667 0 4-1 1 0 0 1 4 0-1 2 1 2 3 6 2 2 3 5 3 1.3333 0 2 1 4 0 1-1 2 0 6-1l-1-1c-2 0 1-1-3 0-3 1-6 1-6 0-2-1 0-2-3-2-1-.3333 0-2-2-3-2-1-2-4-1-6-1-3 0-2 2-5 .6667-1-3 1 2-3-1 0 0-2 5-2 1 0 2-1 1-2m8 22c1 1 1-2 2-3 1-2 2-3 2-2 1-3 0-3 0-6l-1 2c0 0 1 1-1 4-1 1-2 1-2 4z"></path>
            </a>
        </svg>
    </div>
    <main class="mt-5">
        @yield('content')
    </main>
</div>
</body>
</html>
