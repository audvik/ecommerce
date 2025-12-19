<?php get_header();?>

    <main>
         <section class="shop-hero">
            <div class="hero-inner">
                <!-- LEFT: heading, dotted grid, breadcrumbs, divider -->
                <div class="hero-left">
                    <span class="dot-grid" aria-hidden="true"></span>

                    <h1 class="hero-title">About Us</h1>

                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="#" class="bc-link">Home</a>
                        <span class="bc-sep">|</span>
                        <span class="bc-current">Abou us</span>
                    </nav>

                    <div class="hero-divider" aria-hidden="true"></div>
                </div>

                <!-- RIGHT: image -->
                <div class="hero-right">
                    <!-- replace src with your image path -->
                    <img src="<?php echo get_template_directory_uri();?>/images/banner-about.jpg" alt="model" class="hero-image">
                </div>
            </div>
        </section>


        <section class="about-company">

  <!-- First Block -->
  <div class="about-block">
    
    <div class="about-text">
      <h1>All About Company</h1>
      <p class="intro">
        Official representative of the world-famous clothing<br>
        brand Mollee in Europe and the world.
      </p>

      <h2>The Beginning Of Our Journey</h2>

      <div class="timeline">
        <div class="year">2010</div>
        <div class="line"></div>

        <div class="text">
          <p>
            In 2010, our company celebrated its 10th anniversary - these are
            the years of acquired experience of trading around the world.
            Join us among our clients! You can buy only original things from
            us. We offer products of your favorite brands - clothes, shoes,
            accessories, textiles and much more - quality products for every
            taste and age from Europe.
          </p>
        </div>
      </div>
    </div>

    <div class="about-stats">
      <img src="<?php echo get_template_directory_uri();?>/images/collections-image_1.jpg.jpeg" class="dots">
      
      <div class="stat-content">
        <h1>2587<span>+</span></h1>
        <p>Products for you</p>
      </div>
    </div>

  </div>

  <!-- Second Block -->
  <div class="about-block reverse">

    <div class="about-stats">
      <img src="<?php echo get_template_directory_uri();?>/images/collections-image_1.jpg.jpeg" class="dots">
      
      <div class="stat-content">
        <h1>5649<span>+</span></h1>
        <p>Satisfied clients</p>
      </div>
    </div>

    <div class="about-text">

      <h2>Who Are We Now?</h2>

      <div class="timeline right">
        <div class="year">2020</div>
        <div class="line"></div>

        <div class="text">
          <p>
            We now have a team of more than 1,000 skilled workers and about
            167 clothing brands that cooperate with us. Ordering in our store
            is a saving of time and effort to find what you need; assistance
            of experienced consultants in choosing a model.
            <br><br>
            Our specialists will help you specify your European size, tell you
            about fabrics and materials.
          </p>
        </div>
      </div>

    </div>
  </div>

</section>

<section class="about-hero">
    <div class="about-left">
        <img src="<?php echo get_template_directory_uri();?>/images/deal-of-the-week-inner.jpg.jpeg" alt="">
    </div>

    <div class="about-right">
        <p class="deal">DEAL <span>OF THE WEEK</span></p>

        <h1 class="title">
            Multi-Brand <br>
            Store Of Clothes
        </h1>

        <p class="desc">
            We follow fashion trends and have been working for you for more 
            than 20 years. A selection of the best, interesting, and most 
            importantly, boring outfits for different occasions.
        </p>

        <a href="./shop.html" class="shop-btn">Shop Now</a>
    </div>
</section>





<!-- customer services area start -->
<section class="feature-section">
      <div class="feature-box">
        <div class="icon1">
          <img src="<?php echo get_template_directory_uri();?>/images/advantages-icon_1.svg" alt="">
        </div>
        <h3>Free Shipping</h3>
        <div class="divider"></div>
        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit.</p>
      </div>

      <div class="feature-box">
        <div class="icon1">
          <img src="<?php echo get_template_directory_uri();?>/images/advantages-icon_2.svg" alt="">
        </div>
        <h3>24/7 Customer Service</h3>
        <div class="divider"></div>
        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit.</p>
      </div>

      <div class="feature-box">
        <div class="icon1">
          <img src="<?php echo get_template_directory_uri();?>/images/advantages-icon_3.svg" alt="">
        </div>
        <h3>Money Back Guarantee</h3>
        <div class="divider"></div>
        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit.</p>
      </div>
    </section>
<!-- customer services area end -->


<!-- newsletter section -->
 <section class="newsletter-section">
    
    <div class="bg-image">
        <img src="<?php echo get_template_directory_uri();?>/shop-images/banner-newsletter.jpg.jpeg" alt="">
    </div>

    <div class="newsletter-card">
        <h2>Newsletter</h2>
        <p>Be the first to hear about deals, offers and upcoming collections.</p>

        <div class="input-row">
            <input type="email" placeholder="Enter your email">
            <button>Subscribe</button>
        </div>

        <div class="dots"></div>
    </div>

</section>
</main>
<?php get_footer();?>
