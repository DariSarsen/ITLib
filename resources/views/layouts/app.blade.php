<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css', 'resources/js/main.js'])

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendor/simple-datatables/style.css" rel="stylesheet">


</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('books.index')}}" class="logo d-flex align-items-center text-decoration-none">
            <svg aria-hidden="true" viewBox="0 0 27 27" version="1.1" style="fill: #012970" height="40"
                 data-view-component="true" class="d-none d-lg-block">
                <path fill-rule="evenodd"
                      d="M14 14C12 13 10 13 9 13V7C10 7 12 7 14 8 16 7 18 7 19 7V13C18 13 16 13 14 14ZM18 12V8C17 8 16 8 15 8.6L15 12.5C16 12 17 12 18 12M13 12.5V8.5C12 8 11 8 10 8V12C11 12 12 12 13 12.5M9 15V19H10L10 15ZM13 19 13 16 11.5 16 11.5 15 15.5 15 15.5 16 14 16 14 19ZM17 15V19H19L19 18H18L18 15ZM21 4C20 3 18 3 18 2L18 1C20 2 21 2 22 3 24 5 23 6 24 6 25 8 25 9 24 9 22 3 20 5 21 4M13 0C9 2 10 0 9 1 6 2 8 0 6 3 5 5 3 5 4 7 0 11 2 10 2 11 1 16 2 13.6667 2 15 1 16 2 15 3 19 3 18 5 20 5 22 11 24 7 25 10 25 11.3333 25 12 26 14 25 15 24 16 25 20 24L19 23C17 23 20 22 16 23 13 24 10 24 10 23 8 22 10 21 7 21 6 20.6667 7 19 5 18 3 17 3 14 4 12 3 9 4 10 6 7 6.6667 6 3 8 8 4 7 4 8 2 13 2 14 2 15 1 14 0M22 22C23 23 23 20 24 19 25 17 26 16 26 17 27 14 26 14 26 11L25 13C25 13 26 14 24 17 23 18 22 18 22 21Z"></path>
            </svg>
            <span class="d-none d-lg-block mx-2">ITLib</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @isset($search)
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="GET" action="{{route($search.'.search')}}">
                <input type="text" name="search_{{$search}}" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->
    @endisset
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            {{--            <li class="nav-item d-block d-lg-none">--}}
            {{--                <a class="nav-link nav-icon search-bar-toggle " href="#">--}}
            {{--                    --}}
            {{--                </a>--}}
            {{--            </li><!-- End Search Icon-->--}}

            <li class="nav-item d-block mx-3">
                <a aria-haspopup="true" class="nav-link" data-bs-toggle="dropdown">

                    <span class="mx-2">
                    <i class="ri-translate-2"></i>
                        {{config('app.languages')[app()->getLocale()]}}
                    </span>
                    <span style="border-left: 1px solid rgb(187, 187, 187);"> </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @foreach(config('app.languages') as $key => $lang)
                        <a class="dropdown-item" href="{{route('changeLang',$key)}}">{{$lang}}</a>
                    @endforeach
                </div>

                    <li class="nav-item dropdown pe-3">
                        @guest
                            <ul class="navbar-nav ms-auto">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold fs-5"
                                           href="{{ route('login') }}">{{ __('appword.login') }}</a>
                                    </li>
                                @endif
                            </ul>
                        @else
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                               data-bs-toggle="dropdown">
                                <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6>{{ Auth::user()->name }}</h6>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('user.profile')}}">
                                        <i class="bi bi-person"></i>
                                        <span>{{ __('appword.myprofile') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                       href="{{route('user.favourites')}}">
                                        <i class="bi bi-star"></i>
                                        <span>{{ __('appword.favourites') }}</span>
                                    </a>
                                </li>
                                {{--                        <li>--}}
                                {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--                                <i class="bi bi-bell"></i>--}}
                                {{--                                <!--                            <span class="badge bg-primary badge-number">4</span>-->--}}
                                {{--                                <span>Notifications</span>--}}
                                {{--                            </a>--}}
                                {{--                        </li>--}}

                                {{--                        <li>--}}
                                {{--                            <hr class="dropdown-divider">--}}
                                {{--                        </li>--}}
                                {{--                        <li>--}}
                                {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--                                <i class="bi bi-chat-left-text"></i>--}}
                                {{--                                <!--                            <span class="badge bg-success badge-number">3</span>-->--}}
                                {{--                                <span>Messages</span>--}}
                                {{--                            </a>--}}
                                {{--                        </li>--}}
                                {{--                        <li>--}}
                                {{--                            <hr class="dropdown-divider">--}}
                                {{--                        </li>--}}
                                {{--                        <li>--}}
                                {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--                                <i class="bi bi-gear"></i>--}}
                                {{--                                <span>Account Settings</span>--}}
                                {{--                            </a>--}}
                                {{--                        </li>--}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                       href="{{route('feedbacks.create')}}">
                                        <i class="bi bi-question-circle"></i>
                                        <span>{{ __('appword.needhelp') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>{{ __('appword.logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>


                            </ul><!-- End Profile Dropdown Items -->

                        @endguest
                    </li><!-- End Profile Nav -->


                </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @can('viewAny', \App\Models\Category::class)
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>{{ __('appword.management') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @can('create',\App\Models\Book::class)
                        <li>
                            <a href="{{route('books.create')}}">
                                <i class="bi bi-circle"></i><span>{{ __('appword.addnewbook') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('viewTrash',\App\Models\Book::class)
                        <li>
                            <a href="{{route('books.trash')}}">
                                <i class="bi bi-circle"></i><span>{{ __('appword.trashbooks') }}</span>
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{route('users.index')}}">
                            <i class="bi bi-circle"></i><span>{{ __('appword.users') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('categories.index')}}">
                            <i class="bi bi-circle"></i><span>{{ __('appword.categories') }}</span>
                        </a>
                    </li>
                    @can('viewAny',\App\Models\Feedback::class)
                        <li>
                            <a href="{{route('feedbacks.index')}}">
                                <i class="bi bi-circle"></i><span>{{ __('appword.feedbacks') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

        @endcan


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('books.index')}}">
                <i class="bi bi-grid"></i>
                <span>{{ __('appword.home') }}</span>
            </a>
        </li>


        @isset($categories)
            <li class="nav-heading">{{ __('appword.categories') }}</li>
            @foreach($categories as $cat)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('books.category', $cat->id)}}">
                        <span>{{$cat->name == 'Others'?  __('appword.others') : $cat->name}}</span>
                    </a>
                </li>
            @endforeach
        @endisset



    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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


    @yield('content')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
{{--<footer id="footer" class="footer">--}}
{{--    <div class="copyright">--}}
{{--        &copy; Copyright <strong><span>ITLib</span></strong>. All Rights Reserved--}}
{{--    </div>--}}
{{--    <div class="credits">--}}
{{--    </div>--}}
{{--</footer>--}}
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/vendor/chart.js/chart.min.js"></script>
<script src="/vendor/echarts/echarts.min.js"></script>
<script src="/vendor/quill/quill.min.js"></script>
<script src="/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/vendor/tinymce/tinymce.min.js"></script>
<script src="/vendor/php-email-form/validate.js"></script>

</body>

</html>
