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
    {{-- @include('layouts.navigation') --}}
    {{-- <div class="main-wrapper pb-0"> --}}

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffff">
        <div class="container">
            <a class="navbar-brand" href="/">
                {{env('APP_NAME')}}
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}"> <i class="lni lni-user"></i>
                                {{ __('My profile') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('setting.index')}}"> <i class="lni lni-user"></i>
                                {{ __('Setting') }}</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"> <i
                                        class="lni lni-exit"></i> {{ __('Logout') }}</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    <section class="section">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    {{-- </div> --}}
    @livewireScripts
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
