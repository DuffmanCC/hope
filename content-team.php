<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package agw
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<h3><?php echo get_post_meta( get_the_ID(), 'text_meta_field_position', true ); ?></h3>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="member-cover">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="content"><?php the_content(); ?></div>	
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'agw' ),
				'after'  => '</div>',
			) );
		?>
		<h3 class="mail"><?php echo get_post_meta( get_the_ID(), 'text_meta_field_mail', true ); ?></h3>
	</div><!-- .entry-content -->
</article><!-- #post-## -->