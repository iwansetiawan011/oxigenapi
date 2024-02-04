@extends('layouts.main')

@section('content')
    <!-- Details Product Section Start -->
    <section class="product-details">
      <h2>Shop</h2>
      <div class="container">
        <div class="product-details-content">
          <div class="product-content-left">
            <div class="product-image">
              <img src="{{ asset('assets-admin/media/products/'.$product->thumbnail) }}" alt="product" id="productImg" />
            </div>
            <div class="product-image-prev">
              @foreach ($images->productImages as $img)
                <div class="product-image-small">
                  <img src="{{ asset('assets-admin/media/products/'.$img->image) }}" alt="product" />
                </div>
              @endforeach
            </div>
          </div>
          <div class="product-content-right">
            <h1 class="product-name" id="productName">{{ $product->product_name }} ({{ $product->quantity }} gram)</h1>
            <span class="product-price" id="productPrice">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            <div class="product-description">
              {{ $product->description }}
            </div>
            <form action="{{ route('temp_create') }}" method="POST">
              @csrf
              <div class="product-quantity">
                <span>Quantity :</span>
                <a href="javascript:;" id="remove">&minus;</a>
                <span id="hasil">1</span>
                <input type="hidden" value="1" id="hasil-input" name="quantity" readonly size="1" />
                <input type="hidden" name="product_id" value="{{ $product->id }}" size="1" />
                <a href="javascript:;" id="add">&plus;</a>
              </div>
              <button type="submit" class="btn-shop">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Details Product Section End -->
    <script>
      // single product
      const allHoverImages = document.querySelectorAll(
          ".product-image-prev .product-image-small img"
      );
      const imgContainer = document.querySelector(".product-image");

      window.addEventListener("DOMContentLoaded", () => {
          allHoverImages[0].parentElement.classList.add("active");
      });
      allHoverImages.forEach((image) => {
          image.addEventListener("mouseover", () => {
              if (image.src) {
                  imgContainer.querySelector("img").src = image.src;
                  resetActiveImg();
                  image.parentElement.classList.add("active");
              }
          });
      });

      function resetActiveImg() {
          allHoverImages.forEach((img) => {
              img.parentElement.classList.remove("active");
          });
      }

      // Mendapatkan elemen-elemen yang dibutuhkan
      const addButton = document.getElementById("add");
      const removeButton = document.getElementById("remove");
      const hasilSpan = document.getElementById("hasil");
      const hasilInput = document.getElementById("hasil-input");

      // Fungsi untuk menambah nilai
      addButton.addEventListener("click", function () {
          let currentValue = parseInt(hasilSpan.textContent);
          currentValue++;
          hasilSpan.textContent = currentValue;
          hasilInput.value = currentValue;
      });

      // Fungsi untuk mengurangi nilai
      removeButton.addEventListener("click", function () {
          let currentValue = parseInt(hasilSpan.textContent);
          if (currentValue > 1) {
              currentValue--;
              hasilSpan.textContent = currentValue;
              hasilInput.value = currentValue;
          }
      });

    </script>
@endsection