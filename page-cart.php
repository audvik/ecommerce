<?php get_header();?>
<main>
<!-- HERO BANNER -->
<section class="shop-hero">
  <div class="hero-inner">
    <!-- LEFT TEXT -->
    <div class="hero-left">
      <span class="dot-grid"></span>
      <h1 class="hero-title">Cart</h1>

      <nav class="breadcrumbs">
        <a href="#" class="bc-link">Home</a>
        <span class="bc-sep">|</span>
        <span class="bc-current">Cart</span>
      </nav>

      <div class="hero-divider"></div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="hero-right">
      <img src="<?php echo get_template_directory_uri();?>/shop-images/banner-cart.jpg" alt="model" class="hero-image">
    </div>
  </div>
</section>

<!-- ⭐ CART SECTION (NEW DESIGN) -->
<section class="cart-container">

    <!-- LEFT SIDE: ITEMS -->
    <div class="cart-left">
        <h2 class="cart-heading">Shopping Cart</h2>
        <div id="cartItems" class="cart-items-list"></div>
    </div>

    <!-- RIGHT SIDE: CHECKOUT -->
    <div class="cart-right">
        <div class="order-box">
            <h2>Your Order</h2>

            <div class="order-row">
                <span>Order price</span>
                <span id="orderPrice">$0.00</span>
            </div>

            <div class="order-row">
                <span>Discount for promo code</span>
                <span>No</span>
            </div>

            <div class="order-row">
                <span>Delivery (Aug 02 at 16:00)</span>
                <span>$16</span>
            </div>

            <hr>

            <div class="order-total">
                <span>Total</span>
                <span id="totalPrice">$0.00</span>
            </div>

            <button class="checkout-btn" onclick="window.location.href='checkout1.html'">Checkout</button>
        </div>
    </div>
</section>
</main>
<?php get_footer();?>
