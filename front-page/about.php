<!-- === START OUR ACTIVITY SECTION === -->
<section class="activity-section container-fluid" id="activity-section">
    <div class="row">


        <?php  

        // WP_Query arguments
        $args = array (
            'pagename'               => 'about-us',
            'post_type'              => 'page',
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();

                // do something ?>

        <div class="site-title col-xs-12">
            <h1><?php the_title(); ?></h1>                    
        </div>
        <div class="site-content col-xs-12 col-lg-10 col-lg-offset-1">
            <?php the_content(); ?>
        </div>

        <?php

        endwhile; endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>
        
        
    </div>
</section>
<!-- === END OUR ACTIVITY SECTION === -->