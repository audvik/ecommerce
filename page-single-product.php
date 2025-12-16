<?php get_header();?>

  <style>
    :root{
      --bg:#f7f8fb; --card:#ffffff; --muted:#6b7280; --accent:#111827; --primary:#111111;
      --accent-soft:#f3f4f6; --radius:10px;
    }
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin:0; background:var(--bg); color:var(--accent); -webkit-font-smoothing:antialiased}

    .container{max-width:1100px; margin:36px auto; padding:20px}
    .back-link{display:inline-block; color:var(--muted); text-decoration:none; margin-bottom:14px}

    .product-wrap{display:grid; grid-template-columns: 1fr 380px; gap:28px; align-items:start}

    /* LEFT: gallery */
    .gallery{background:var(--card); padding:22px; border-radius:var(--radius); box-shadow:0 6px 18px rgba(15,23,42,0.06)}
    .main-image{width:100%; height:460px; display:grid; place-items:center; border-radius:8px; background:var(--accent-soft); overflow:hidden}
    .main-image img{max-width:100%; max-height:100%; object-fit:contain; display:block}

    .thumbs{display:flex; gap:12px; margin-top:12px; justify-content:flex-start; align-items:center}
    .thumb{width:74px; height:74px; border-radius:8px; background:#fff; display:grid; place-items:center; padding:8px; cursor:pointer; border:1px solid transparent}
    .thumb img{max-width:100%; max-height:100%; object-fit:contain}
    .thumb.active{border-color:rgba(17,24,39,0.12); box-shadow:0 8px 20px rgba(17,24,39,0.04)}

    /* RIGHT: details */
    .details{background:var(--card); padding:22px; border-radius:var(--radius); box-shadow:0 6px 18px rgba(15,23,42,0.06); position:relative}
    .tags{display:flex; gap:8px; margin-bottom:10px}
    .tag{padding:6px 10px; border-radius:6px; font-weight:700; font-size:12px; color:#fff}
    .tag.new{background:#8fd6b3}
    .tag.sale{background:#ff8a8a}

    .title{font-size:20px; font-weight:600; color:var(--primary); margin:6px 0}
    .price{font-size:22px; font-weight:800; color:var(--primary); margin:6px 0}
    .meta{color:var(--muted); font-size:14px; margin-bottom:14px}

    .options{display:flex; gap:12px; margin:14px 0; flex-wrap:wrap}
    .select, .swatches{display:flex; gap:8px; align-items:center}
    select{padding:9px 10px; border-radius:8px; border:1px solid #e6e7eb; background:#fff}

    .swatch{width:36px; height:36px; border-radius:8px; border:1px solid #e6e7eb; cursor:pointer}
    .swatch.active{outline:3px solid rgba(17,24,39,0.08)}

    .quantity-row{display:flex; gap:10px; align-items:center; margin-top:8px}
    .qty{display:inline-flex; border:1px solid #e6e7eb; border-radius:8px; overflow:hidden}
    .qty button{width:36px; height:36px; border:0; background:#fff; cursor:pointer}
    .qty span{display:inline-flex; align-items:center; justify-content:center; width:48px}

    .actions{display:flex; gap:12px; margin-top:18px}
    .btn{padding:12px 14px; border-radius:10px; cursor:pointer; font-weight:700; border:1px solid transparent}
    .btn.primary{background:var(--primary); color:#fff}
    .btn.ghost{background:transparent; border-color:#e6e7eb}

    .wishlist-btn{position:absolute; right:18px; top:18px; border-radius:8px; padding:8px 10px; border:1px solid #eee; background:#fff; cursor:pointer}

    .accordion{margin-top:20px}
    .accordion h4{margin:6px 0; color:var(--primary)}
    .accordion p{color:var(--muted); line-height:1.6}

    /* responsive */
    @media (max-width:980px){
      .product-wrap{grid-template-columns: 1fr;}
      .main-image{height:420px}
    }

    /* modal image zoom */
    .modal{position:fixed; inset:0; display:none; background:rgba(0,0,0,0.6); z-index:60; align-items:center; justify-content:center}
    .modal.open{display:flex}
    .modal img{max-width:92%; max-height:92%; object-fit:contain}

    /* small helpers */
    .rating{display:inline-flex; gap:6px; align-items:center}
    .rating .star{color:#f59e0b}

  

    /* NAV wishlist (top-right) */
    .nav-wishlist{position:fixed; right:22px; top:16px; background:#fff; border-radius:999px; padding:8px 12px; box-shadow:0 6px 18px rgba(2,6,23,0.08); z-index:80; display:inline-flex; gap:8px; align-items:center; font-weight:700}
    .nav-wishlist .nav-count{background:#ff6b6b; color:#fff; font-size:12px; padding:4px 7px; border-radius:999px; margin-left:6px}

    /* toast */
    .toast{position:fixed; right:22px; bottom:22px; background:rgba(0,0,0,0.85); color:#fff; padding:10px 14px; border-radius:8px; box-shadow:0 8px 30px rgba(2,6,23,0.12); z-index:90; opacity:0; transform:translateY(10px); transition:all .28s ease}
    .toast.show{opacity:1; transform:translateY(0)}

  </style>
</head>
<body>

  <!-- small top-right wishlist indicator (global navbar-esque) -->
  <div id="navWishlist" class="nav-wishlist" title="Wishlist">♡ <span id="navCount" class="nav-count">0</span></div>
  <div class="container">
    <a href="index.html" class="back-link">← Back to products</a>

    <div class="product-wrap">

      <div class="gallery">
        <div class="main-image" id="mainImageWrap">
          <img id="mainImage" src="<?php echo get_template_directory_uri();?>/images/product-item_9.jpg.jpeg" alt="Cotton T-shirt">
        </div>

        <div class="thumbs" id="thumbs">
          <div class="thumb active" data-src="<?php echo get_template_directory_uri();?>/images/product-item_9.jpg.jpeg"><img src="<?php echo get_template_directory_uri();?>/images/product-item_9.jpg.jpeg" alt="thumb"></div>
          <div class="thumb" data-src="<?php echo get_template_directory_uri();?>/images/product-item_8.jpg.jpeg"><img src="<?php echo get_template_directory_uri();?>/images/product-item_8.jpg.jpeg" alt="thumb"></div>
          <div class="thumb" data-src="<?php echo get_template_directory_uri();?>/images/product-item_7.jpg.jpeg"><img src="<?php echo get_template_directory_uri();?>/images/product-item_7.jpg.jpeg" alt="thumb"></div>
          <div class="thumb" data-src="<?php echo get_template_directory_uri();?>/images/product-item_6.jpg.jpeg"><img src="<?php echo get_template_directory_uri();?>/images/product-item_6.jpg.jpeg" alt="thumb"></div>
        </div>
      </div>

      <aside class="details">
        <div class="tags"><div class="tag new">NEW</div><div class="tag sale" style="display:none">SALE</div></div>
        <button class="wishlist-btn" id="wishlistBtn">♡ Add to wishlist</button>

        <div class="title">Cotton T-shirt</div>
        <div class="price">$35.99</div>
        <div class="meta">
          <span class="rating"> <span class="star">★ ★ ★ ★ ☆</span></span>
          <span style="margin-left:8px">• 128 reviews</span>
        </div>

        <div class="options">
          <div class="select">
            <label for="size" style="font-size:13px; color:var(--muted)">Size</label>
            <select id="size">
              <option>Small</option>
              <option selected>Medium</option>
              <option>Large</option>
              <option>X-Large</option>
            </select>
          </div>

          <div class="swatches" aria-label="Colors">
            <div class="swatch active" data-color="#2b6cb0" style="background:#2b6cb0"></div>
            <div class="swatch" data-color="#d1a054" style="background:#d1a054"></div>
            <div class="swatch" data-color="#111827" style="background:#111827"></div>
          </div>
        </div>

        <div class="quantity-row">
          <div style="color:var(--muted); font-size:14px">Quantity</div>
          <div class="qty" aria-hidden="false">
            <button id="dec">−</button>
            <span id="qtyVal">1</span>
            <button id="inc">+</button>
          </div>
        </div>

        <div class="actions">
          <button class="btn primary" id="addCart">Add to cart</button>
          <button class="btn ghost" id="buyNow">Buy now</button>
        </div>

        <div class="accordion">
          <h4>Product details</h4>
          <p>Soft cotton t-shirt with a relaxed fit. Machine washable. Available in multiple colors and sizes.</p>

          <h4>Shipping & returns</h4>
          <p>Free shipping over $50. 30-day returns.</p>
        </div>

      </aside>

    </div>
  </div>

  <!-- Modal for zoom -->
  <div class="modal" id="zoomModal"><img id="zoomImg" src="" alt="zoom"></div>

  <script>
    // thumbnail click
    const thumbs = document.getElementById('thumbs');
    const mainImage = document.getElementById('mainImage');
    thumbs.addEventListener('click', e => {
      const t = e.target.closest('.thumb');
      if(!t) return;
      document.querySelectorAll('.thumb').forEach(n=>n.classList.remove('active'));
      t.classList.add('active');
      const src = t.dataset.src;
      mainImage.src = src;
    });

    // open zoom modal on main image click
    const modal = document.getElementById('zoomModal');
    const zoomImg = document.getElementById('zoomImg');
    document.getElementById('mainImageWrap').addEventListener('click', ()=>{
      zoomImg.src = mainImage.src;
      modal.classList.add('open');
    });
    modal.addEventListener('click', ()=> modal.classList.remove('open'));

    // qty +/−
    const qtyVal = document.getElementById('qtyVal');
    let qty = 1;
    document.getElementById('inc').addEventListener('click', ()=>{ qty++; qtyVal.textContent = qty; });
    document.getElementById('dec').addEventListener('click', ()=>{ if(qty>1) qty--; qtyVal.textContent = qty; });

    // wishlist toggle with toast and navbar count
    const wishlistBtn = document.getElementById('wishlistBtn');
    const navCountEl = document.getElementById('navCount');
    const NAV_KEY = 'wishlistCount_v1';

    // initialize nav count from localStorage
    function getNavCount(){ return parseInt(localStorage.getItem(NAV_KEY) || '0', 10); }
    function setNavCount(n){ localStorage.setItem(NAV_KEY, String(n)); navCountEl.textContent = n; }
    setNavCount(getNavCount());

    let wished = false; // per-page state
    wishlistBtn.addEventListener('click', (ev)=>{
      ev.stopPropagation(); // don't bubble to card click
      wished = !wished;

      // update button visual
      wishlistBtn.textContent = wished ? '♥ In wishlist' : '♡ Add to wishlist';
      wishlistBtn.style.borderColor = wished ? '#ffdce0' : '#eee';

      // update nav counter (only increment on add, decrement on remove but never below 0)
      let count = getNavCount();
      if(wished){ count = count + 1; setNavCount(count); showToast('Added to wishlist'); }
      else { count = Math.max(0, count - 1); setNavCount(count); showToast('Removed from wishlist'); }
    });

    // simple toast helper
    let toastTimer = null;
    function showToast(text){
      clearTimeout(toastTimer);
      let t = document.querySelector('.toast');
      if(!t){ t = document.createElement('div'); t.className = 'toast'; document.body.appendChild(t); }
      t.textContent = text;
      // force reflow to allow transition
      void t.offsetWidth;
      t.classList.add('show');
      toastTimer = setTimeout(()=>{ t.classList.remove('show'); }, 2000);
    }

    // basic add to cart demo
    document.getElementById('addCart').addEventListener('click', ()=>{
      const size = document.getElementById('size').value;
      alert(`Added ${qty} × Cotton T-shirt (Size ${size}) to cart.`);
    });

  </script>
</body>

 <div class="separator">

  </div>
</html>
<?php get_footer();?>
