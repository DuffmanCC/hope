<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package agw
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<div class="entry-content-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="donation-bar">
	        <div class="donation-porcentage">
	        	<span style="width: <?php agw_donation_percentage( get_the_ID() ); ?>%;"></span>
	        	<p><?php agw_donation_percentage( get_the_ID() ); ?>%</p>
	        </div>
	        <p><?php echo get_post_meta( get_the_ID(), 'text_meta_field_people', true ); ?> People donated, <?php echo get_post_meta( get_the_ID(), 'text_meta_field_currency', true ); ?><?php echo get_post_meta( get_the_ID(), 'text_meta_field_amount', true ); ?> / <?php echo get_post_meta( get_the_ID(), 'text_meta_field_currency', true ); ?><?php echo get_post_meta( get_the_ID(), 'text_meta_field_goal', true ); ?></p>
	    </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'agw' ),
				'after'  => '</div>',
			) );
		?>
		<h3 class="mail"><?php echo get_post_meta( get_the_ID(), 'text_meta_field_mail', true ); ?></h3>
	</div><!-- .entry-content -->
	<div class="boton">
        <a class="btn btn-default" href="<?php echo get_post_meta( get_the_ID(), 'text_meta_field_paypal', true ); ?>" target="_blank">Donate</a>
    </div>


</article><!-- #post-## -->