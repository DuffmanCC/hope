<?php
/**
 * The Template for displaying all single posts.
 *
 * @package agw
 */

get_header(); ?>

<div class="row">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'causes' ); ?>

	<?php endwhile; // end of the loop. ?>
</div>

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>