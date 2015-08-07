<?php 
// gallery.php only works if there are some photos.
// Only the last 6 photos are published in the front-page.
// WP_Query arguments
        $args = array (
            'post_type'              => 'gallery',
            'posts_per_page'         => 6,
            'order'                  => 'ASC'
        );

// The Query
        $query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
<!-- === START GALLERY SECTION === -->
<section class="gallery-section container-fluid" id="gallery-section">
    <div class="row">

<?php
} 
?>

<?php  

        // The Loop
        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();

                $post_id = get_the_ID();

                // do something ?>

        <div class="col-xs-6 col-sm-4 col-lg-2 gallery">
            <div class="gallery-item">
                <div class="item-hover">
                    <div class="bg-hover"><span><?php the_title(); ?></span></div>   
                </div>
                <?php the_post_thumbnail(array('class' => 'img-responsive')); ?>
            </div>
        </div> 

        <?php

        endwhile; endif;

        ?>  

        <?php 

if ( $query->have_posts() ) { ?>  
    </div>
</section>
<!-- === END GALLERY SECTION === -->
<?php }

// Restore original Post Data
        wp_reset_postdata();

?>          
