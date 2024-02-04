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
            <a href="/admin" class="text-muted text-hover-primary"> Home </a>
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
                  
                  <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i> <input type="text" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" name="search" autocomplete="off" value="{{ request('search') }}" />
                </div>
              </form>
              <!--End Search-->
            </div>

            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
              <div class="w-100 mw-150px">
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status">
                  <option></option>
                  <option value="all">All</option>
                  <option value="published">Published</option>
                  <option value="scheduled">Scheduled</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>

              <a href="/admin/product/create" class="btn btn-primary"> Add Product </a>
            </div>
          </div>

          <div class="card-body pt-0">
            <div class="row">
              <div class="dataTables_wrapper table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                  <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                      <th class="text-center min-w-10px">No</th>
                      <th class="min-w-200px">Product</th>
                      <th class="text-start min-w-100px">Category</th>
                      <th class="text-center min-w-60px">Qty</th>
                      <th class="text-center min-w-100px">Price</th>
                      <th class="text-center min-w-100px">Status</th>
                      <th class="text-center min-w-100px">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="fw-semibold text-gray-600">
                  @foreach ($data as $dt)
                    <tr>
                      <td class="text-start pe-0">
                        {{ $loop->iteration }}
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <!-- Start Thumbnail -->
                          <div class="symbol symbol-50px">
                            <span class="symbol-label" style="background-image: url({{ asset('assets-admin/media/products/'.$dt->thumbnail) }})"></span>
                          </div>
                          <!-- End Thumbnail -->
  
                          <!-- Start Name -->
                          <div class="ms-5">
                            <span class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $dt->product_name }}</span>
                          </div>
                          <!-- End Name -->
                        </div>
                      </td>
                      <td class="text-start pe-0">
                        {{ $dt->category_name }}
                      </td>
                      <td class="text-center">
                        {{ $dt->quantity }} g
                      </td>
                      <td class="text-center pe-0">Rp. {{ number_format($dt->price, 0, ',', '.') }}</td>
                      <td class="text-center pe-0">
                        @if ( $dt->status === "yes" )
                          <div class="badge badge-light-success">Published</div>
                        @else
                          <div class="badge badge-light-danger">Inactive</div>
                        @endif
                      </td>
                      <td class="text-center">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                          Actions
                          <i class="ki-duotone ki-down fs-5 ms-1"></i>
                        </a>
  
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                          <div class="menu-item px-3">
                            <a href="/admin/product/detail/{{ $dt->product_slug }}" class="menu-link px-3"> View </a>
                          </div>
  
                          <div class="menu-item px-3">
                            <a href="/admin/product/edit/{{ $dt->product_slug }}"  class="menu-link px-3"> Edit </a>
                          </div>
  
                          <div class="menu-item px-3">
                            <a href="{{ route('product.destroy', $dt->id) }}" class="menu-link px-3" data-confirm-delete="true"> Delete </a>
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

@endsection