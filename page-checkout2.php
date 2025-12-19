<?php get_header();?>
<style>
  /* Scoped payment CSS */
  .checkout-wrap{ max-width:1100px; margin:34px auto; display:flex; gap:30px; align-items:flex-start; padding:10px; }
  .checkout-left{ flex:1; background:#fff; padding:24px; border-radius:8px; border:1px solid #ececec; }
  .checkout-right{ width:340px; border:1px solid #ececec; padding:20px; border-radius:8px; background:#fff; }
  .cp-step{ flex:1; text-align:center; padding:10px 8px; border-radius:8px; font-weight:700; color:#9a9a9a; border:1px solid #eaeaea; background:#fafafa; }
  .cp-step.done{ background:#e8f6ee; color:#2b6b4a; border-color:transparent; }
  .cp-step.active{ background: linear-gradient(90deg,#8ac6a7,#6fbf95); color:#fff; border-color:transparent; }
  .pay-option{ display:flex; align-items:center; gap:12px; padding:10px 12px; border:1px solid #eee; border-radius:8px; margin-bottom:12px; cursor:pointer; }
  .pay-option input{ transform:scale(1.2); margin-right:8px; }
  .payment-buttons{ display:flex; gap:12px; margin-top:18px; }
  .btn-back{ background:transparent; border:1px solid #111; color:#111; padding:10px 16px; border-radius:6px; cursor:pointer; }
  .btn-checkout{ background:#111; color:#fff; padding:10px 16px; border-radius:6px; border:none; cursor:pointer; }
  .muted{ color:#888; font-size:13px; }
  @media (max-width:980px){ .checkout-wrap{ flex-direction:column } .checkout-right{ width:100% } }
  </style>

</head>

<body>
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

<!-- ====== CHECKOUT STEP 2 (MAIN CONTENT) ====== -->
<section class="checkout-section" aria-label="Checkout - Payment">

  

  <div class="checkout-wrap">
    <div class="checkout-left">
      <div style="display:flex;gap:12px;margin-bottom:18px;">
        <div class="cp-step done">1. Order Details</div>
        <div class="cp-step active">2. Payment</div>
        <div class="cp-step">3. Complete</div>
      </div>

      <h2>Payment Method</h2>

      <form id="paymentForm" onsubmit="return false;">
        <label class="pay-option">
          <input type="radio" name="payment_method" value="Card" required> <span>Credit / Debit Card</span>
        </label>

        <label class="pay-option">
          <input type="radio" name="payment_method" value="PayPal"> <span>PayPal</span>
        </label>

        <label class="pay-option">
          <input type="radio" name="payment_method" value="Payoneer"> <span>Payoneer</span>
        </label>

        <label class="pay-option">
          <input type="radio" name="payment_method" value="Cash On Delivery"> <span>Cash On Delivery (COD)</span>
        </label>

        <div style="margin-top:10px;">
          <small class="muted">If paying by card, real card processing isn't included here — this page only collects method for demonstration & email.</small>
        </div>

        <div class="payment-buttons">
          <button type="button" class="btn-back" id="backToStep1">← Back</button>
          <button type="button" class="btn-checkout" id="confirmOrderBtn">Confirm Order</button>
        </div>
      </form>
    </div>

    <aside class="checkout-right">
      <div class="summary-title">Your order</div>
      <div id="summaryItems2"></div>
      <div style="margin-top:10px;">
        <div class="summary-row"><div class="muted">Subtotal</div><div id="subtotalText2">Rs 0</div></div>
        <div class="summary-row"><div class="muted">Delivery</div><div id="deliveryText2">Rs 0</div></div>
        <div class="summary-row" style="font-size:18px;"><div>Total</div><div id="totalText2">Rs 0</div></div>
      </div>
    </aside>
  </div>

  <script>
  (function(){
    // render existing summary stored by step 1
    function safeParse(k){ try{ return JSON.parse(localStorage.getItem(k) || 'null'); }catch(e){return null;} }
    const cart = safeParse('checkout_cart') || safeParse('cart') || [];
    const summary = safeParse('checkout_summary') || { subtotal:0, delivery:0, total:0 };

    function renderRight(){
      const container = document.getElementById('summaryItems2');
      container.innerHTML = '';
      (cart.length ? cart : []).forEach(it=>{
        const div = document.createElement('div');
        div.className='summary-item';
        div.innerHTML = `<img src="${it.img||'./shop-images/p1.jpg'}"><div style="flex:1">
          <div style="font-weight:600">${it.title}</div>
          <div class="muted">Qty:${it.qty||1} • Rs ${Number(it.price).toFixed(2)}</div>
        </div><div style="font-weight:700">Rs ${(it.price*(it.qty||1)).toFixed(2)}</div>`;
        container.appendChild(div);
      });
      document.getElementById('subtotalText2').textContent = 'Rs ' + Number(summary.subtotal||0).toFixed(2);
      document.getElementById('deliveryText2').textContent = 'Rs ' + Number(summary.delivery||0).toFixed(2);
      document.getElementById('totalText2').textContent = 'Rs ' + Number(summary.total||0).toFixed(2);
      // set fallback keys
      localStorage.setItem('checkout_cart', JSON.stringify(cart));
      localStorage.setItem('checkout_summary', JSON.stringify(summary));
    }
    renderRight();

    // back
    document.getElementById('backToStep1').addEventListener('click', function(){ window.location.href = 'checkout1.html'; });

    // confirm
    document.getElementById('confirmOrderBtn').addEventListener('click', function(){
      const sel = document.querySelector('input[name="payment_method"]:checked');
      if(!sel){ alert('Please select a payment method.'); return;}
      const payment = sel.value;
      // save payment and generate order id
      const orderId = 'ORD' + Date.now().toString().slice(-8) + Math.floor(Math.random()*90+10);
      localStorage.setItem('checkout_payment', JSON.stringify({ method: payment }));
      localStorage.setItem('checkout_order_id', orderId);
      // go to thank you
      window.location.href = 'checkout3.html';
    });
  })();
  </script>

</section>
<?php get_footer();?>
