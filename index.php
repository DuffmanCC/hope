<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package agw
 */

get_header(); ?>

<?php 
$conteo_index = 0; 
?>

	<?php if ( have_posts() ) : ?>

<div class="row masonry">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php 
		$conteo_index = $conteo_index + 1;
		?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
		<header>
		<div class="entry-content-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php agw_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'agw' ),
				'after'  => '</div>',
			) );
		?>
		</div><!-- .entry-content -->


		<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'agw' ) );
				if ( $categories_list && agw_categorized_blog() ) :
			?>
			<p class="cat-links">
				<?php printf( __( 'Posted in: %1$s', 'agw' ), $categories_list ); ?>
			</p>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'agw' ) );
				if ( $tags_list ) :
			?>
			<p class="tags-links">
				<?php printf( __( 'Tagged: %1$s', 'agw' ), $tags_list ); ?>
			</p>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<p class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'agw' ), __( '1 Comment', 'agw' ), __( '% Comments', 'agw' ) ); ?></p>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'agw' ), '<p class="edit-link">', '</p>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->


		<?php endwhile; ?>
</div>
<div class="row">
	<div class="col-xs-12">
		<?php agw_content_nav( 'nav-below' ); ?>
	</div>
</div>
		
	<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>