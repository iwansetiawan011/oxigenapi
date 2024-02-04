@extends('layouts.main')

@section('content')
    <!-- Shop Section Start -->
    <section class="shop">
      <h2>Shop</h2>
      <div class="row">
        <div class="shop-categori">
          <ul>
            <li><a href="#">All Product</a></li>
            @foreach($categories as $category)
            <li><a href="#">{{ $category->category_name }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="shop-content">
          @foreach ($data as $product)
            <a href="/shop/{{ $product->product_slug }}">
              <div class="product-box">
                <img src="{{ asset('assets-admin/media/products/'.$product->thumbnail) }}" alt="product 1" class="product-img" />
                <h2 class="product-title">{{ $product->product_name }}</h2>
                <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Shop Section End -->
@endsection