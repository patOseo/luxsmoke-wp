<?php 
$color = get_field('icon_color');
?>

<div class="social-icons <?= $color; ?> my-4">
	<?php $social_links = get_field('social_media_links', 'option'); ?>

	<?php if($social_links['facebook']): ?><div class="d-inline">
		<a class="text-<?= $color; ?>" href="<?php echo $social_links['facebook']; ?>" target="_blank" rel="noopener,noreferrer"><img class="style-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-facebook.svg" width="40" height="40"></a>
	</div><?php endif; ?>
	<?php if($social_links['twitter']): ?><div class="d-inline">
		<a class="text-<?= $color; ?>" href="<?php echo $social_links['twitter']; ?>" target="_blank" rel="noopener,noreferrer"><img class="style-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-twitter-x.svg" width="40" height="40"></a>
	</div><?php endif; ?>
	<?php if($social_links['instagram']): ?><div class="d-inline">
		<a class="text-<?= $color; ?>" href="<?php echo $social_links['instagram']; ?>" target="_blank" rel="noopener,noreferrer"><img class="style-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-instagram.svg" width="40" height="40"></a>
	</div><?php endif; ?>
</div>