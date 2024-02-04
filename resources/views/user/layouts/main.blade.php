<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Oksigen Coffee</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Portal Admin Oksigen Coffee" />
    <meta name="author" content="Tim Merah" />
    <link rel="shortcut icon" href="{{ asset('assets-admin/images/logo/logo.png') }}" />

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets-admin/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets-admin/css/portal.css') }}" />
  </head>

  <body class="app">
    <!-- Start Header -->
    <header class="app-header fixed-top">
      @include('admin.layouts.navbar')
      <!--//app-header-inner-->
      @include('admin.layouts.sidebar')
      <!--//app-sidepanel-->
    </header>
    <!-- End Header -->

    <!-- Start Body -->
    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
        @yield('content-admin')
      </div>
      <!--//app-content-->

      @include('admin.layouts.footer')

    </div>
    <!-- End Body -->

    <!-- Javascript -->
    <script src="{{ asset('assets-admin/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets-admin/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>
  </body>
</html>
