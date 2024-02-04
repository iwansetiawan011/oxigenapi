@extends('layouts.main')

@section('content')
  <section class="shop-checkout">
    <h2><span>Shop - Payment</span></h2>
    <div class="content">
      <div class="col-1">
        <form action="{{ route('order_create') }}" method="POST">
        @csrf
          <div class="form-container">
            <div class="form-detail">Billing Details</div>
            <input type="hidden" name="no_referensi" value="{{ $order->no_ref }}" readonly>
            <input type="hidden" name="total_price" value="{{ $order->total_price }}" readonly>
            <div class="form-group">
              <label for="fullname">FULL NAME <span>*</span></label>
              <input type="text" name="name" id="fullname" value="{{ $order->name }}" readonly>
            </div>
            <div class="form-group">
              <label for="email">EMAIL <span>*</span></label>
              <input type="email" name="email" id="email" value="{{ $order->email }}" readonly>
            </div>
            <div class="form-detail">Shipping Details</div>
            <div class="form-group">
              <label for="address">STREET ADDRESS <span>*</span></label>
              <input type="text" name="address" id="address" value="{{ $order->address }}" readonly>
            </div>
            <div class="form-group">
              <label for="city">CITY <span>*</span></label>
              <input type="text" name="city" id="city" value="{{ $order->city }}" readonly>
            </div>
            <div class="form-group">
              <label for="province">PROVINCE <span>*</span></label>
              <input type="text" name="province" id="province" value="{{ $order->province }}" readonly>
            </div>
            <div class="form-group">
              <label for="postcode">POSTCODE <span>*</span></label>
              <input type="text" name="postcode" id="postcode" value="{{ $order->postcode }}" readonly>
            </div>
            <div class="form-group">
              <label for="phone">PHONE <span>*</span></label>
              <input type="number" name="phone" id="phone" value="{{ $order->phone }}" readonly>
            </div>
          </div>
        </form>
      </div>
      <div class="col-2">
        <span>Cart Totals</span>
        <div class="cart-totals">
          <div class="row-total-payment">
              <div class="label">Total</div>
              <div class="value">Rp {{ number_format($order->total_price, 0, ',', ',') }}</div>
          </div>
        </div>
        <button type="button" class="btn-shop" id="pay-button">Payment</button>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
      // SnapToken acquired from previous step
      snap.pay('{{ $order->snap_token }}', {
        // Optional
        onSuccess: function(result){
          window.location.href = '{{ route('shop') }}';
        },
        // Optional
        onPending: function(result){
          /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function(result){
          /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
@endsection