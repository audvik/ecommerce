    <div class="landingPageProducts">
      <div class="newcol">
        <p>New Collection</p>
      </div>
      <div class="feature-products">
        <h2>Featured products</h2>
      </div>
    </div>
    <!--product grid 1-->
    <div class="product-grid">
    <?php
$args = array(
    'post_type'      => 'post',   // default blog posts
    'posts_per_page' => 6,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    //echo '<div class="posts-wrapper">';

    while ( $query->have_posts() ) : $query->the_post();
    ?>
    <a href="<?php the_permalink(); ?>" class="product-link">
        <div class="product-card">
          <div class="tag new">NEW</div>
          <div class="wishlist">♡</div>
            
          <div class="product-image">
            <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Product">
                <?php endif; ?>
          </div>

          <div class="product-info">
            <h3><?php the_title(); ?></h3>
            <p class="price">Rs <?php echo the_field('price'); ?></p>
          </div>
        </div>
    </a>
    <?php
    endwhile;

    //echo '</div>';
endif;

// IMPORTANT: reset query
wp_reset_postdata();
?>

    </div>
    <br>
    <!--product grid 2-->
    <div class="product-grid">
<?php
$args = array(
    'post_type'      => 'cloths',   // default blog posts
    'posts_per_page' => 3,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    //echo '<div class="posts-wrapper">';

    while ( $query->have_posts() ) : $query->the_post();
    ?>
      <a href="<?php the_permalink(); ?>" class="product-link">
        <div class="product-card">
          <div class="tag new">NEW</div>
          <div class="wishlist">♡</div>

          <div class="product-image">
            <?php if ( has_post_thumbnail() ) : ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Product">
             <?php endif; ?>
          </div>

          <div class="product-info">
            <h3><?php the_title(); ?></h3>
            <p class="price">RS<?php echo the_field('price'); ?></p>
          </div>
        </div>
      </a>
 <?php
    endwhile;

    //echo '</div>';
endif;

// IMPORTANT: reset query
wp_reset_postdata();
?>
      
 </div>