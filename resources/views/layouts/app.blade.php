<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'AppDemo') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
  <style>
    html{ 
      height:100%;
    }
    body{ 
      padding:0;
      margin:0;
      position:relative;
      min-height:100%;
      padding-bottom: 180px;
    }
  </style>
  
  @stack('styles')

  <!-- Icons -->
  <script src="https://kit.fontawesome.com/76943f6bd7.js"></script>
  <!-- Scripts -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  <!-- Bootstrap 4.3.1 -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  
  @stack('head')
</head>

<body>
  <div id="app">
  @include('inc.navbar')

  <main class="pt-5">
    @yield('content')
  </main>

  @include('inc.footer')
  </div>
</body>
</html>
