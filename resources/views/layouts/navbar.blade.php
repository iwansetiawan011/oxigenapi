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
      <span class="quantity-cart">4</span>
    </a>
    <a href="javascript:;" id="hamburger-usual-menu">
      <i class="fa-solid fa-bars fa-lg icon-tgl"></i>
    </a>
  </div>
  <div class="shopping-cart">
    <div class="checkout">
      <a href="#">Checkout</a>
    </div>
    <div class="cart-item">
      <a href="#" id="remove-all">x</a>
      <img src="img/products/p-1.png" alt="produk" />
      <div class="cart-detail">
        <h3>BIJI KOPI APEL MANGGARAI (100GR)</h3>
        <div class="item-price">
          <span>Rp 29.000</span>
          <div class="quantity">
            <button id="remove">&minus;</button>
            <span>2</span>
            <button id="add">&plus;</button>
          </div>
        </div>
      </div>
    </div>
    <div class="cart-item">
      <a href="#" id="remove-all">x</a>
      <img src="img/products/p-1.png" alt="produk" />
      <div class="cart-detail">
        <h3>Biji Kopi Arabika Wanoja Extended Natural (100gr)</h3>
        <div class="item-price">
          <span>Rp 29.000</span>
          <div class="quantity">
            <button id="remove">&minus;</button>
            <span>2</span>
            <button id="add">&plus;</button>
          </div>
        </div>
      </div>
    </div>
    <!-- <h4 style="margin-top: 1rem">Cart is Empty!</h4> -->
    <h4 class="total">Total : Rp 30.000</h4>
  </div>
</nav>
<!-- Navbar End -->