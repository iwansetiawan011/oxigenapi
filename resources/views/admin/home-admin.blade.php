@extends('admin.layouts.main')

@section('content-admin')
  <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
    <!--Start Toolbar-->
    <div class="toolbar" id="kt_toolbar">
      <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
          <!--Start Title-->
          <h1 class="text-dark fw-bold my-1 fs-2">Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small></h1>
          <!--End Title-->

          <!--Start Breadcrumb-->
          <ul class="breadcrumb fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
              <a href="index.html" class="text-muted text-hover-primary"> Home </a>
            </li>

            <li class="breadcrumb-item text-muted">Dashboards</li>

            <li class="breadcrumb-item text-dark">Multipurpose</li>
          </ul>
          <!--End Breadcrumb-->
        </div>
      </div>
    </div>
    <!--End Toolbar-->

    <!--Start Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
      <div class="container-xxl">
        <div class="row g-xl-8">
          <div class="col-xl-6">
            <!--begin::Chart Widget 1-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
              <!--begin::Body-->
              <div class="card-body p-0 d-flex justify-content-between flex-column">
                <div class="d-flex flex-stack card-p flex-grow-1">
                  <!--begin::Icon-->
                  <div class="symbol symbol-45px">
                    <div class="symbol-label">
                      <i class="ki-duotone ki-basket fs-2x"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    </div>
                  </div>
                  <!--end::Icon-->

                  <!--begin::Text-->
                  <div class="d-flex flex-column text-end">
                    <span class="fw-bolder text-gray-800 fs-2">Orders</span>
                    <span class="text-gray-400 fw-semibold fs-6">Sep 1 - Sep 16 2020</span>
                  </div>
                  <!--end::Text-->
                </div>

                <!--begin::Chart-->
                <div class="pt-1">
                  <div id="kt_chart_widget_1_chart" class="card-rounded-bottom h-125px"></div>
                </div>
                <!--end::Chart-->
              </div>
            </div>
            <!--end::Chart Widget 1-->
          </div>
          <div class="col-xl-6">
            <!--begin::Slider Widget 1-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
              <!--begin::Body-->
              <div class="card-body pt-5">
                <div id="kt_stats_widget_8_carousel" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
                  <!--begin::Heading-->
                  <div class="d-flex flex-stack flex-wrap">
                    <span class="fs-4 text-gray-400 fw-bolder pe-2">Announcements</span>

                    <!--begin::Carousel Indicators-->
                    <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                      <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
                      <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="1" class="ms-1"></li>
                      <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="2" class="ms-1"></li>
                      <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="3" class="ms-1"></li>
                    </ol>
                    <!--end::Carousel Indicators-->
                  </div>
                  <!--end::Heading-->

                  <!--begin::Carousel-->
                  <div class="carousel-inner pt-6">
                    <!--begin::Item-->
                    <div class="carousel-item active">
                      <div class="carousel-wrapper">
                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                          <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder">Craft Admin Launch Day</a>

                          <p class="text-gray-600 fs-6 fw-semibold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
                        </div>

                        <!--begin::Info-->
                        <div class="d-flex flex-stack pt-8">
                          <span class="badge badge-light-primary fs-7 fw-bolder me-2">OCT 05, 10</span>

                          <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bolder px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="carousel-item">
                      <div class="carousel-wrapper">
                        <!--begin::Title-->
                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                          <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder">Craft Dashboard Launch</a>

                          <p class="text-gray-600 fs-6 fw-semibold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
                        </div>
                        <!--end::Title-->

                        <!--begin::Info-->
                        <div class="d-flex flex-stack pt-8">
                          <span class="badge badge-light-primary fs-7 fw-bolder me-2">DEC 03, 20</span>

                          <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bolder px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="carousel-item">
                      <div class="carousel-wrapper">
                        <!--begin::Title-->
                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                          <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder">Reached 50,000 Sales</a>

                          <p class="text-gray-600 fs-6 fw-semibold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
                        </div>
                        <!--end::Title-->

                        <!--begin::Info-->
                        <div class="d-flex flex-stack pt-8">
                          <span class="badge badge-light-primary fs-7 fw-bolder me-2">NOV 06, 23</span>

                          <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bolder px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="carousel-item">
                      <div class="carousel-wrapper">
                        <!--begin::Title-->
                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                          <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder">Reached 50,000 Sales</a>

                          <p class="text-gray-600 fs-6 fw-semibold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
                        </div>
                        <!--end::Title-->

                        <!--begin::Info-->
                        <div class="d-flex flex-stack pt-8">
                          <span class="badge badge-light-primary fs-7 fw-bolder me-2">AUG 01, 13</span>

                          <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bolder px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    <!--end::Item-->
                  </div>
                  <!--end::Carousel-->
                </div>
              </div>
              <!--end::Body-->
            </div>
            <!--end::Slider Widget 1-->
          </div>
        </div>
      </div>
    </div>
    <!-- End Post -->
  </div>
@endsection
