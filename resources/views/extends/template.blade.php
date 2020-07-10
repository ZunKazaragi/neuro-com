<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
  {{config('app.name')}}
  </title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href=" {{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('css/argon/argon.css') }}">
  <!-- Custom CSS -->
  <link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">
@stack('css')
</head>

<body style="background-color:#e0e0e0">

  {{-- {{ csrf_token() }} --}}
  @yield('screen')
  
  <!-- Core -->
  <script src="{{ asset('js/app.js')}}"></script>
  
  <!-- Theme JS -->
  <script src="{{ asset('js/custom.js')}}"></script>
  @stack('script')
</body>

</html>