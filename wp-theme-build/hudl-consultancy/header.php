<?php
/**
 * The header: opening document markup, brand stripe and primary navigation.
 *
 * @package HUDL_Consultancy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===== STRIPE ACCENT ===== -->
<div class="stripe-bar" aria-hidden="true">
	<span></span><span></span><span></span><span></span>
</div>

<!-- ===== NAVIGATION ===== -->
<nav id="navbar" class="site-nav" role="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'hudl-consultancy' ); ?>">
	<div class="container">
		<div class="nav-inner">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" rel="home">
					<span><?php echo hudl_wordmark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<span class="sub"><?php esc_html_e( 'CONSULTANCY', 'hudl-consultancy' ); ?></span>
				</a>
			<?php endif; ?>

			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_id'        => 'navLinks',
						'menu_class'     => 'nav-links',
						'depth'          => 1,
						'fallback_cb'    => 'hudl_default_menu',
					)
				);
			} else {
				hudl_default_menu();
			}
			?>

			<div class="hamburger" id="hamburger" aria-label="<?php esc_attr_e( 'Toggle menu', 'hudl-consultancy' ); ?>" role="button" tabindex="0" aria-expanded="false">
				<span></span><span></span><span></span>
			</div>
		</div>
	</div>
</nav>

<div id="content" class="site-content">
