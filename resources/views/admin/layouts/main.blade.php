<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Oksigen Coffee</title>
    <meta charset="utf-8" />
    <meta name="description" content="Admin Oksigen Coffee." />
    <meta name="keywords" content="Oksigen Coffee" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets-admin/media/logo/logo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets-admin/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    {{-- trix editor --}}
    <link href="{{ asset('assets-admin/css/trix.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets-admin/css/style_upload.css') }}" rel="stylesheet" type="text/css" /> --}}
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
      trix-editor {
        max-width: 520px; 
        height: auto; 
      }
    </style>
    <script>
      if (window.top != window.self) {
        window.top.location.replace(window.self.location.href);
      }
    </script>
  </head>
  <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
    <!--Start Theme -->
    <script>
      var defaultThemeMode = "light";
      var themeMode;

      if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
          themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
          if (localStorage.getItem("data-bs-theme") !== null) {
            themeMode = localStorage.getItem("data-bs-theme");
          } else {
            themeMode = defaultThemeMode;
          }
        }

        if (themeMode === "system") {
          themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
      }
    </script>
    <!--End Theme -->

    <!--Start Main-->
    <div class="d-flex flex-column flex-root">
      <div class="page d-flex flex-row flex-column-fluid">
        <!--Start Aside-->
        
        @include('admin.layouts.sidebar')
        <!--End Aside-->

        <!--Start Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
          <!--Start Header-->
          @include('admin.layouts.navbar')
          
          <!-- End Header -->

          <!--Start Content-->
          @yield('content-admin')
          
          <!--End Content-->

        </div>
      </div>
    </div>
    <!--End Main-->
    @include('sweetalert::alert')

    {{-- <script>
      var hostUrl = "{{ asset('assets-admin/assets/index.html') }}";
    </script> --}}
    <script src="{{ asset('assets-admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
    {{-- <script src="{{ asset('assets-admin/js/custom/apps/ecommerce/catalog/coba.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-admin/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script> --}}
    <script src="{{ asset('assets-admin/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    {{-- <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-project/main.js') }}"></script> --}}
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/select-location.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets-admin/js/trix.js') }}"></script>
    {{-- <script src="{{ asset('assets-admin/js/products.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-admin/js/categories.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-admin/plugins/global/plugins.bundle.js') }}"></script> --}}
  </body>
</html>
