  
  <footer class="footer">
    <div class="footer-container">

      <!-- Column 1 -->
      <div class="footer-col">
        <div class="logo"><img src="<?php echo get_template_directory_uri();?>/images/logo.svg" alt=""></div>

        <p>Cillum eu id enim aliquip aute ullamco anim.
          Culpa deserunt nostrud excepteur voluptate.</p>

        <p class="find-title">Find us here:</p>

        <div class="social-list">


          <a class="social-link" href="#" aria-label="Facebook">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
              <path
                d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 4.99 3.66 9.13 8.44 9.93v-7.03H7.9v-2.9h2.55V9.2c0-2.52 1.5-3.9 3.8-3.9 1.1 0 2.25.2 2.25.2v2.47h-1.27c-1.25 0-1.63.77-1.63 1.56v1.86h2.78l-.44 2.9h-2.34v7.03C18.34 21.2 22 17.06 22 12.07z"
                fill="currentColor" />
            </svg>
          </a>
          <a class="social-link" href="#" aria-label="Twitter">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
              <path
                d="M22 5.92c-.66.29-1.36.49-2.1.59.76-.46 1.34-1.19 1.61-2.06-.71.42-1.5.72-2.34.89A3.64 3.64 0 0016.45 5c-2.02 0-3.66 1.64-3.66 3.66 0 .29.03.57.09.84C9.5 9.38 6.1 7.66 3.9 4.7c-.32.55-.5 1.19-.5 1.87 0 1.29.66 2.43 1.66 3.1-.61-.02-1.19-.19-1.7-.47v.05c0 1.8 1.28 3.3 2.98 3.64-.31.08-.64.12-.98.12-.24 0-.48-.02-.71-.07.48 1.5 1.85 2.6 3.48 2.63A7.34 7.34 0 012 18.57a10.4 10.4 0 005.63 1.65c6.75 0 10.45-5.59 10.45-10.45v-.48c.72-.53 1.34-1.2 1.83-1.96-.66.3-1.37.5-2.11.59z"
                fill="currentColor" />
            </svg>
          </a>
          <a class="social-link" href="#" aria-label="Instagram">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
              <path
                d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm5 6.1A3.9 3.9 0 1015.9 12 3.9 3.9 0 0012 8.1zm4.8-.7a1.1 1.1 0 11-1.1-1.1 1.1 1.1 0 011.1 1.1zM12 9.5A2.5 2.5 0 1112 14.5 2.5 2.5 0 0112 9.5z"
                fill="currentColor" />
            </svg>
          </a>

        </div>
      </div>

      <!-- Column 2 -->
      <div class="footer-col">
        <h3>About</h3>
        <ul>
          <li>About us</li>
          <li>Collections</li>
          <li>Shop</li>
          <li>Blog</li>
          <li>Contact us</li>
        </ul>
      </div>

      <!-- Column 3 -->
      <div class="footer-col">
        <h3>Useful Links</h3>
        <ul>
          <li>Privacy Policy</li>
          <li>Terms of use</li>
          <li>Support</li>
          <li>Shipping details</li>
          <li>FAQs</li>
        </ul>
      </div>

      <!-- Column 4 -->
      <div class="footer-col">
        <h3>Newsletter</h3>
        <p>Subscribe to be the first to hear about deals, offers and upcoming collections.</p>

        <div class="newsletter-box">
          <input type="email" placeholder="Enter your email">
          <span class="send-icon"><i class="fa-regular fa-paper-plane"></i></span>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© All right reserved. Mollee 2021</p>

      <div class="payments">
        <img src="<?php echo get_template_directory_uri();?>/images/payment_1.png" alt="">
        <img src="<?php echo get_template_directory_uri();?>/images/payment_2.png" alt="">
        <img src="<?php echo get_template_directory_uri();?>/images/payment_3.png" alt="">
        <img src="<?php echo get_template_directory_uri();?>/images/payment_4.png" alt="">
      </div>
    </div>
  </footer>
  <!-- bootstrap JS cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/Script.js"></script>

  <script>
    (function () {
      const carouselEl = document.getElementById('heroCarousel');

      // create or get bootstrap carousel instance with interval and auto-cycle
      const bsCarousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, {
        interval: 4500,
        ride: 'carousel',
        touch: true
      });

      // ensure it starts cycling
      try { bsCarousel.cycle(); } catch (e) {/* ignore if already cycling */ }

      const items = carouselEl.querySelectorAll('.carousel-item');
      const total = items.length;
      const counter = document.getElementById('heroCounter');

      function updateCounter(index) {
        counter.innerHTML = (index + 1) + '<span>/' + total + '</span>';
      }
      updateCounter(0);

      carouselEl.addEventListener('slid.bs.carousel', function (e) {
        const idx = Array.from(items).indexOf(e.relatedTarget);
        updateCounter(idx);
      });

      // arrows
      document.querySelector('.btn-next').addEventListener('click', function (e) {
        e.preventDefault();
        bsCarousel.next();
      });
      document.querySelector('.btn-prev').addEventListener('click', function (e) {
        e.preventDefault();
        bsCarousel.prev();
      });
    })();

  </script>

  <script>
(function(){
  const WLS_KEY = 'site_wishlist_v1'; // localStorage key
  const navCountEl = document.getElementById('wishlistCount'); // navbar badge span

  // read/write util
  function readWishlist(){
    try { return JSON.parse(localStorage.getItem(WLS_KEY)) || []; }
    catch(e) { return []; }
  }
  function writeWishlist(arr){
    localStorage.setItem(WLS_KEY, JSON.stringify(arr));
  }

  // get product identifier for a card (robust)
  function getCardId(card){
    if(!card) return null;
    if(card.dataset && card.dataset.id) return card.dataset.id;
    // try anchor href (parent <a>)
    const a = card.closest('a[href]');
    if(a && a.getAttribute('href')) return 'href:' + a.getAttribute('href');
    // try image src
    const img = card.querySelector('.product-image img');
    if(img && img.src) return 'img:' + img.src;
    // fallback to title
    const title = card.querySelector('.product-info h3');
    if(title) return 'title:' + title.textContent.trim();
    return null;
  }

  // toast helper
  let toastTimer = 0;
  function showToast(msg){
    clearTimeout(toastTimer);
    let t = document.querySelector('.toast');
    if(!t){ t = document.createElement('div'); t.className = 'toast'; document.body.appendChild(t); }
    t.textContent = msg;
    void t.offsetWidth; // reflow
    t.classList.add('show');
    toastTimer = setTimeout(()=> t.classList.remove('show'), 2000);
  }

  // update navbar badge
  function updateNavCount(){
    const arr = readWishlist();
    if(navCountEl) navCountEl.textContent = arr.length;
  }

  // toggle wish for a card
  function toggleWish(card, btn){
    const id = getCardId(card);
    if(!id) return;
    const arr = readWishlist();
    const idx = arr.indexOf(id);
    if(idx === -1){
      arr.push(id);
      writeWishlist(arr);
      btn.classList.add('wished');
      btn.textContent = '♥';
      btn.setAttribute('aria-pressed','true');
      showToast('Item added to wishlist');
    } else {
      arr.splice(idx,1);
      writeWishlist(arr);
      btn.classList.remove('wished');
      btn.textContent = '♡';
      btn.setAttribute('aria-pressed','false');
      showToast('Item removed from wishlist');
    }
    updateNavCount();
  }

  // initialize existing card buttons from storage
  function initCards(){
    const wishlist = readWishlist();
    document.querySelectorAll('.product-card').forEach(card => {
      const btn = card.querySelector('.wishlist');
      if(!btn) return;
      const id = getCardId(card);
      if(id && wishlist.includes(id)){
        btn.classList.add('wished');
        btn.textContent = '♥';
        btn.setAttribute('aria-pressed','true');
      } else {
        btn.classList.remove('wished');
        btn.textContent = '♡';
        btn.setAttribute('aria-pressed','false');
      }
    });
  }

  // attach delegated listener to grid or document
  function attachListeners(){
    document.addEventListener('click', function(e){
      // find if wishlist clicked
      const btn = e.target.closest('.product-card .wishlist');
      if(!btn) return; // not a wishlist click

      // stop navigation and propagation so anchor doesn't run
      e.preventDefault();
      e.stopPropagation();

      // find card
      const card = btn.closest('.product-card');
      if(!card) return;
      toggleWish(card, btn);
    }, true); // capture phase to preempt link navigation if needed
  }

  // run on DOM ready
  document.addEventListener('DOMContentLoaded', function(){
    initCards();
    updateNavCount();
    attachListeners();
  });

  // also run immediately in case DOMContentLoaded already fired
  if(document.readyState === 'interactive' || document.readyState === 'complete'){
    initCards();
    updateNavCount();
  }
})();
</script>
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
  
<script src="<?php echo get_template_directory_uri();?>/Script.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/shop.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/cart.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/whishlist.js"></script>
  

</body>
</html>