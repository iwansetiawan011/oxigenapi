<!-- Start Modal Add Category -->
<div class="modal fade" tabindex="-1" id="add-menu">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title">Add Menu</h3>

              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
          </div>
          <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="mb-10 fv-row">
                <label for="product_name" class="required form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control mb-2" placeholder="Category name" value="{{ old('product_name') }}" required />

                @if($errors->has('product_name'))
                  <div class="text-danger fs-7">*{{ $errors->first('product_name') }}</div>
                @else
                  <div class="text-muted fs-7">Set the category name.</div>
                @endif
              </div>

              <div class="mb-10 fv-row">
                <!--Start Input group-->
                <label for="menu_category_id" class="required form-label">Menu Category</label>

                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="menu_category_id" name="menu_category_id" required>
                  <option></option>
                    @foreach ($category as $ct)
                      @if (old('menu_category_id') == $ct->id)
                      <option value="{{ $ct->id }}" selected>{{ $ct->category_name }}</option>
                      @else
                      <option value="{{$ct->id }}">{{ $ct->category_name }}</option>
                      @endif
                    @endforeach
                  </option>
                </select>

                <div class="text-muted fs-7 mb-7">Add product to a category.</div>
              </div>

              <div class="mb-10 fv-row">
                <label for="product_price" class="required form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control mb-2" placeholder="Category name" value="{{ old('product_price') }}" required />

                @if($errors->has('product_price'))
                  <div class="text-danger fs-7">*{{ $errors->first('product_price') }}</div>
                @else
                  <div class="text-muted fs-7">Set the category name.</div>
                @endif
              </div>

              <div class="mb-10 fv-row">
                <label for="product_desc" class="required form-label">Product Description</label>
                <input type="text" name="product_desc" id="product_desc" class="form-control mb-2" placeholder="Category name" value="{{ old('product_desc') }}" required />

                @if($errors->has('product_desc'))
                  <div class="text-danger fs-7">*{{ $errors->first('product_desc') }}</div>
                @else
                  <div class="text-muted fs-7">Set the category name.</div>
                @endif
              </div>

              <div class="mb-10 fv-row">
                <label for="product_image" class="required form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control mb-2" value="{{ old('product_image') }}" required />

                @if($errors->has('product_image'))
                  <div class="text-danger fs-7">*{{ $errors->first('product_image') }}</div>
                @else
                  <div class="text-muted fs-7">Set the category slug.</div>
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