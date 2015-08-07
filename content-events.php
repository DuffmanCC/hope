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
		<h3><?php echo get_post_meta( get_the_id(), 'text_meta_field_date', true ). ', '. get_post_meta( get_the_id(), 'text_meta_field_place', true ); ?></h3>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<p><span>The event will start at: </span><?php echo get_post_meta( get_the_id(), 'text_meta_field_start', true ); ?></p>
		<p><span>The event will end at: </span><?php echo get_post_meta( get_the_id(), 'text_meta_field_end', true ); ?></p>
		<p><span>Price: </span><?php echo get_post_meta( get_the_id(), 'text_meta_field_price', true ); ?></p>
	</footer>
</article><!-- #post-## -->