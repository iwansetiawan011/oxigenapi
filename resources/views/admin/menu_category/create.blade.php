<!-- Start Modal Add Category -->
<div class="modal fade" tabindex="-1" id="add-menu-category">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title">Add Menu Category</h3>

              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
          </div>
          <form action="{{ route('menu-category.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="category_image" class="required form-label">Category Image</label>
                <input type="file" name="category_image" id="category_image" class="form-control mb-2" value="{{ old('category_image') }}" required />

                @if($errors->has('category_image'))
                  <div class="text-danger fs-7">*{{ $errors->first('category_image') }}</div>
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