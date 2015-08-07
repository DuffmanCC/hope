<?php 
// causes.php only works if there are some couses
// only the last 3 causes are published en the font-page.
// WP_Query arguments
        $args = array (
            'post_type'         => 'causes',
            'posts_per_page'    => 2
        );

// The Query
        $query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
<!-- === START CAUSES SECTION === -->
<section class="causes-section container-fluid" id="causes-section">
    <div class="row">
        <div class="site-title col-xs-12">
            <h1>Our causes</h1>  
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
        <div class="<?php agw_bootstrap_post_count($post_count);?>">
            <div class="cause-entry">
                <div class="cause-cover">
                    <div class="cause-cover-hover">
                        <h4><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                        <div class="donation-bar">
                            <div class="donation-porcentage"><span class="" style="width: <?php agw_donation_percentage($post_id); ?>%;"></span></div>
                            <p class=""><?php echo get_post_meta( $post_id, 'text_meta_field_people', true ); ?> People donated, <?php echo get_post_meta( $post_id, 'text_meta_field_currency', true ); ?><?php echo get_post_meta( $post_id, 'text_meta_field_amount', true ); ?> / <?php echo get_post_meta( $post_id, 'text_meta_field_currency', true ); ?><?php echo get_post_meta( $post_id, 'text_meta_field_goal', true ); ?></p>
                        </div>
                    </div>
                </div>
                <?php the_post_thumbnail('front-page-causes'); ?>
            </div>
        </div>

<?php

endwhile; endif;

?>

<?php 

if ( $query->have_posts() ) { 

?>  

    </div><!-- .row -->
</section>
<!-- === END OUR CAUSES SECTION === -->

<?php }

// Restore original Post Data
        wp_reset_postdata();

?>
                
            