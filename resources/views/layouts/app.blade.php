<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('public/users/coreCss/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/test.css')}}">
</head>
<body class="off-canvas-sidebar">
    <div id="app">
         <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
             <div class="container">
              @yield('pageName')
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="../dashboard.html" class="nav-link">
                      <i class="material-icons">dashboard</i> Dashboard
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="{{ route('register') }}" class="nav-link">
                      <i class="material-icons">person_add</i> {{ __('Register') }}
                    </a>
                  </li>
                  <li class="nav-item  active ">
                    <a href="{{ route('login') }}" class="nav-link">
                      <i class="material-icons">fingerprint</i>{{ __('Login') }}
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="lock.html" class="nav-link">
                      <i class="material-icons">lock_open</i> Lock
                    </a>
                  </li>
                </ul>
               </div>
              </div>
        </nav>
  <!-- End Navbar -->

         @yield('content')
        
    </div>
    <!--   Core JS Files   -->
  <script src="{{asset('public/users/coreJs/all.js')}}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
</body>
</html>
