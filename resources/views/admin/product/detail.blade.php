@extends('admin.layouts.main')

@section('content-admin')
<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
  <!--Start Toolbar-->
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

          <li class="breadcrumb-item text-muted">{{ $menu }}</li>

          <li class="breadcrumb-item text-dark">{{ $title }}</li>
        </ul>
        <!--End Breadcrumb-->
      </div>
    </div>
  </div>
  <!--End Toolbar-->

  <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class="container-xxl">
      <div class="card h-lg-100">
        
        {{-- <div class="card-header py-5 py-md-0 py-lg-5 py-xxl-0">
            <div class="card-title flex-column">
                <h3 class="fw-bold m-0">Detail Product<h3>
                <span class="fs-6 fw-semibold text-gray-400">{{ $product->category->category_name }}</span>
            </div>
      
            <div class="card-toolbar">
                <a href="invoice.html" class="btn btn-light btn-sm">Invoice</a>
            </div>
        </div> --}}
      
        <div class="card-body">
            <div class="d-flex align-items-start mb-7">
                <div class="overlay rounded overflow-hidden w-75px w-lg-125px flex-shrink-0 me-7">
                    <div class="overlay-wrapper rounded bg-light">
                        <img src="{{ asset('assets-admin/media/products/'.$product->thumbnail) }}" alt="image" class="rounded w-100"/>
                    </div>
                    <div class="overlay-layer bg-dark bg-opacity-10">
                        <button type="button" class="btn btn-sm btn-primary btn-shadow">
                            <i class="bi bi-eye text-light w-20px"></i> Show
                        </button>
                    </div>
                </div>
      
                <div class="flex-grow-1 d-flex align-items-start justify-content-between flex-wrap py-24">
                    <div class="d-flex flex-column align-items-start py-1 me-">
                        <div class="fs-3 text-dark text-hover-primary fw-bold mb-2">{{ $product->product_name }}</div>
                        <div class="text-gray-500 fw-semibold fs-6 mb-4">
                            {{ $product->category->category_name }}
                            <br>
                            Quantity : {{ $product->quantity }} gram
                            <br>
                            Stock : {{ $product->stock }} item
                            <br>
                            Price : Rp. {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>
      
                    <div class="d-flex flex-column py-2">
                        @if ( $product->status === "yes" )
                          <div class="btn btn-light-success btn-sm mb-5">Published</div>
                        @else
                          <div class="btn btn-light-danger btn-sm mb-">Inactive</div>
                        @endif
                        {{-- <a href="review.html" class="btn btn-light btn-sm">Write a Review</a> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <h3 class="fw-semibold mb-3">Description</h3>
                <div class="col-xl-10 text-gray-500 fw-semibold fs-6">
                    {{ $product->description }} 
                </div>
            </div>

            <div class="row">
                @foreach ($images->productImages as $img)
                <div class="overlay rounded overflow-hidden w-75px w-lg-125px flex-shrink-0 me-7">
                    <div class="overlay-wrapper rounded bg-light">
                        <img src="{{ asset('assets-admin/media/products/'.$img->image) }}" alt="image" class="rounded w-100"/>
                    </div>
                    <div class="overlay-layer bg-dark bg-opacity-10">
                        <button type="button" class="btn btn-sm btn-primary btn-shadow">
                            <i class="bi bi-eye text-light w-20px"></i> Show
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
      
            {{-- <div
                class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
      
                <div class="d-flex flex-stack flex-grow-1">
                    <div class="fw-semibold">
                        <h4 class="text-gray-900 fw-bold">
                            We need your attention!
                        </h4>
      
                        <div class="fs-6 text-gray-700">
                            Your payment was declined. To start using tools, please
                            <a href="../billing.html">Add Payment Method</a>
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="row mt-8">
                <div class="col-xl-4 mb-10 mb-xl-0">
                    <h3 class="fw-bold mb-3">Delivery Address</h3>
                    <div class="fs-5 fw-semibold text-gray-600">
                        Griffith Daniels<br />
                        6818 Eget St.<br />
                        Tacoma AL 92508<br />
                        United States
                    </div>
                </div>
      
                <div class="col-xl-4 mb-10 mb-xl-0">
                    <h3 class="fw-bold mb-3">Payment Method</h3>
                    <div class="d-flex">
                        <img
                            src="../../assets/media/svg/card-logos/mastercard.svg"
                            alt=""
                            class="me-4"/>
                        <span class="fw-bold">**** 2704</span>
                    </div>
                </div>
      
                <div class="col-xl-4 fw-bold">
                    <h3 class="fw-bold mb-3">Order Summary</h3>
      
                    <div
                        class="d-flex justify-content-between fs-5 fw-semibold text-gray-600">
                        <span class="me-2">Item Total:</span>
                        <span>USD 29.00</span>
                    </div>
                    <div
                        class="d-flex justify-content-between fs-5 fw-semibold text-gray-600">
                        <span class="me-2">Delivery:</span>
                        <span>USD 2.00</span>
                    </div>
                    <div
                        class="d-flex justify-content-between fs-5 fw-semibold text-gray-600">
                        <span class="me-2">Service Fee:</span>
                        <span>USD 0.70</span>
                    </div>
      
                    <div class="d-flex justify-content-between fw-bold mt-2">
                        <h4 class="fw-bold me-2">Grand Total:</h4>
                        <span>USD 31.70</span>
                    </div>
                </div>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection