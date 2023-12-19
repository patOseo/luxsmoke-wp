<div class="newsletter-section py-6">
    <div class="container py-6">
        <div class="col-xl-8">
            <h2 class="heading scroll-in"><?php the_field('newsletter_heading', 'option'); ?></h2>
            <p class="fs-4 mb-4 scroll-in"><?php the_field('newsletter_subheading', 'option'); ?></p>
            <?php // gravity form 2 
                gravity_form(2, false, false, false, '', true, 1);
            ?>
            <!-- <form action="#">
                <div class="row gx-2 gx-md-4 scroll-in-children">
                    <div class="col-6 col-md mb-4 mb-md-0">
                        <input type="text" class="form-control rounded-5 bg-transparent border-secondary" placeholder="Name">
                    </div>
                    <div class="col-6 col-md mb-4 mb-md-0">
                        <input type="email" class="form-control rounded-5 bg-transparent border-secondary" placeholder="Email">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-secondary border-0 rounded-5 w-100 fw-600 text-uppercase">Subscribe</button>
                    </div>
                </div>
                
            </form> -->
        </div>
    </div>
</div>