<?php 
// events.php only works if there are some events.
// only the last 3 events are published in the font-page.
// WP_Query arguments
        $args = array (
            'post_type'         => 'events',
            'posts_per_page'    => 3
        );

// The Query
        $query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
<!-- === START EVENTS SECTION === -->
<section class="events-section container-fluid" id="events-section">
    <div class="row">
        <div class="site-title col-xs-12">
            <h1>Our events</h1>
        </div>
    </div>
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
        $post_count = $query->post_count;
        // do something ?>
        <div class="col-lg-4">
            <div class="event-item">
                <div class="item-img">
                    <div class="item-cover">
                        <h3><?php echo get_post_meta( $post_id, 'text_meta_field_price', true ); ?> – fee</h3>                              
                    </div>
                    <?php the_post_thumbnail('front-page-events'); ?>
                </div>
                <header class="item-header">
                    <h5><?php echo get_post_meta( $post_id, 'text_meta_field_date', true ). ', <br> '. get_post_meta( $post_id, 'text_meta_field_place', true ); ?></h5>
                    <h2><a href="<?php the_permalink(); ?>" class="d-text-c-h"><?php the_title(); ?></a></h2>
                </header>
                <div class="item-content">
                    <?php the_excerpt(); ?>
                    <div class="boton">
                        <a class="btn btn-default" href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                </div>
                <footer class="item-footer">
                    <h6>The event will start at <?php echo get_post_meta( $post_id, 'text_meta_field_start', true ); ?> and finish at <?php echo get_post_meta( $post_id, 'text_meta_field_end', true ); ?></h6>
                </footer>
            </div>
        </div>

<?php

endwhile; endif;

?> 


<?php 

if ( $query->have_posts() ) { 

?>  

    </div><!-- .row -->
</section><!-- .events-section -->
<!-- === END BLOG SECTION === -->

<?php }

// Restore original Post Data
        wp_reset_postdata();

?>                  
                