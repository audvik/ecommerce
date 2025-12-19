<?php get_header();?>
 <style>
  /* Scoped CSS - paste inside page so no head edits required */
  .checkout-wrap{ max-width:1100px; margin:34px auto; display:flex; gap:30px; align-items:flex-start; padding:10px; }
  .checkout-left{ flex:1; background:#fff; padding:24px; border-radius:8px; border:1px solid #ececec; }
  .checkout-right{ width:340px; border:1px solid #ececec; padding:20px; border-radius:8px; background:#fff; }
  .checkout-progress{ display:flex; gap:12px; align-items:center; margin-bottom:18px; }
  .cp-step{ flex:1; text-align:center; padding:10px 8px; border-radius:8px; font-weight:700; color:#9a9a9a; border:1px solid #eaeaea; background:#fafafa; }
  .cp-step.active{ background: linear-gradient(90deg,#8ac6a7,#6fbf95); color:#fff; border-color:transparent; }
  .field-row{ display:flex; gap:16px; margin-bottom:12px; }
  .field-row .col{ flex:1; display:flex; flex-direction:column; }
  label.small{ font-size:13px; color:#555; margin-bottom:6px; }
  input.checkout-input, textarea.checkout-input, select.checkout-input{ padding:10px 12px; border:1px solid #e6e6e6; border-radius:6px; outline:none; font-size:14px; }
  textarea.checkout-input{ resize:vertical; min-height:86px; }
  .btn-checkout{ margin-top:12px; background:#111; color:#fff; padding:10px 18px; border-radius:6px; border:none; cursor:pointer; font-weight:700; }
  .summary-title{ font-weight:700; margin-bottom:12px; }
  .summary-item{ display:flex; gap:12px; align-items:center; padding:10px 0; border-bottom:1px dashed #eee; }
  .summary-item img{ width:56px; height:56px; object-fit:cover; border-radius:6px; }
  .summary-row{ display:flex; justify-content:space-between; padding:10px 0; font-weight:600; }
  .muted{ color:#888; font-size:13px; }
  @media (max-width:980px){ .checkout-wrap{ flex-direction:column } .checkout-right{ width:100% } }
  </style>

</head>
<!-- HERO BANNER -->
<section class="shop-hero">
  <div class="hero-inner">
    <!-- LEFT TEXT -->
    <div class="hero-left">
      <span class="dot-grid"></span>
      <h1 class="hero-title">Checkout</h1>

      <nav class="breadcrumbs">
        <a href="#" class="bc-link">Home</a>
        <span class="bc-sep">|</span>
        <span class="bc-current">Checkout</span>
      </nav>

      <div class="hero-divider"></div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="hero-right">
      <img src="<?php echo get_template_directory_uri();?>/shop-images/banner-cart.jpg" alt="model" class="hero-image">
    </div>
  </div>
</section>


<!-- ====== CHECKOUT STEP 1 (MAIN CONTENT) ====== -->
<section class="checkout-section" aria-label="Checkout - Order Details">

 

  <div class="checkout-wrap">
    <div class="checkout-left">
      <div class="checkout-progress" aria-hidden="true">
        <div class="cp-step active">1. Order Details</div>
        <div class="cp-step">2. Payment Method</div>
        <div class="cp-step">3. Complete</div>
      </div>

      <h2>Contact & Delivery</h2>

      <form id="checkoutForm1" onsubmit="return false;">
        <div class="field-row">
          <div class="col">
            <label class="small">Full name *</label>
            <input id="c_fullname" class="checkout-input" placeholder="John Doe" required>
          </div>
          <div class="col">
            <label class="small">Email *</label>
            <input id="c_email" class="checkout-input" type="email" placeholder="name@example.com" required>
          </div>
        </div>

        <div class="field-row">
          <div class="col">
            <label class="small">Phone *</label>
            <input id="c_phone" class="checkout-input" placeholder="+92 3xx xxxxxxx" required>
          </div>
          <div class="col">
            <label class="small">Postal code</label>
            <input id="c_postal" class="checkout-input" placeholder="Postal / ZIP">
          </div>
        </div>

        <div style="margin-top:8px;">
          <label class="small">Street address *</label>
          <input id="c_street" class="checkout-input" placeholder="Street, building, apartment" required>
        </div>

        <div class="field-row" style="margin-top:12px;">
          <div class="col">
            <label class="small">City *</label>
            <input id="c_city" class="checkout-input" placeholder="City name" required>
          </div>
          <div class="col">
            <label class="small">Country *</label>
            <select id="c_country" class="checkout-input" required>
              <option value="">Select country</option>
              <option value="Pakistan">Pakistan</option>
              <option value="United States">United States</option>
              <option value="United Kingdom">United Kingdom</option>
            </select>
          </div>
        </div>

        <div style="margin-top:14px;">
          <label class="small">Delivery day (optional)</label>
          <input id="c_deliveryday" class="checkout-input" placeholder="YYYY-MM-DD">
        </div>

        <button class="btn-checkout" id="toPaymentBtn">Continue to Payment</button>
      </form>
    </div> <!-- /.checkout-left -->

    <aside class="checkout-right" aria-labelledby="summaryTitle">
      <div id="summaryTitle" class="summary-title">Your order</div>

      <div id="summaryItems" aria-live="polite">
        <!-- JS will insert order items here -->
      </div>

      <div style="margin-top:10px;">
        <div class="summary-row"><div class="muted">Subtotal</div><div id="subtotalText">Rs 0</div></div>
        <div class="summary-row"><div class="muted">Delivery</div><div id="deliveryText">Rs 0</div></div>
        <div class="summary-row" style="font-size:18px;"><div>Total</div><div id="totalText">Rs 0</div></div>
      </div>
    </aside>
  </div>

  <script>
  /* Checkout1 JS - stores form data and navigates to checkout2 */
  (function(){
    // Attempts to read cart from common keys, fallback to small sample
    function getCart(){
      const candidates = ['cart','cart_items','myCart','checkout_cart_v1','CART'];
      for(const k of candidates){
        const raw = localStorage.getItem(k);
        if(raw){
          try { const parsed = JSON.parse(raw); if(Array.isArray(parsed)) return parsed; } catch(e){}
        }
      }
      // fallback sample (so UI works out-of-the-box)
      return [
        { id:1, title:"Cotton Shirt (S)", price:1799, qty:1, img:"wp-content/themes/ecommerce/shop-images/p1.jpg" },
        { id:2, title:"Spray Skirt", price:3299, qty:1, img:"lotbazzar/wp-content/themes/ecomerce/shop-images/p2.jpg" }
      ];
    }

    function formatR(val){ return 'Rs ' + Number(val).toFixed(2); }

    function renderSummary(){
      const cart = getCart();
      const container = document.getElementById('summaryItems');
      container.innerHTML = '';
      let subtotal = 0;
      cart.forEach(it=>{
        subtotal += it.price * (it.qty || 1);
        const row = document.createElement('div');
        row.className = 'summary-item';
        row.innerHTML = `<img src="${it.img}" alt=""><div style="flex:1">
          <div style="font-weight:600">${it.title}</div>
          <div class="muted">Qty: ${it.qty||1} • Rs ${Number(it.price).toFixed(2)}</div>
        </div><div style="font-weight:700">Rs ${(it.price*(it.qty||1)).toFixed(2)}</div>`;
        container.appendChild(row);
      });
      const delivery = 150; // fixed delivery charge - you can change
      const total = subtotal + delivery;
      document.getElementById('subtotalText').textContent = formatR(subtotal);
      document.getElementById('deliveryText').textContent = formatR(delivery);
      document.getElementById('totalText').textContent = formatR(total);
      // store cart summary for other pages
      try{
        localStorage.setItem('checkout_summary', JSON.stringify({ subtotal, delivery, total }));
        localStorage.setItem('checkout_cart', JSON.stringify(cart));
      }catch(e){}
    }

    renderSummary();

    document.getElementById('toPaymentBtn').addEventListener('click', function(e){
      e.preventDefault();
      // basic validation
      const fullname = document.getElementById('c_fullname').value.trim();
      const email = document.getElementById('c_email').value.trim();
      const street = document.getElementById('c_street').value.trim();
      const city = document.getElementById('c_city').value.trim();
      const country = document.getElementById('c_country').value.trim();

      if(!fullname || !email || !street || !city || !country){
        alert('Please fill required fields: name, email, street, city and country.');
        return;
      }

      // save values to localStorage for next pages
      const payload = {
        name: fullname,
        email: email,
        phone: document.getElementById('c_phone').value.trim(),
        postal: document.getElementById('c_postal').value.trim(),
        street: street,
        city: city,
        country: country,
        deliveryDay: document.getElementById('c_deliveryday').value.trim()
      };
      localStorage.setItem('checkout_customer', JSON.stringify(payload));

      // navigate to payment page
      window.location.href = 'checkout2.html';
    });

    // Pre-fill if user returned from step 2
    try{
      const cached = JSON.parse(localStorage.getItem('checkout_customer') || '{}');
      if(cached && Object.keys(cached).length){
        document.getElementById('c_fullname').value = cached.name || '';
        document.getElementById('c_email').value = cached.email || '';
        document.getElementById('c_phone').value = cached.phone || '';
        document.getElementById('c_postal').value = cached.postal || '';
        document.getElementById('c_street').value = cached.street || '';
        document.getElementById('c_city').value = cached.city || '';
        document.getElementById('c_country').value = cached.country || '';
        document.getElementById('c_deliveryday').value = cached.deliveryDay || '';
      }
    }catch(e){}
  })();
  </script>
</section>
</main>
<?php get_footer();?>
