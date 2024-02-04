  <!-- Start Modal Add Category -->
  <div class="modal fade" tabindex="-1" id="edit-category-{{ $dt->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Category</h3>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form action="{{ route('category.update', $dt->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-body">
                <div class="mb-10 fv-row">
                  <label for="category_name" class="required form-label">Category Name</label>
                  <input type="text" name="category_name" id="category_name_update" class="form-control mb-2" placeholder="Category name" value="{{ old('category_name', $dt->category_name) }}" required />

                  @if($errors->has('category_name'))
                    <div class="text-danger fs-7">*{{ $errors->first('category_name') }}</div>
                  @else
                    <div class="text-muted fs-7">Set the category name.</div>
                  @endif
                </div>

                <div class="mb-10 fv-row">
                  <label for="category_slug" class="required form-label">Category Slug</label>
                  <input type="text" name="category_slug" id="category_slug_update" class="form-control mb-2" placeholder="Category slug" value="{{ old('category_slug', $dt->category_slug) }}" required readonly />

                  @if($errors->has('category_slug'))
                    <div class="text-danger fs-7">*{{ $errors->first('category_slug') }}</div>
                  @else
                    <div class="text-muted fs-7">Set the category slug.</div>
                  @endif
                </div>

                <div class="mb-10 fv-row">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" id="description" class="form-control mb-2" placeholder="Category description" >{{ old('description', $dt->description) }}</textarea>

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
  const nameCategoryUpdate = document.querySelector("#category_name_update");
  const slugCategoryUpdate = document.querySelector("#category_slug_update");

    nameCategoryUpdate.addEventListener("keyup", function() {
        let preslugcat = nameCategoryUpdate.value;
        preslugcat = preslugcat.replace(/ /g,"-");
        slugCategoryUpdate.value = preslugcat.toLowerCase();
    });
</script>