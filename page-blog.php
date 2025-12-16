<?php get_header();?>
    <main>


        <!-- SECTION HTML: paste into your page where needed -->
        <section class="shop-hero">
            <div class="hero-inner">
                <!-- LEFT: heading, dotted grid, breadcrumbs, divider -->
                <div class="hero-left">
                    <span class="dot-grid" aria-hidden="true"></span>

                    <h1 class="hero-title">Blog</h1>

                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="#" class="bc-link">Home</a>
                        <span class="bc-sep">|</span>
                        <span class="bc-current">Blog</span>
                    </nav>

                    <div class="hero-divider" aria-hidden="true"></div>
                </div>

                <!-- RIGHT: image -->
                <div class="hero-right">
                    <!-- replace src with your image path -->
                    <img src="<?php echo get_template_directory_uri();?>/images/banner-blog.jpg" alt="model" class="hero-image">
                </div>
            </div>
        </section>




        
      




    </main>

    <div class="separator">

    </div>



<script src="<?php echo get_template_directory_uri();?>/shop.js"></script>
</body>

</html>
<?php get_footer();?>