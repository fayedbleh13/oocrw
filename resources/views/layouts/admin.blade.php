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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
       
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        

        <style>
           
      
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
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
              <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">One Oasis</span>
              </a>
        
              <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link rounded-pill nav-custom active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link rounded-pill nav-custom">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link rounded-pill nav-custom">Contact Support</a></li>
                <li class="nav-item"><a href="#" class="nav-link rounded-pill nav-custom">FAQs</a></li>
              </ul>
            </header>
          </div>
          

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- FOOTER -->
        <footer class="footer mt-auto py-3 bg-light border-top">
            <div class="container">
                <p class="float-end"><a href="#">Back to top</a></p>
                <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </div>
        </footer>
        {{-- <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer> --}}

        @stack('modals')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireScripts

        @stack('scripts')
    </body>
</html>
