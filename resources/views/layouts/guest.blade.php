<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'One Oasis Condo Reservation') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/c697883dae.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

        <!-- Styles -->
        {{-- <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" /> --}}
        <link rel="icon" href="https://demos.creative-tim.com/argon-design-system-pro/assets/img/apple-icon.png" type="image/png">
        <link rel="stylesheet" href="{{ asset('dist/nouislider.min.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">



        <style>

            .display-none {
                display: none;
            }

            .btn-custom2 {
                border-color: rgb(255, 56, 92) !important;
                background-color: rgb(255, 56, 92) !important;
                color: rgb(248, 247, 247) !important;
            }
            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }
        </style>

        @livewireStyles


    </head>
    <body class="font-sans antialiased bg-light">
        {{-- <x-jet-banner />
        @livewire('navigation-menu') --}}

        <!-- Page Heading -->
        <div class="header bg-white border-bottom shadow mb-4" style="height: 5.3em;">
            <div class="container-lg">
                <header class="d-flex flex-wrap justify-content-center py-3 ">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none nav">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fw-bold fs-3" style="color: rgb(4,83,132);">One <span style="color: rgb(75, 152, 48);">Oasis</span></span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/home" class="nav-link rounded-pill nav-custom {{ request()->routeIs('guest.home') || request()->routeIs('guest.category') ? 'active' : '' }}" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="{{ route('guest.about') }}" class="nav-link rounded-pill nav-custom {{ request()->routeIs('guest.about') ? 'active' : '' }}">About</a></li>
                    <li class="nav-item"><a href="{{ route('guest.faq') }}" class="nav-link rounded-pill nav-custom {{ request()->routeIs('guest.faq') ? 'active' : '' }}">FAQs</a></li>
                    <li class="nav-item"><a href="/login" class="nav-link rounded-pill nav-custom active">Login</a></li>
                </ul>
                </header>
            </div>
            <hr style="position: relative; bottom: 13px; color:rgb(54, 54, 54)">
          </div>


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- FOOTER -->
        <footer class="footer mt-auto py-1 bg-white border-top">
            <hr style="position: relative; bottom: 22px; color:gray">
            <div class="container">
                <p class="float-end"><a href="#">Back to top <i class="fa-solid fa-angle-up"></i></a></p>
                <p>&copy; 2022 One Oasis, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </div>
        </footer>
        {{-- <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer> --}}

        @stack('modals')

        <script src="{{ asset('colorlib-wizard-30/js/jquery-3.3.1.min.js') }}"></script>
        {{-- <script src="{{ asset('js/wizard.js') }}"></script> --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('dist/nouislider.min.js') }}"></script>

        <script>
            window.addEventListener('closeModal', event => {
                $("#reservationModal").modal('hide');                
            })
        </script>
        
        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

        @stack('scripts')
    </body>
</html>
