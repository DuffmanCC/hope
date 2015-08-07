<?php 
// WP_Query arguments
        $args = array (
            'post_type'              => 'partners'
        );

// The Query
        $query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
<!-- === START OUR CLIENTS SECTION === -->
    <div class="clients-section" id="clients-section">
    <div class="container">
        <div class="site-title">
            <p>We are supported by</p>
            <h1>Our partners</h1>                    
        </div>
        <div class="our-clients-logo">   
            <div class="row tesla-carousel-items">
<?php
} 
?>

        <?php  

        // The Loop
        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();
                $post_count = $query->post_count;?>

        
                <div class="<?php if ( $post_count == 1 ) {
                    echo 'col-md-8 col-md-offset-2';
                } elseif ( $post_count == 2 ) {
                    echo 'col-md-6';
                } elseif ( $post_count == 3 ) {
                    echo 'col-md-4';
                } elseif ( $post_count > 3 ) {
                    echo 'col-md-3 col-sm-6';
                }?>">
                    <?php the_post_thumbnail('front-page-partners'); ?>
                </div>
            
        <?php

        endwhile; endif;

        ?>
    
<?php 

if ( $query->have_posts() ) { ?>  
            </div><!-- .row -->
        </div>
    </div>  
</div> 
<?php }

// Restore original Post Data
        wp_reset_postdata();

?> 
<!-- === END OUR CLIENTS SECTION === -->
