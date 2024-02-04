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

    <!--Start Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
      <div class="container-xxl">
        <!--Start Form-->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
          @csrf
          <!--Start Aside column-->
          <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--Start Thumbnail settings-->
            <div class="card card-flush py-4">
              <div class="card-header">
                <div class="card-title">
                  <h2>Thumbnail</h2>
                </div>
              </div>
              <div class="card-body text-center pt-0">
                <style>
                  .image-input-placeholder {
                      background-image: url("{{ asset('assets-admin/media/svg/files/blank-image.svg') }}");
                  }
              
                  [data-bs-theme="dark"] .image-input-placeholder {
                      background-image: url("{{ asset('assets-admin/media/svg/files/blank-image-dark.svg') }}");
                  }
              </style>              

                <!--Start Image input-->
                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                  <!--Start Preview -->
                  <div class="image-input-wrapper w-150px h-150px"></div>
                  <!--End Preview -->

                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                    <input type="file" id="thumbnail" name="thumbnail" accept=".png, .jpg, .jpeg" required/>
                    <input type="hidden" />
                  </label>

                  <!--Start Cancel-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                  </span>
                  <!--End Cancel-->

                  <!--Start Remove-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                  </span>
                  <!--End Remove-->
                </div>
                <!--End Image input-->

                
                @if($errors->has('thumbnail'))
                    <div class="text-danger fs-7">*{{ $errors->first('thumbnail') }}</div>
                @else
                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                @endif

              </div>
            </div>
            <!--End Thumbnail settings-->

            <!--Start Category -->
            <div class="card card-flush py-4">
              <div class="card-header">
                <div class="card-title">
                  <h2>Product Details</h2>
                </div>
              </div>

              <div class="card-body pt-0">
                <!--Start Input group-->
                <label for="category_id" class="required form-label">Categories</label>

                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="category_id" name="category_id" required>
                  <option></option>
                    @foreach ($category as $ct)
                      @if (old('category_id') == $ct->id)
                      <option value="{{ $ct->id }}" selected>{{ $ct->category_name }}</option>
                      @else
                      <option value="{{$ct->id }}">{{ $ct->category_name }}</option>
                      @endif
                    @endforeach
                  </option>
                </select>

                <div class="text-muted fs-7 mb-7">Add product to a category.</div>
                <!--End Input group-->

                <!--Start Button-->
                <button type="button" class="btn btn-light-primary btn-sm mb-10" data-bs-toggle="modal" data-bs-target="#add-category"> <i class="ki-duotone ki-plus fs-2"></i> Create new category </button>
                <!--End Button-->

                <!--Start Input group-->
                <div class="mb-10 fv-row">
                  <label for="quantity" class="required form-label">Product Quantity</label>

                  <input type="number" name="quantity" id="quantity" class="form-control mb-2" placeholder="Product quantity" value="{{ old('quantity') }}" required />
                  
                  @if($errors->has('quantity'))
                    <div class="text-danger fs-7">*{{ $errors->first('quantity') }}</div>
                  @else
                    <div class="text-muted fs-7">Set the product quantity.</div>
                  @endif
                </div>
                <!--End Input group-->

                <!--Start Input group-->
                <div class="mb-10 fv-row">
                  <label for="stock" class="required form-label">Product Stock</label>

                  <input type="number" name="stock" id="stock" class="form-control mb-2" placeholder="Product stock" value="{{ old('stock') }}" required />
                  
                  @if($errors->has('stock'))
                    <div class="text-danger fs-7">*{{ $errors->first('stock') }}</div>
                  @else
                    <div class="text-muted fs-7">Set the product stock.</div>
                  @endif
                </div>
                <!--End Input group-->

                
              </div>
            </div>
            <!--End Category -->

            <!--Start Status-->
            <div class="card card-flush py-4">
              <div class="card-header">
                <div class="card-title">
                  <h2>Status</h2>
                </div>

              </div>
              <div class="card-body pt-0">
                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="status">
                  <option></option>
                  
                  @if (old('status') == "yes")
                    <option value="yes" selected>Published</option>
                  @elseif (old('status') == "no")
                    <option value="no" selected>Inactive</option>
                  @else
                    <option value="yes" selected>Published</option>
                    <option value="no">Inactive</option>
                  @endif
                </select>

                <div class="text-muted fs-7">Set the product status.</div>
              </div>
            </div>
            <!--End Status-->
          </div>
          <!--End Aside column-->

          <!--Start Main column-->
          <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="d-flex flex-column gap-7 gap-lg-10">
              <!--Start General options-->
              <div class="card card-flush py-4">
                <div class="card-header">
                  <div class="card-title">
                    <h2>General</h2>
                  </div>
                </div>

                <div class="card-body pt-0">
                  <!--Start Input group-->
                  <div class="mb-10 fv-row">
                    <label for="name" class="required form-label">Product Name</label>

                    <input type="text" name="product_name" id="name" class="form-control mb-2" placeholder="Product name" value="{{ old('product_name') }}" />
                    
                    @if($errors->has('product_name'))
                      <div class="text-danger fs-7">*{{ $errors->first('product_name') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the product name.</div>
                    @endif
                  </div>
                  <!--End Input group-->

                  <!--Start Input group-->
                  <div class="mb-10 fv-row">
                    <label for="slug" class="required form-label">Product Slug Name</label>

                    <input type="text" name="product_slug" id="slug" class="form-control mb-2" placeholder="Product slug name" value="{{ old('product_slug') }}" required readonly />
                    
                    @if($errors->has('product_slug'))
                      <div class="text-danger fs-7">*{{ $errors->first('product_slug') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the product slug.</div>
                    @endif
                  </div>
                  <!--End Input group-->

                  <!--Start Input group-->
                  <div class="mb-10 fv-row">
                    <label class="required form-label mb-3">Description</label>

                    {{-- <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div> --}}
                      {{-- <input id="description" class="form-control" type="hidden" name="description" value="{{ old('description') }}" required>
                      <trix-editor input="description"></trix-editor> --}}

                      <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                      <div class="text-danger fs-7">*{{ $errors->first('description') }}</div>
                    @else
                      <div class="text-muted fs-7">Set a description to the product for better visibility.</div>
                    @endif
                  </div>
                  <!--End Input group-->
                </div>
              </div>
              <!--End General options-->

              <!--Start Media-->
              <div class="card card-flush py-4">
                <div class="card-header">
                  <div class="card-title">
                    <h2>Media</h2>
                  </div>
                </div>

                <div class="card-body pt-0">
                  <label class="upload-btn mb-3" for="upload-btn">Choose file</label>
                  <input type="file" class="custom-file-input" id="upload-btn" name="product_images[]" multiple>
                  
                  <!--Start Input group-->
                  {{-- <div class="fv-row mb-2">
                    <div class="dropzone" id="kt_ecommerce_add_product_media">
                      <div class="dz-message needsclick">
                        <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>
                        <div class="ms-4">
                          <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                          <span class="fs-7 fw-semibold text-gray-400">Upload up to 3 files</span>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <!--End Input group-->

                  {{-- <div class="fv-row mb-2">
                    <div class="upload">
                      <div class="upload-files">
                        <div class="body" id="drop">
                          <i class="bi bi-cloud-upload" aria-hidden="true"></i>
                          <p class="pointer-none">
                            <a href="" id="triggerFile">Browse</a> to begin the upload
                          </p>
                          <input type="file" id="product_images" name="product_images[]" multiple />
                        </div>
                        <div class="footer">
                          <div class="divider">
                            <span>FILES</span>
                          </div>
                          <div class="list-files">
                            <!--   template   -->
                          </div>
                          <button class="importar">UPDATE FILES</button>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  <div class="text-muted fs-7">Set the product media gallery.</div>
                </div>
              </div>
              <!--End Media-->

              <!--Start Pricing-->
              <div class="card card-flush py-4">
                <div class="card-header">
                  <div class="card-title">
                    <h2>Pricing</h2>
                  </div>
                </div>

                <div class="card-body pt-0">
                  <!--Start Input group-->
                  <div class="mb-10 fv-row">
                    <label for="price" class="required form-label">Base Price</label>
                    <input type="number" id="price" name="price" class="form-control mb-2" placeholder="Product price" value="{{ old('price') }}" required />

                    @if($errors->has('price'))
                      <div class="text-danger fs-7">*{{ $errors->first('price') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the product price.</div>
                    @endif
                  </div>
                  <!--End Input group-->
                </div>
              </div>
              <!--End Pricing-->
            </div>

            <div class="d-flex justify-content-end">
              <a href="/admin/product" class="btn btn-light me-5"> Cancel </a>

              <button type="submit" class="btn btn-primary">
                Save
              </button>
            </div>
          </div>
          <!--End Main column-->
        </form>
        <!--End Form-->
      </div>
    </div>
    <!-- End Post -->
  </div>


  <!-- Start Modal Add Category -->
  <div class="modal fade" tabindex="-1" id="add-category">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title">Add Category</h3>

                  <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                      <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                  </div>
              </div>
              <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="mb-10 fv-row">
                    <label for="category_name" class="required form-label">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control mb-2" placeholder="Category name" value="{{ old('category_name') }}" required />

                    @if($errors->has('category_name'))
                      <div class="text-danger fs-7">*{{ $errors->first('category_name') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the category name.</div>
                    @endif
                  </div>

                  <div class="mb-10 fv-row">
                    <label for="category_slug" class="required form-label">Category Slug</label>
                    <input type="text" name="category_slug" id="category_slug" class="form-control mb-2" placeholder="Category slug" value="{{ old('category_slug') }}" required readonly />

                    @if($errors->has('category_slug'))
                      <div class="text-danger fs-7">*{{ $errors->first('category_slug') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the category slug.</div>
                    @endif
                  </div>

                  <div class="mb-10 fv-row">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control mb-2" placeholder="Category description" >{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                      <div class="text-danger fs-7">*{{ $errors->first('description') }}</div>
                    @else
                      <div class="text-muted fs-7">Set the category description.</div>
                    @endif
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
          </div>
      </div>
  </div>
  <!-- End Modal Add Category -->

  <script>
    document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
  </script>

  <script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    const nameCategory = document.querySelector("#category_name");
    const slugCategory = document.querySelector("#category_slug");

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        nameCategory.addEventListener("keyup", function() {
            let preslugcat = nameCategory.value;
            preslugcat = preslugcat.replace(/ /g,"-");
            slugCategory.value = preslugcat.toLowerCase();
        });
  </script>

@endsection