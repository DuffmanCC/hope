<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package agw
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead-frontpage" class="site-header " role="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="site-header-inner col-xs-8 col-sm-12">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>

			<nav class="site-navigation col-xs-4 col-sm-12">
				<div class="navbar navbar-default">
					<div class="navbar-header">
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"><?php _e('Toggle navigation','agw') ?> </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- The WordPress Menu goes here -->
					<?php if( is_front_page() ){
						wp_nav_menu(
						array(
							'menu' 				=> 'Front-page',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'main-menu',
							'walker' 			=> new wp_bootstrap_navwalker()
							)
						);
					}else{
						wp_nav_menu(
						array(
							'menu' 				=> 'Menu sin front page',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'main-menu',
							'walker' 			=> new wp_bootstrap_navwalker()
							)
						);
					} 
					?>

				</div><!-- .navbar -->
			</nav><!-- .site-navigation --> 
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->

<?php get_template_part( 'front-page/slider', 'slider' ); ?>

<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container-fluid">
		<div class="row">
			<?php if( !is_front_page() ): ?>
			<div id="content" class="main-content-inner col-md-9">
			<?php endif; ?>

