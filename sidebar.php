<?php
/**
 * The sidebar containing the main widget area
 *
 * @package agw
 */
?>

	</div><!-- close .main-content-inner -->

	<div class="sidebar col-sm-12 col-md-3">

		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="team" class="widget">
					<h3 class="widget-title">TEAM</h3>
					<ul>
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
                        $conteo= $conteo+1;

                        // do something ?>

                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>     

                <?php

        endwhile; endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>
					</ul>
				</aside>

				<aside id="services" class="widget">
					<h3 class="widget-title">SERVICES</h3>
					<ul>
						<?php  

                // WP_Query arguments
                $args = array (
                    'post_type'    => 'services',
                    'order'        => 'ASC'
                );

                // The Query
                $query = new WP_Query( $args );
                $conteo = 0;

                // The Loop
                if ( $query->have_posts() ):
                    while ( $query->have_posts() ):
                        $query->the_post();
                        $conteo= $conteo+1;

                        // do something ?>

                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>     

                <?php

        endwhile; endif;

        // Restore original Post Data
        wp_reset_postdata();

        ?>
					</ul>
				</aside>

				<?php 

				// WP_Query arguments
                $args = array (
                    'post_type'    => 'events',
                    'order'        => 'ASC'
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ):

                        // do something ?>

			    <aside id="events" class="widget">
					<h3 class="widget-title">NEXT EVENTS</h3>
					<ul>
						<?php  

		                // The Loop
		                if ( $query->have_posts() ):
		                    while ( $query->have_posts() ):
		                        $query->the_post();

		                        // do something ?>

		                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>     

		                <?php

				        endwhile; endif;

				        ?>
					</ul>
				</aside>

                <?php

				endif;

		        // Restore original Post Data
		        wp_reset_postdata();

		        ?>
				
			<?php 

				// WP_Query arguments
                $args = array (
                    'post_type'    => 'causes',
                    'order'        => 'ASC'
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ):

                        // do something ?>

			    <aside id="causes" class="widget">
					<h3 class="widget-title">CAUSES</h3>
					<ul>
						<?php  

		                // The Loop
		                if ( $query->have_posts() ):
		                    while ( $query->have_posts() ):
		                        $query->the_post();
		                        $conteo= $conteo+1;

		                        // do something ?>

		                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>     

		                <?php

				        endwhile; endif;

				        ?>
					</ul>
				</aside>

                <?php

				endif;

		        // Restore original Post Data
		        wp_reset_postdata();

		        ?>
				
			<?php endif; // dynamic_sidebar endif ?>

		</div><!-- close .sidebar-padder -->
