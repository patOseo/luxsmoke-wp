<?php 

$feed = get_field('select_feed');
$cols = get_field('cols');

$style = get_field('style');

if($style == 'light') {
    $light = true;
    $dark = false;
} else {
    $light = false;
    $dark = true;
}

$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'category_fields_categorization',
            'value' => $feed,
            'compare' => 'LIKE'
        )
    )
);

// Create a new WP Query
$feed_query = new WP_Query( $args );

if($feed_query->have_posts()): ?>

<div class="product-categories-feed my-5 style-<?php echo esc_attr($style); ?>" uk-scrollspy="target: .row; cls: uk-animation-slide-bottom-medium; delay: 100;">
    <div class="row g-2 g-xl-6 mx-xl-n4 row-cols-xl-<?= $cols; ?> row-cols-md-3 row-cols-2 align-items-stretch justify-content-center" uk-scrollspy="target: .category-box; cls: uk-animation-slide-bottom-medium; delay: 100;">
        <?php while($feed_query->have_posts()): $feed_query->the_post(); ?>
        <?php
            $cat_fields = get_field('category_fields', get_the_ID());
            $cat_image = $cat_fields['icon'];
        ?>
            <div class="col">
                <div class="category-box h-100 text-center position-relative p-2 rounded-3 border border-3 border-white <?php if($light) { echo 'bg-lightestgrey'; } ?>">
                    <div class="category-border h-100 rounded-3 row align-items-between px-0 mx-0 py-6">
                        <div class="d-block cat-icon mb-3"><?php if($cat_image): ?><img src="<?php echo $cat_image; ?>" alt="<?php the_title(); ?> Icon" class="style-svg"><?php endif; ?></div>
                        <a class="stretched-link text-decoration-none text-uppercase fw-500 <?php if($light) { echo 'text-body'; } ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>      
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php wp_reset_postdata(); endif;


