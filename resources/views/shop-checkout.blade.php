@extends('layouts.main')

@section('content')
  <section class="shop-checkout">
    <h2><span>Shop - Checkout</span></h2>
    <div class="content">
      <div class="col-1">
        <form action="{{ route('order_create') }}" method="POST">
        @csrf
          <div class="form-container">
            <div class="form-detail">Billing Details</div>
            <input type="hidden" name="no_referensi" required value="{{ $no_ref }}">
            <input type="hidden" name="total_price" required value="{{ $total_price }}">
            <div class="form-group">
              <label for="fullname">FULL NAME <span>*</span></label>
              <input type="text" name="name" id="fullname" required>
            </div>
            <div class="form-group">
              <label for="email">EMAIL <span>*</span></label>
              <input type="email" name="email" id="email" required>
            </div>
            <div class="form-detail">Shipping Details</div>
            <div class="form-group">
              <label for="address">STREET ADDRESS <span>*</span></label>
              <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
              <label for="city">CITY <span>*</span></label>
              <input type="text" name="city" id="city" required>
            </div>
            <div class="form-group">
              <label for="province">PROVINCE <span>*</span></label>
              <input type="text" name="province" id="province" required>
            </div>
            <div class="form-group">
              <label for="postcode">POSTCODE <span>*</span></label>
              <input type="text" name="postcode" id="postcode" required>
            </div>
            <div class="form-group">
              <label for="phone">PHONE <span>*</span></label>
              <input type="number" name="phone" id="phone" required>
            </div>
            <button type="submit" class="btn-shop">Continue</button>
          </div>
        </form>
      </div>
      <div class="col-2">
        <span>Cart Details</span>
        <div class="cart-totals">
          @foreach ($temps as $temp)
          <div class="row">
            <div class="label">{{ $temp->product_name }}<span>x{{ $temp->quantity }}</span></div>
            <div class="value">Rp {{ number_format($temp->price, 0, ',', ',') }}</div>
          </div>
          @endforeach
          
          <div class="row row-subtotal">
              <div class="label">Sub total</div>
              <div class="value" id="subtotal">Rp {{ number_format($total_price, 0, ',', ',') }}</div>
          </div>
          <div class="row">
              <div class="label">Shipping</div>
              <div class="value" id="shipping">Rp 23,000</div>
          </div>
          <div class="total-row">
              <div class="label">Total</div>
              <div class="value" id="total"></div>
          </div>
          <div class="row">
            <div class="label">
              <a href="/shop" class="link-shop"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Ambil elemen subtotal dan shipping
      var subtotalElement = document.getElementById("subtotal");
      var shippingElement = document.getElementById("shipping");
      var totalElement = document.getElementById("total");

      // Hapus karakter non-angka dan konversi ke angka untuk perhitungan
      var subtotal = parseFloat(subtotalElement.innerText.replace(/[^\d]/g, ''));
      var shipping = parseFloat(shippingElement.innerText.replace(/[^\d]/g, ''));

      // Hitung total
      var total = subtotal + shipping;

      // Tampilkan total dengan format mata uang
      totalElement.innerText = "Rp " + total.toLocaleString();
  });
</script>

@endsection