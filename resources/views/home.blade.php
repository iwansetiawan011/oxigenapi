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
    <!-- fonts --> 
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- icons -->
    <link href="{{ asset('assets/fonts/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fonts/css/brands.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fonts/css/solid.css') }}" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo"><img src="{{ asset('assets/images/logo_home.png') }}" alt="logo" /></a>
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link" href="/about">About</a>
        <a class="nav-link" href="/shop">Shop</a>
        <a class="nav-link" href="/contact">Contact</a>
      </div>
      <div class="navbar-extra">
        <a href="https://www.instagram.com/oksigencoffee/" target="_blank" rel="noopener noreferrer">
          <i class="fa-brands fa-instagram fa-lg icon-ig"></i>
        </a>
        <a href="https://www.instagram.com/oksigencoffee/" target="_blank" rel="noopener noreferrer">
          <i class="fa-brands fa-facebook fa-lg icon-fb"></i>
        </a>
        <a href="javascript:;" id="hamburger-menu">
          <i class="fa-solid fa-bars fa-lg icon-tgl"></i>
        </a>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero">
      <div class="slide">
        <div style="background-image: url({{ asset('assets/images/bg-3.jpg') }})"></div>
        <div style="background-image: url({{ asset('assets/images/bg-1.jpg') }})"></div>
        <div style="background-image: url({{ asset('assets/images/bg-2.jpg') }})"></div>
        <div style="background-image: url({{ asset('assets/images/bg-5.jpg') }})"></div>
        <div style="background-image: url({{ asset('assets/images/bg-6.jpg') }})"></div>
      </div>
      <div class="slide-caption">
        <h1>Oksigen Coffee</h1>
        <p>Lorem ipsum dolor sit amet elit.</p>
      </div>
    </section>
    <!-- Hero Section End -->

    <script src="{{ asset('assets/js/navbar.js') }}"></script>
  </body>
</html>