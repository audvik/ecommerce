<?php get_header();?>
      <style>
  .complete-wrap{ max-width:900px; margin:48px auto; text-align:center; padding:28px; border-radius:10px; border:1px solid #ececec; background:#fff; }
  .done-icon{ width:86px; height:86px; margin-bottom:12px; }
  .btn-primary{ background:#111; color:#fff; padding:10px 16px; border-radius:8px; border:none; cursor:pointer; margin:8px; }
  .btn-ghost{ background:transparent; border:1px solid #111; padding:10px 16px; border-radius:8px; cursor:pointer; margin:8px; }
  .muted{ color:#666; }
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

<!-- ====== CHECKOUT STEP 3 (MAIN CONTENT & EMAILJS) ====== -->
<section class="checkout-section" aria-label="Checkout - Complete">



  <div class="complete-wrap" role="status">
    <img src="<?php echo get_template_directory_uri();?>/images/check.svg" alt="done" class="done-icon" />
    <h2>Thank you — your order is confirmed!</h2>
    <p class="muted" id="orderInfo">We have sent an email with the order details to your inbox.</p>

    <div style="margin-top:22px;">
      <button class="btn-primary" id="resendEmailBtn">Send Email Again</button>
      <button class="btn-ghost" onclick="window.location.href='shop.html'">Return to Shop</button>
    </div>
  </div>

  <!-- EmailJS SDK (loaded inline here, no head changes) -->
  <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>

  <script>
  (function(){
    // Initialize EmailJS with your Public Key
    if(window.emailjs) try{ emailjs.init('YLmVaZyqcvzWRW21M'); } catch(e){ console.warn(e); }

    // Compose email payload using stored checkout data, then send.
    function safeParse(k){ try{ return JSON.parse(localStorage.getItem(k) || 'null'); }catch(e){ return null; } }
    const customer = safeParse('checkout_customer') || {};
    const summary = safeParse('checkout_summary') || { subtotal:0, delivery:0, total:0 };
    const cart = safeParse('checkout_cart') || safeParse('cart') || [];
    const payment = safeParse('checkout_payment') || { method: 'N/A' };
    const orderId = localStorage.getItem('checkout_order_id') || ('ORD' + Date.now().toString().slice(-8));

    // Build items string for email (simple HTML list)
    function buildItemsHtml(){
      if(!cart || !cart.length) return '<p>No items</p>';
      let html = '<ul>';
      cart.forEach(it => {
        html += `<li>${it.title} x${it.qty||1} — Rs ${(it.price*(it.qty||1)).toFixed(2)}</li>`;
      });
      html += '</ul>';
      return html;
    }

    // Fill on-page info
    document.getElementById('orderInfo').innerHTML =
      `Order ID: <strong>${orderId}</strong><br>Payment: <strong>${payment.method}</strong><br>Total: <strong>Rs ${Number(summary.total||0).toFixed(2)}</strong>`;

    // Auto-send email when page loads (best UX: user sees thank you and email is sent)
    async function sendOrderEmail(){
      const templateParams = {
        name: customer.name || 'Customer',
        email: customer.email || '',
        address: (customer.street ? customer.street + ', ' : '') + (customer.city? customer.city + ', ':'') + (customer.country || ''),
        payment_method: payment.method || '',
        subtotal: 'Rs ' + Number(summary.subtotal||0).toFixed(2),
        delivery: 'Rs ' + Number(summary.delivery||0).toFixed(2),
        total: 'Rs ' + Number(summary.total||0).toFixed(2),
        order_id: orderId,
        items_html: buildItemsHtml()
      };

      try {
        // send using the service & template you gave me
        await emailjs.send('service_4b56iwh', 'template_48izllf', templateParams);
        console.info('Order email sent');
      } catch(err){
        console.error('EmailJS send error:', err);
      }
    }

    // Call once (fire-and-forget)
    sendOrderEmail();

    // Resend button
    document.getElementById('resendEmailBtn').addEventListener('click', function(){
      sendOrderEmail();
      alert('Email sent (or attempted). Check console for details if something fails.');
    });

    // OPTIONAL: clear stored checkout data if you want
    // localStorage.removeItem('checkout_cart');
    // localStorage.removeItem('checkout_summary');
    // localStorage.removeItem('checkout_customer');
    // localStorage.removeItem('checkout_payment');
    // localStorage.removeItem('checkout_order_id');

  })();
  </script>

</section>
<!-- ====== END STEP 3 ====== -->













<div class="separator">

</div>

<script src="./shop.js"></script>
<script src="cart.js"></script>



</body>
</html>
<?php get_footer();?>
