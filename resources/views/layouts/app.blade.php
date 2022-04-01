<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    @livewireStyles
</head>
<body>
    @include('layouts.navigation')
    <div class="overlay"></div>
    <div class="main-wrapper pb-0">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button
                                        class="dropdown-toggle bg-transparent border-0"
                                        type="button"
                                        id="profile"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                >
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ Auth::user()->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                            <a href="{{ route('profile') }}"> <i class="lni lni-user"></i> {{ __('My profile') }}</a>
                                            {{-- <a href="#"> <i class="lni lni-user"></i> {{ __('My profile') }}</a> --}}
                                    </li>
                                    <li>
                                        {{-- <a href="{{ route('profile') }}"> <i class="lni lni-user"></i> {{ __('My profile') }}</a> --}}
                                        <a href="{{route('setting.index')}}"> <i class="lni lni-user"></i> {{ __('Setting') }}</a>
                                </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                        {{-- <form method="POST" action=""> --}}
                                        @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('Logout') }}</a>
                                            {{-- <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('Logout') }}</a> --}}
                                        </form>
                                </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                    </div>
                </div>
            </div>
        </header>

        <section class="section">
            <div class="container-fluid">
                    @yield('content')
            </div>
        </section>
    </div>
    @livewireScripts
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
