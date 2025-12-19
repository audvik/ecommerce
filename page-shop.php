<?php get_header();?>
<main>
 <!-- SECTION HTML: paste into your page where needed -->
<section class="shop-hero">
  <div class="hero-inner">
    <!-- LEFT: heading, dotted grid, breadcrumbs, divider -->
    <div class="hero-left">
      <span class="dot-grid" aria-hidden="true"></span>

      <h1 class="hero-title">Shop</h1>

      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="#" class="bc-link">Home</a>
        <span class="bc-sep">|</span>
        <span class="bc-current">Shop</span>
      </nav>

      <div class="hero-divider" aria-hidden="true"></div>
    </div>

    <!-- RIGHT: image -->
    <div class="hero-right">
      <!-- replace src with your image path -->
      <img src="<?php echo get_template_directory_uri();?>/shop-images/banner-shop.jpg.jpeg
      " alt="model" class="hero-image">
    </div>
  </div>
</section>

<!-- SHOP SECTION -->
<section class="shop-section">

  <!-- header area: wishlist/cart counters (you can move into your top nav if you want) -->
  <div class="shop-header">
    <div class="shop-results" id="shopResults">Showing <span id="shownCount">0</span> products</div>
    
  </div>

  <div class="shop-grid">

    <!-- SIDEBAR -->
    <aside class="shop-sidebar">
      <div class="filter-block">
        <h3>Categories</h3>
        <ul class="categories" id="categoryList">
          <li><label><input type="radio" name="category" value="all" checked> All</label></li>
          <li><label><input type="radio" name="category" value="men"> Men</label></li>
          <li><label><input type="radio" name="category" value="women"> Women</label></li>
          <li><label><input type="radio" name="category" value="accessories"> Accessories</label></li>
          <li><label><input type="radio" name="category" value="new"> New Arrivals</label></li>
        </ul>
      </div>

      <div class="filter-block">
        <h3>Price</h3>
        <div class="price-range">
          <div class="range-values">
            <span id="priceMinLabel">$0</span> — <span id="priceMaxLabel">$200</span>
          </div>
          <input type="range" id="priceRange" min="0" max="200" value="200">
        </div>
      </div>

      <div class="filter-block">
        <h3>Colors</h3>
        <div class="colors">
          <label><input type="checkbox" value="black"> Black</label>
          <label><input type="checkbox" value="blue"> Blue</label>
          <label><input type="checkbox" value="red"> Red</label>
          <label><input type="checkbox" value="yellow"> Yellow</label>
        </div>
      </div>

      <div class="filter-actions">
        <button id="applyFilters" class="btn-apply">Apply Filter</button>
        <button id="resetFilters" class="btn-reset">Reset</button>
      </div>
    </aside>

    <!-- PRODUCTS GRID -->
    <main class="shop-main">
      <div class="product-grid" id="productGrid"></div>

      <!-- pagination -->
      <div class="pagination" id="pagination"></div>
    </main>
  </div>
</section>

<!-- TOAST (hidden by default) -->
<div id="toast" class="toast" aria-live="polite" aria-atomic="true"></div>
</main>
<?php get_footer();?>