<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oksigen Coffee</title>
    <!-- Logo tab browser -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />
    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}" >
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Icons -->
    <link href="{{ asset('assets/fonts/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fonts/css/brands.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fonts/css/solid.css') }}" rel="stylesheet" />
  </head>
  <body>
    
    <!-- Navbar Start -->
      <nav class="navbar-usual">
        <a href="#" class="navbar-usual-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
        <div class="navbar-usual-nav">
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/about">About</a>
          <a class="nav-link" href="/shop">Shop</a>
          <a class="nav-link" href="/contact">Contact</a>
        </div>
        <div class="navbar-usual-extra">
          <a href="https://www.instagram.com/oksigencoffee/" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-instagram fa-lg icon-ig"></i>
          </a>
          <a href="https://www.instagram.com/oksigencoffee/" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-facebook fa-lg icon-fb"></i>
          </a>
          <a href="javascript:;" id="shopping-cart-button">
            <i class="fa-solid fa-cart-shopping fa-lg icon-cart"></i>
              @if ($count >= 1)
                <span class="quantity-cart">{{ $count }}</span>
              @endif
            
          </a>
          <a href="javascript:;" id="hamburger-usual-menu">
            <i class="fa-solid fa-bars fa-lg icon-tgl"></i>
          </a>
        </div>
        <div class="shopping-cart">
          @if ($count)
            <div class="checkout">
              <a href="/shop-checkout">Checkout</a>
            </div>
          @endif

          @foreach ($temps as $temp)
          <div class="cart-item">
            <form action="{{ route('temp_destroy', $temp->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none">
                  <span id="remove-all" style="cursor: pointer">x</span>
                </button>
            </form>
            
            <img src="{{ asset('assets-admin/media/products/'.$temp->thumbnail) }}" alt="product" />
            <div class="cart-detail">
              <h3>{{ $temp->product_name }}</h3>
              <div class="item-price">
                <span>Rp {{ number_format($temp->price, 0, ',', '.') }}</span>
                <span class="sub_price sub_price_{{ $temp->id }}">{{ $temp->sub_price }}</span>
                <div class="quantity" data-temp-id="{{ $temp->id }}" data-product-slug="{{ $temp->product_slug }}">
                  <button type="button" id="cart-remove" class="cart-remove">&minus;</button>
                  <span class="quantity-value">{{ $temp->quantity }}</span>
                  <button type="button" id="cart-add" class="cart-add">&plus;</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          @if (!$count)
            <h4 style="margin-top: 1rem">Cart is Empty!</h4>
          @else
            <h4 class="total">Sub Total: <span id="cart-total"></span></h4>
          @endif
        </div>
      </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- My JS -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/detail-shop.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
          function updateCartTotal() {
              var total = 0;

              // Mengambil semua elemen .sub_price dan menjumlahkannya
              $('.sub_price').each(function () {
                  total += parseFloat($(this).text().replace(/[^\d.]/g, ''));
              });

              // Menyisipkan nilai total ke dalam elemen #cart-total
              $('#cart-total').text('Rp ' + total.toLocaleString('id-ID'));
          }

          $('.cart-remove').on('click', function () {
              var quantityContainer = $(this).closest('.quantity');
              var tempId = quantityContainer.data('temp-id');
              var proSlug = quantityContainer.data('product-slug');
              var initialQuantity = parseInt(quantityContainer.find('.quantity-value').text());

              if (initialQuantity > 1) {
                  $.ajax({
                      url: '/temp_update/' + tempId,
                      method: 'POST',
                      data: {
                          _token: '{{ csrf_token() }}',
                          action: 'remove',
                          product_slug: proSlug
                      },
                      success: function (response) {
                          if (response.success) {
                              quantityContainer.find('.quantity-value').text(response.quantity);
                              quantityContainer.closest('.item-price').find('.sub_price').text(response.sub_price);
                              updateCartTotal(); // Pemanggilan updateCartTotal di sini
                          }
                      },
                  });
              }
          });

          $('.cart-add').on('click', function () {
              var quantityContainer = $(this).closest('.quantity');
              var tempId = quantityContainer.data('temp-id');
              var proSlug = quantityContainer.data('product-slug');

              $.ajax({
                  url: '/temp_update/' + tempId,
                  method: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      action: 'add',
                      product_slug: proSlug
                  },
                  success: function (response) {
                      if (response.success) {
                          quantityContainer.find('.quantity-value').text(response.quantity);
                          quantityContainer.closest('.item-price').find('.sub_price').text(response.sub_price);
                          updateCartTotal(); // Pemanggilan updateCartTotal di sini
                      }
                  },
              });
          });

          updateCartTotal();
      });


    </script>
    @yield('scripts')
  </body>
</html>
