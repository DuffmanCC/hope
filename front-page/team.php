<!-- === START OUR TEAM SECTION === -->
<section class="our-team-section container-fluid" id="team-section">
    <div class="row">
        <div class="site-title col-xs-12">
            <h1>Our people</h1>
        </div>
            
        <?php  

        // WP_Query arguments
        $args = array (
            'post_type'    => 'team',
            'order'        => 'ASC'
        );

        // The Query
        $query = new WP_Query( $args );
        $conteo = 0;

        // The Loop
        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();
                $conteo = $conteo + 1;
                // do something ?>

        <div class="col-xs-12 col-sm-6 col-lg-5 <?php if($conteo%2!==0){echo " col-lg-offset-1";} ?> team">
            <div class="team-member">
                <div class="member-cover">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('front-page-members', array('class' => 'img-responsive')); ?>     
                    </a>
                </div>
                <div class="member-name">
                    <h3><?php the_title(); ?></h3>
                    <h4 class="">
                    <?php $position = get_post_meta( get_the_ID(), 'text_meta_field_position', true );
                    // check if the custom field has a value
                    if( ! empty( $position ) ) {
                      echo $position;
                    };  ?>
                    </h4>
                    <?php the_excerpt(); ?>
                    <div class="boton">
                        <a class="btn btn-default" href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                    <h5>
                    <?php $mail = get_post_meta( get_the_ID(), 'text_meta_field_mail', true );
                    // check if the custom field has a value
                    if( ! empty( $mail ) ) {
                      echo $mail;
                    };  ?>
                    </h5>
                </div>
            </div>
        </div>
        <?php agw_bootstrap_clearfix($conteo, 2); ?>

        <?php

        endwhile; endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>         
    </div><!-- .row -->
</section>
<!-- === END OUR TEAM SECTION ===