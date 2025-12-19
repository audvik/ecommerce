<?php get_header();?>
    <main>
        <!-- SECTION HTML: paste into your page where needed -->
        <section class="shop-hero">
            <div class="hero-inner">
                <!-- LEFT: heading, dotted grid, breadcrumbs, divider -->
                <div class="hero-left">
                    <span class="dot-grid" aria-hidden="true"></span>

                    <h1 class="hero-title">Contact</h1>

                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="#" class="bc-link">Home</a>
                        <span class="bc-sep">|</span>
                        <span class="bc-current">Contact</span>
                    </nav>

                    <div class="hero-divider" aria-hidden="true"></div>
                </div>

                <!-- RIGHT: image -->
                <div class="hero-right">
                    <!-- replace src with your image path -->
                    <img src="<?php echo get_template_directory_uri();?>/images/banner-contacts.jpg" alt="model" class="hero-image">
                </div>
            </div>
        </section>
<section class="contact-section">

  <div class="contact-wrapper">

    <!-- Left Card -->
    <div class="contact-card">
      <h2>Get In Touch</h2>
      <p>Write us your impressions of the purchase</p>

      <div class="input-row">
        <input type="text" placeholder="Enter your name">
        <input type="email" placeholder="Enter your email">
      </div>

      <textarea placeholder="Enter your feedback"></textarea>

      <button class="send-btn">Send A Message</button>
    </div>

    <!-- Right Info -->
    <div class="contact-info">
      
      <div class="dots-bg"></div>

      <div class="info-block">
        <h4>Contacts:</h4>
        <p class="bold">+1 888-444-777</p>
        <p>sitename@gmail.com</p>
      </div>

      <div class="info-block">
        <h4>Location:</h4>
        <p>27 Division St, New York,<br>NY 10002, USA</p>
      </div>

      <div class="info-block">
        <h4>Find Us:</h4>
        <p>FB — TW — INS — PT</p>
      </div>

    </div>
  </div>

  <!-- Bottom Map Strip -->

    <!-- map -->
        <div class="map-strip">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.7404193801362!2d71.46816369999999!3d33.999200699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d9173684972e21%3A0x1d57ccf628f0ab32!2sEncoderBytes%20(PRIVATE)%20LIMITED!5e0!3m2!1sen!2s!4v1764093023808!5m2!1sen!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </iframe>
        </div>
</section>
</main>
<?php get_footer();?>