<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>

			</main>

	</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php /* Old Buddi store ?>
<?php if(get_field('cat_page')): 
	$fields = get_field('category_fields');
	$name = $fields['buddi_name'];
	$type = $fields['categorization'];
?>


<script>
	// Get the current URL
	var currentURL = window.location.href;

	// Append the Buddi string
	var newURL;
	<?php if($type == 'cannabis_cat'): ?>
		newURL = currentURL + "#/menu?productTypes=%5B<?= $name; ?>%5D";
	<?php elseif($type == 'cannabis_type'): ?>
		newURL = currentURL + "#/menu/collections/<?= $name; ?>";
	<?php endif; ?>
	
	// Check if the currentURL contains "#/menu"
	if (currentURL.indexOf("#/menu") === -1) {
		// Update the current URL only if it doesn't contain "#/menu"
		window.history.pushState("", "", newURL);
	}
</script>

<?php endif; ?>

<?php */ ?>

<?php
get_footer();
