<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
{{-- @vite('resources/css/app.css') --}}
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

        <header class="absolute top-0 left-0 z-10 flex items-center w-full bg-transparant">
            <div class="container">
                <div class="relative flex items-center justify-between">
                    <div class="px-4">
                        <a href="#home" class="block py-4 ">
                            <img src="{{asset('img/upload.png')}}" alt="" width="40" class="float-left mr-4 md:w-16"><span class="text-xl font-extrabold dark:text-white">
                              Galeryku
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center px-4">
                        <button id="humburger" name="humburger" type="button" class="absolute block right-5 lg:hidden">
                            <span class="transition duration-300 ease-in-out origin-top-left humburger-line"></span>
                            <span class="transition duration-300 ease-in-out humburger-line"></span>
                            <span class="transition duration-300 ease-in-out origin-bottom-left humburger-line"></span>
                        </button>
                        <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg
                        rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent
                        lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-black dark:shadow-slate-700 lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                        @guest
                        @if (Route::has('login'))

                        <li class="group ">
                            <a href="{{ route('login') }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="group">
                            <a href="{{ route('register') }}"  class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="group ">
                            <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500" data-dropdown-trigger="hover" class="text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">{{ Auth::user()->name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                                </button>

                                <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                                      <li>
                                        <a href="{{ route('logout') }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>

                                      </li>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <li>
                                        {{-- <a href="{{ route('edit', auth()->user()->id) }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-blue-500 dark:text-white">
                                            Edit Profile
                                        </a> --}}
                                    </li>
                                    </ul>
                                </div>
                        </li>
                        @endguest
            </ul>
                </nav>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
        @vite('resources/js/js.js')

</body>
</html>
