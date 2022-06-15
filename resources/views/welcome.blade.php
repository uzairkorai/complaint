<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            background: #ddd
        }

        header {
            background: #fff;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            padding: 0px 20px;
        }

        header img {
            margin-bottom: 20px
        }

        .nav {
            flex-grow: 1;
            padding: 20px 0px;


        }

        nav {
            /* display: flex; */

            align-items: center;
            justify-content: space-around;
            min-width: 8vh;
            font-family: 'Poppins', sans-serif;
        }

        .nav_list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            gap: 1rem;
            margin-left: 1rem;
        }


        .nav_list a {
            color: var(--clr-primary);
            text-decoration: none;
            font-size: 14px
        }

        .nav_list a:hover,
        .nav_list a:focus {
            border-bottom: 3px solid #007bff
        }

        .nav_list li:nth-of-type(1) {
            margin-left: auto;
        }

        .nav_list li:nth-of-type(11) {
            margin-left: auto;

        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 5px 20px 5px 20px;
            border-radius: 5px;
        }

        .burger {
            display: none;
            cursor: pointer;
            float: right;
        }

        .burger div {
            width: 25px;
            height: 5px;
            background-color: rgb(226, 226, 226);
            margin: 5px;
            transition: all 0.3s ease;
        }

        @media screen and (max-width:1024px) {
            .nav_list {
                width: 60%;
            }
        }

        @media screen and (max-width:1150px) {
            body {
                overflow-x: hidden
            }

            .nav_list {
                position: absolute;
                right: 0;
                height: 92vh;
                /* height: 50%; */
                top: 8vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: #fff;
                align-items: center;
                width: 30%;
                transform: translateX(100%);
                transition: transform 0.5 ease-in;
            }

            .nav_list li {
                opacity: 0;
            }

            .burger {
                display: block;
            }

            .nav_list li:nth-of-type(1) {
                margin-right: auto;
            }

            .nav_list li:nth-of-type(11) {
                margin-right: auto;
            }
        }

        .nav-active {
            transform: translateX(0%);
        }

        @keyframes navLinkFade {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0px);
            }
        }

        .toggle .line1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle .line2 {
            opacity: 0;
        }

        .toggle .line3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    @auth
        <header>
            <div>
                <img src="https://ec.com.pk/assets/img/logo.svg" class="block h-10 w-auto fill-current" alt="">
            </div>
            <nav class="nav">
                <ul class="nav_list">
                    <li> <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    </li>
                    <li><a href="">Incubator</a></li>
                    <li><a href="">Programs</a>

                    </li>
                    <li><a href="">VBC Online Learning</a></li>
                    <li><a href="">EC College</a></li>
                    <li><a href="">VVIV</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Meetups</a></li>
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('dashboard.myprofile')">
                                                           {{ __('My Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                    <li class="btn"> <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>

            </nav>
        </header>
    @else
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                            <div>

                            </div>

                        </div>
                        <br>
                        <div style="text-align: center">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        </div>
                    </form>

                </x-auth-card>
            </x-guest-layout>

        </div>
    @endauth

</body>

</html>
<script>
    const navSlide = () => {
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav_list');
        const navLinks = document.querySelectorAll('.nav_list li');

        //Toggle Nav
        burger.addEventListener('click', () => {
            nav.classList.toggle('nav-active');

            //Animate Links
            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5 ease forwards ${index / 7 + 1.5}s`;
                }
            });

            //
            burger.classList.toggle('toggle');
        });

    }

    navSlide();
</script>
