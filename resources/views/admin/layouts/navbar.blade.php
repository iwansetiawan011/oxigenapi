<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
  <div class="container-fluid d-flex align-items-stretch justify-content-between">
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
      <div class="d-flex align-items-center d-lg-none">
        <div class="btn btn-icon btn-active-color-primary ms-n2 me-1" id="kt_aside_toggle">
          <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
      </div>

      <!--Start Logo-->
      <a href="index.html" class="d-lg-none">
        <img alt="Logo" src="{{ asset('assets-admin/media/logos/logo-compact.svg') }}" class="mh-40px" />
      </a>
      <!--End Logo-->

      <!--Start Aside toggler-->
      <div class="btn btn-icon w-auto ps-0 btn-active-color-primary d-none d-lg-inline-flex me-2 me-lg-5" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
        <i class="ki-duotone ki-black-left-line fs-1 rotate-180"><span class="path1"></span><span class="path2"></span></i>
      </div>
      <!--End Aside toggler-->
    </div>
    <!--Start Topbar-->
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
      <!--Start Search-->
      <div class="d-flex align-items-stretch me-1">
        <div id="kt_header_search" class="header-search d-flex align-items-center w-100 w-lg-300px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
          <!--Start Tablet and mobile search toggle-->
          <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
            <div class="d-flex">
              <i class="ki-duotone ki-magnifier fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
          </div>
          <!--End Tablet and mobile search toggle-->

          <!--Start Form-->
          <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
            <!--Start Hidden input(Added to disable form autocomplete)-->
            <input type="hidden" />
            <!--End Hidden input-->

            <!--Start Icon-->
            <i class="ki-duotone ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"><span class="path1"></span><span class="path2"></span></i>
            <!--End Icon-->

            <!--Start Input-->
            <input type="text" class="search-input form-control form-control-solid ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
            <!--End Input-->

            <!--Start Spinner-->
            <span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
              <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
            </span>
            <!--End Spinner-->

            <!--Start Reset-->
            <span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
              <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span class="path2"></span></i>
            </span>
            <!--End Reset-->
          </form>
          <!--End Form-->
        </div>
      </div>
    </div>
    <!--End Topbar-->

    <!--Start Toolbar wrapper-->
    <div class="d-flex align-items-stretch flex-shrink-0">
      <!--Start Theme mode-->
      <div class="d-flex align-items-center ms-1 ms-lg-2">
        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
          <i class="ki-duotone ki-night-day theme-light-show fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i> <i class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span class="path2"></span></i
        ></a>

        <!--Start Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
          <!--Start Menu item-->
          <div class="menu-item px-3 my-0">
            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
              <span class="menu-icon" data-kt-element="icon">
                <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
              </span>
              <span class="menu-title"> Light </span>
            </a>
          </div>
          <!--End Menu item-->

          <!--Start Menu item-->
          <div class="menu-item px-3 my-0">
            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
              <span class="menu-icon" data-kt-element="icon">
                <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span class="path2"></span></i>
              </span>
              <span class="menu-title"> Dark </span>
            </a>
          </div>
          <!--End Menu item-->

          <!--Start Menu item-->
          <div class="menu-item px-3 my-0">
            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
              <span class="menu-icon" data-kt-element="icon">
                <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
              </span>
              <span class="menu-title"> System </span>
            </a>
          </div>
          <!--End Menu item-->
        </div>
        <!--End Menu-->
      </div>
      <!--End Theme mode-->

      <!--Start User-->
      <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
        <div class="cursor-pointer symbol symbol-35px symbol-lg-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
          <img alt="Pic" src="{{ asset('assets-admin/media/avatars/300-1.jpg') }}" />
        </div>

        <!--Start User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
          <!--Start Menu item-->
          <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
              <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="{{ asset('assets-admin/media/avatars/300-1.jpg') }}" />
              </div>

              <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5">Max Smith <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"> max@kt.com </a>
              </div>
            </div>
          </div>
          <!--End Menu item-->

          <div class="separator my-2"></div>

          <!--Start Menu item-->
          <div class="menu-item px-5">
            <a href="account/overview.html" class="menu-link px-5"> My Profile </a>
          </div>
          <!--End Menu item-->

          <!--Start Menu item-->
          <div class="menu-item px-5 my-1">
            <a href="account/settings.html" class="menu-link px-5"> Account Settings </a>
          </div>
          <!--End Menu item-->

          <!--Start Menu item-->
          <div class="menu-item px-5">
            <a href="authentication/sign-in/basic.html" class="menu-link px-5"> Sign Out </a>
          </div>
          <!--End Menu item-->
        </div>
        <!--End User account menu-->
      </div>
      <!--End User -->
    </div>
  </div>
</div>