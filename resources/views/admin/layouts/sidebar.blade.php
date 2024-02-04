<div id="kt_aside" class="aside aside-default aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
  <div class="aside-logo flex-column-auto px-10 pt-9 pb-5" id="kt_aside_logo">
    <a href="/admin">
      <img alt="Logo" src="{{ asset('assets-admin/media/logos/logo-default.svg') }}" class="max-h-50px logo-default theme-light-show" />
      <img alt="Logo" src="{{ asset('assets-admin/media/logos/logo-default-dark.svg') }}" class="max-h-50px logo-default theme-dark-show" />
      <img alt="Logo" src="{{ asset('assets-admin/media/logos/logo-minimize.svg') }}" class="max-h-50px logo-minimize" />
    </a>
  </div>

  <!--Start Aside menu-->
  <div class="aside-menu flex-column-fluid ps-3 pe-1">
    <div class="menu menu-sub-indention menu-column menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-active-bg menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
      <div class="hover-scroll-y mx-4" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="20px" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">

        <!-- Dashboard -->
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin" >
            <span class="menu-icon">
              <i class="ki-duotone ki-element-11 fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </div>

        <!-- Main -->     
        <div class="menu-item pt-5">
          <div class="menu-content">
            <span class="fw-bold text-muted text-uppercase fs-7">Main</span>
          </div>
        </div>

        <!-- Main - Product --> 
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin/product*') ? 'active' : '' }}" href="/admin/product" >
            <span class="menu-icon">
              <i class="ki-duotone ki-gift fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Products</span>
          </a>
        </div>

        <!-- Main - Category --> 
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin/category*') ? 'active' : '' }}" href="/admin/category" >
            <span class="menu-icon">
              <i class="ki-duotone ki-gift fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Categories</span>
          </a>
        </div>

        <!-- Main - Category --> 
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin/menu*') ? 'active' : '' }}" href="/admin/menu" >
            <span class="menu-icon">
              <i class="ki-duotone ki-gift fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Menu Product</span>
          </a>
        </div>

        <!-- Main - Category --> 
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin/menu-category*') ? 'active' : '' }}" href="/admin/menu-category" >
            <span class="menu-icon">
              <i class="ki-duotone ki-gift fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Menu Categories</span>
          </a>
        </div>

        <!-- Main - Order --> 
        <div class="menu-item">
          <a class="menu-link {{ Request::is('admin/order*') ? 'active' : '' }}" href="/admin/order" >
            <span class="menu-icon">
              <i class="ki-duotone ki-gift fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
              </i>
            </span>
            <span class="menu-title">Orders</span>
          </a>
        </div>

        {{-- <div class="menu-item">
          <a class="menu-link" href="layout-builder.html">
            <span class="menu-icon">
              <i class="ki-duotone ki-abstract-13 fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Layout Builder</span>
          </a>
        </div> --}}

        <!-- Front --> 
        <div class="menu-item pt-5">
          <div class="menu-content">
            <span class="fw-bold text-muted text-uppercase fs-7">Front</span>
          </div>
        </div>

        <div class="menu-item">
          <a class="menu-link" href="layout-builder.html">
            <span class="menu-icon">
              <i class="ki-duotone ki-row-vertical fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Home</span>
          </a>
        </div>

        <div class="menu-item">
          <a class="menu-link" href="layout-builder.html">
            <span class="menu-icon">
              <i class="ki-duotone ki-row-vertical fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">About</span>
          </a>
        </div>

        <div class="menu-item">
          <a class="menu-link" href="layout-builder.html">
            <span class="menu-icon">
              <i class="ki-duotone ki-row-vertical fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Shop</span>
          </a>
        </div>

        <div class="menu-item">
          <a class="menu-link" href="layout-builder.html">
            <span class="menu-icon">
              <i class="ki-duotone ki-row-vertical fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
            </span>
            <span class="menu-title">Contact</span>
          </a>
        </div>

        {{-- <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
          <span class="menu-link">
            <span class="menu-icon">
              <i class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
            </span>
            <span class="menu-title"> Dashboards </span>
            <span class="menu-arrow"></span>
          </span>

          <div class="menu-sub menu-sub-accordion">
            <div class="menu-item">
              <a class="menu-link" href="index.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> Multipurpose </span>
              </a>
            </div>

            <div class="menu-item">
              <a class="menu-link" href="dashboards/store-analytics.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> Store Analytics </span>
              </a>
            </div>

            <div class="menu-item">
              <a class="menu-link" href="dashboards/logistics.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> Logistics </span>
              </a>
            </div>

            <div class="menu-item">
              <a class="menu-link" href="dashboards/projects.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Projects</span>
              </a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <!--End Aside menu-->
</div>