<!-- === START OUR SERVICES SECTION === -->
<section class="our-services container-fluid" id="services-section">
    <div class="row">
        <div class="site-title col-xs-12">
            <h1>Services</h1>                    
        </div>
    </div>    
    
    <div class="row">
        <?php  

        // WP_Query arguments
        $args = array (
            'post_type'              => 'services',
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();
                $post_id = get_the_id();

                // do something ?>

        <div class="col-md-4">
            <div class="one-service">
                <figure class="service-icon">
                    <i class="<?php echo get_post_meta( $post_id, 'text_meta_field_logo', true );?>"></i>
                </figure>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="boton">
                    <a class="btn btn-default" href="<?php the_permalink(); ?>">Read more</a>
                </div>
            </div>

        </div>
        

        <?php

        endwhile; endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>
    </div><!-- end .row -->
</section>
<!-- === END OUR SERVICES SECTION ===