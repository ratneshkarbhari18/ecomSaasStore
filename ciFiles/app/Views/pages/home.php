<main class="page-content" id="home">
    <div class="container" style="margin-top: 2em;margin-bottom: 2em;">
        <div class="row">
            <?php foreach($products as $product): ?>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <a href="<?php echo site_url($store_code."/product".'/'.$product["slug"]); ?>">
                    <div class="card text-dark">
                        <img src="<?php echo $mgtSiteUrl.'assets/images/product_featured_images/'.$product["featured_image"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <h4 class="product-title"><?php echo $product["title"]; ?></h4>
                            <p style="margin-bottom: 0;" class="product-price">₹ <?php echo $product["price"]; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>