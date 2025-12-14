<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Store - main page</title>
  <!-- Bootstrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <!-- fonts link -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/about.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/contact.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/shop.css">
</head>

<body>
  <!-- header start -->
  <header>

    <nav class="navbar">
      <div class="nav-left">
        <div class="hamburger">&#9776;</div>
        <div class="logo"><img src="<?php echo get_template_directory_uri();?>/images/logo.svg" alt=""></div>
      </div>

      <ul class="nav-center">
        <li><a href="#">Home</a></li>
        <li><a href="/shop">Shop</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>

      <!-- <div class="nav-right">
        <span class="icon"><img src="./images/search.svg" alt=""></span>
        <span class="icon"><img src="./images/user.svg" alt=""></span>
        <span class="icon"><img src="./images/heart.svg" alt=""></span>
        <span class="icon"><img src="./images/shopping-bag.svg" alt=""></span>
      </div> -->

      <!-- <div class="nav-right">
    <span class="icon"><img id="nav-search" src="./images/search.svg"></span>
    <span class="icon"><img id="nav-user" src="./images/user.svg"></span>


    <span class="icon"><img id="nav-wishlist" src="./images/heart.svg"></span>
    <span class="icon"><img id="nav-cart" src="./images/shopping-bag.svg"></span>
</div> -->

      <div class="nav-right">
        <span class="icon"><img id="nav-search" src="<?php echo get_template_directory_uri();?>/images/search.svg"></span>
        <span class="icon"><img id="nav-user" src="<?php echo get_template_directory_uri();?>/images/user.svg"></span>
        <!-- <span class="icon nav-icon">
        <img id="nav-wishlist" src="./images/heart.svg" />
        <span id="wishlist-count" class="count">0</span>
    </span>

    <span class="icon nav-icon">
        <img id="nav-cart" src="./images/shopping-bag.svg" />
        <span id="cart-count" class="count">0</span>
    </span> -->

        <div class="shop-actions">
          <button class="icon-btn" id="wishlistBtn" title="Wishlist" onclick="window.location.href='wishlist.html'">
            <img src="<?php echo get_template_directory_uri();?>/images/heart.svg" alt="Wishlist" />
            <span class="badge" id="wishlistCount">0</span>
          </button>

          <button class="icon-btn" id="cartBtn" title="Cart" onclick="window.location.href='cart.html'">
            <img src="<?php echo get_template_directory_uri();?>/images/shopping-bag.svg" alt="Cart" /><span class="badge" id="cartCount">0</span>
          </button>
        </div>
      </div>


    </nav>

  </header>
  <!-- header end -->
