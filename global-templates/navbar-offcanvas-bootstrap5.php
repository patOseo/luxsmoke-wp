<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part('global-templates/top-bar'); ?>

<nav id="main-nav" class="navbar navbar-dark navbar-expand-xl py-5 bg-medgrey text-white shadow" aria-labelledby="main-nav-label">

	<p id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</p>


	<div class="container-xxl px-md-4 px-xxl-0">

		<div class="navbar-brand mb-0 py-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<img alt="Lux Smoke Logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/luxsmoke-logo-alpha-shadow.svg" width="160" height="130">
			</a>
		</div>

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="offcanvas"
			data-bs-target="#navbarNavOffcanvas"
			aria-controls="navbarNavOffcanvas"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Open menu', 'understrap' ); ?>"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button
					class="btn-close btn-close-white text-reset"
					type="button"
					data-bs-dismiss="offcanvas"
					aria-label="<?php esc_attr_e( 'Close menu', 'understrap' ); ?>"
				></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'offcanvas-body',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 text-uppercase',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->

<?php if(get_field('special', 'option')): 
	$special = get_field('special', 'option');
	$between = $special['show_between'];
	date_default_timezone_set('America/Toronto');
	$special_start_time = date('H:i', strtotime($between['start']));
	$special_end_time = date('H:i', strtotime($between['end']));
	$current_time = date('H:i');
	if($current_time >= $special_start_time && $current_time <= $special_end_time):
?>
<div class="text-white mt-5 px-3 px-lg-0">
	<div class="container daily-special rounded-5 px-5 py-5 border border-1">
			<div class="row align-items-center h-100">
				<div class="col-md-8 mb-3 mb-md-0">
				<p class="heading mb-2"><?= $special['small_heading']; ?></p>
					<p class="h3 mb-3"><?= $special['heading']; ?></p>
					<?= $special['details']; ?>
				</div>
				<div class="col-md-4 text-md-end">
					<a class="btn btn-outline-light rounded-pill fw-normal ms-2 px-3 px-lg-5 py-2" href="<?php echo esc_url($special['button_link']); ?>"><?= $special['button_text']; ?></a>
				</div>
			</div>
	</div>
</div>
<?php endif; 
endif;