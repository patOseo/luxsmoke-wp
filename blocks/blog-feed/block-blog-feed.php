<?php 

$max = get_field('max_posts');
$pagination = get_field('show_pagination');

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $max,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);

if($pagination) {
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args['paged'] = $paged;
}

$posts = new WP_Query($args);

?>


<?php if($posts->have_posts()): ?>
    <div class="block-blog-feed my-6" uk-scrollspy="target: .single-post; cls: uk-animation-slide-bottom-medium; delay: 100;">
        <div class="row row-cols-1 row-cols-lg-3 gx-xl-6">
            <?php while($posts->have_posts()): $posts->the_post(); ?>
            <div class="col mb-5 mb-xl-6">
                <div class="single-post position-relative d-flex flex-column h-100">
                    <div class="post-img mb-4">
                        <?php the_post_thumbnail('blog-feed', array('class' => 'rounded-3 shadow')); ?>
                    </div>
                    <div class="post-content px-2">
                        <p class="heading mb-2"><?php echo get_the_date('F j, Y'); ?></p>
                        <h3 class="h5 mb-4"><?php the_title(); ?></h3>
                    </div>

                    <div class="mt-auto"><a href="<?php the_permalink(); ?>" class="stretched-link d-inline-block px-5 fw-400 btn btn-outline-secondary rounded-pill">Read More</a></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
    if($pagination) {
        $blogs_page = get_permalink(get_page_by_path('blog'));
        $pagination_args = array(
            'total' => $posts->max_num_pages,
            'base' => $blogs_page . '%_%',
            'prev_text' => '&#60;',
            'next_text' => '&#62;',
        );
        understrap_pagination($pagination_args);
    } 
    ?>
<?php endif;