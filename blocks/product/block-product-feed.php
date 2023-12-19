<?php 
$products = get_field('products');
if($products) {
    $count = count($products);
}

if($count >= 4) {
    $cols = '4';
} else {
    $cols = $count;
}
?>

<?php if(have_rows('products')): ?>
<div class="product-feed py-5" uk-scrollspy="target: .row; cls: uk-animation-slide-bottom-medium; delay: 100;">
    <div class="row row-cols-2 row-cols-xl-<?= $cols; ?> gx-2 gx-xl-4 align-items-stretch" uk-scrollspy="target: .single-product; cls: uk-animation-slide-bottom-medium; delay: 100;">
        <?php while(have_rows('products')): the_row(); ?>
        <?php 
            $img = get_sub_field('image');
            $p_id = get_sub_field('product_id');
            $name = get_sub_field('name');
            $provider = get_sub_field('provider');
            $price = get_sub_field('price');
            $amount = get_sub_field('amount');
        ?>
        <div class="col d-flex flex-column mb-4">
            <div class="single-product position-relative h-100 p-4 rounded-3 border border-1">
                <div class="product-img text-center mb-3">
                    <?php echo wp_get_attachment_image($img, array(300, 300), '', array('class' => 'mx-auto')); ?>
                </div>
                <a class="stretched-link text-body text-decoration-none" href="/products#/product/<?= $p_id; ?>"><?= $name; ?></a>
                <p class="text-uppercase fs-sm fw-bold">By <?= $provider; ?></p>
                <p class="fw-bold mb-0"><?= $price; ?> | <?= $amount; ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>