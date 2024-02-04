@extends('admin.layouts.main')

@section('content-admin')

<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">

  <div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
      <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
        <!--Start Title-->
        <h1 class="text-dark fw-bold my-1 fs-2">{{ $title }} <small class="text-muted fs-6 fw-normal ms-1"></small></h1>
        <!--End Title-->

        <!--Start Breadcrumb-->
        <ul class="breadcrumb fw-semibold fs-base my-1">
          <li class="breadcrumb-item text-muted">
            <a href="index.html" class="text-muted text-hover-primary"> Home </a>
          </li>

          <li class="breadcrumb-item text-dark">{{ $title }}</li>
        </ul>
        <!--End Breadcrumb-->
      </div>
    </div>
  </div>

  <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class="container-xxl">
      <div class="row g-xl-8">
        <div class="card card-flush">
          <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
              <!--Start Search-->
              <form action="">
                <div class="d-flex align-items-center position-relative my-1">
                  
                  <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i> <input type="text" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" name="search" autocomplete="off" value="{{ request('search') }}" />
                </div>
              </form>
              <!--End Search-->
            </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-menu">
              Add Product
            </button>
          </div>

          <div class="card-body pt-0">
            <div class="row">
              <div class="dataTables_wrapper table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                  <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                      <th class="text-center min-w-10px">No</th>
                      <th class="text-start min-w-100px">Image</th>
                      <th class="min-w-200px">Product</th>
                      <th class="text-start min-w-100px">Price</th>
                      <th class="text-start min-w-100px">Description</th>
                      <th class="text-start min-w-100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="fw-semibold text-gray-600">
                    @foreach ($data as $dt)
                      <tr>
                        <td class="text-center pe-0">
                          {{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage()  }}
                        </td>
                        <td class="text-start">
                          <div class="symbol symbol-50px">
                            <span class="symbol-label" style="background-image: url({{ asset('assets-admin/media/menus/'.$dt->product_image) }})"></span>
                          </div>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $dt->product_name.' - '.$dt->category_name }}</span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $dt->product_price }}</span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $dt->product_desc }}</span>
                        </td>
                        
                        <td class="text-start">
                          <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions
                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                          </a>
  
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
  
                            <div class="menu-item px-3">
                              <a href="javascript:void(0);" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit-menu-{{ $dt->id }}"> Edit </a>
                            </div>
  
                            <div class="menu-item px-3">
                              <a href="{{ route('menu.destroy', $dt->id) }}" class="menu-link px-3" data-confirm-delete="true"> Delete </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row d-flex align-items-end justify-content-end">
              {{ $data->withQueryString()->links() }}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


@include('admin.menu.create')
@foreach ($data as $dt)
@include('admin.menu.edit')
@endforeach
@endsection
