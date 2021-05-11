<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="shortcut icon" href="{{ asset('vendors/img/merchant-logo.png') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Merchant App') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  {{-- plugin-css --}}
  @stack('plugin-css')
  <link rel="stylesheet" href="{{ asset('vendors/modules/izitoast/css/iziToast.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset("vendors/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("vendors/css/components.css") }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
          @include('layouts.navbar')
      </nav>
      <div class="main-sidebar sidebar-style-2">
          @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
            @yield('content')
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="https://nauval.in/">Sonata Bagus Adji Pamukti</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset("vendors/js/stisla.js") }}"></script>

  <!-- Plugin JS File -->
  @stack('plugin-js')
  <script src="{{ asset("vendors/js/page/jquery.loading.min.js") }}"></script>
  <script src="{{ asset("vendors/modules/izitoast/js/iziToast.min.js") }}"></script>
  <script src="{{ asset("vendors/js/page/modules-toastr.js") }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset("vendors/js/scripts.js") }}"></script>
  <script src="{{ asset("vendors/js/custom.js") }}"></script>

  @stack('custom-js')
  <script>
    $("form").submit(function (){
        $('body').loading('toggle');
    })
  </script>

  @if(Session::has('message'))
  <script>
      iziToast.success({
          title: "{{ Session::get('title') }}",
          message: "{{ Session::get('message') }}",
          position: 'topRight'
      });
  </script>
  @endif

  @if(Session::has('error'))
  <script>
      iziToast.error({
          message: "{{ Session::get('error') }}",
          position: 'topRight'
      });
  </script>
  @endif

</body>
</html>
