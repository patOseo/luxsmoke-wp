<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'global-templates/newsletter' ); ?>

<?php if(get_field('hide_footer', get_the_ID()) != 'yes'): ?>
<div class="wrapper py-6" id="wrapper-footer">

	<div class="container py-6">

		<div class="row" uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 100;">

			<div class="col-6 col-lg-3">
				<h2 class="heading">Products</h2>
				<?php 
				wp_nav_menu(
					array(
						'menu'			  => 'Products Menu',
						'menu_class' 		  => 'menu footer-menu text-muted ps-0',
						'fallback_cb'     => '',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</div>

			<div class="col-6 col-lg-3">
				<h2 class="heading">Store Information</h2>
				<div class="text-muted ls-lg mb-4"><?php the_field('address', 'option'); ?></div>
				<h2 class="heading">Hours</h2>
				<div class="text-muted ls-lg"><?php the_field('hours', 'option'); ?></div>
				<div class="social-icons my-4">
					<?php $social = get_field('social_media_links', 'option'); ?>
					<?php if($social['facebook']): ?><div class="d-inline">
						<a href="<?php echo $social['facebook']; ?>" target="_blank" rel="noopener,noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-facebook.svg" width="30" height="30"></a>
					</div><?php endif; ?>
					<?php if($social['twitter']): ?><div class="d-inline">
						<a href="<?php echo $social['twitter']; ?>" target="_blank" rel="noopener,noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-twitter-x.svg" width="30" height="30"></a>
					</div><?php endif; ?>
					<?php if($social['instagram']): ?><div class="d-inline">
						<a href="<?php echo $social['instagram']; ?>" target="_blank" rel="noopener,noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-instagram.svg" width="30" height="30"></a>
					</div><?php endif; ?>
				</div>
			</div>

			<div class="col-lg-6">
				<div class='embed-container'><iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11679.496303113063!2d-81.262037!3d42.959858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef1a742a01f3d%3A0x8994cbb3f17447cc!2sLux%20Smoke%20Cannabis!5e0!3m2!1sen!2sin!4v1699043587652!5m2!1sen!2sin' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></div>
			</div>

		</div><!-- .row -->

	</div><!-- .container -->

</div><!-- #wrapper-footer -->
<?php endif; ?>

<footer class="site-footer bg-secondary py-5" id="colophon">
	<div class="copyright site-info text-center text-muted fw-300">
		© <?php echo date('Y'); ?> Lux Smoke | All Rights Reserved
	</div>
</footer><!-- #colophon -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_template_part('global-templates/age-verification'); ?>
</body>

</html>

