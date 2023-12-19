<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="breadcrumbs px-4 py-3 rounded-pill bg-softgrey">
		<p class="mb-0 fs-sm text-muted"><a href="/">Home</a> » <a href="/blog/">Blog</a> » <?php the_title(); ?></p>
	</div>

	<header class="entry-header px-2 py-6 uk-animation-slide-bottom-small">

			<div class="heading mb-4"><?php the_date('F j, Y'); ?></div>
			<?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'banner', array('class' => 'w-100 rounded-4 shadow uk-animation-fade') ); ?>

	<div class="entry-content px-2 py-6">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
