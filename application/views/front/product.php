<div class="container p-4">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Menu of <?php echo $cat['category_name']; ?></h1>
        </div>
    </div>
    <div class="container res-card">
        <div class="card">
            <?php $img = $cat['img'];?>
            <img src="<?php echo base_url().'public/uploads/category/thumb/'.$img; ?>" class="card-img-top" />
            <div class="card-body">
                <h4 class="card-title font-weight-bold text-primary"><?php echo $cat['category_name']; ?></h4>

                <p class="card-text">
                A feast of gorgeousness awaits you with super-seasonal dishes created with love by our wonderful chefs.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container p-4 dish-card">
    <div class="row">
        <?php if(!empty($product)) { ?>
        <?php foreach($product as $products) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $products['img'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/products/thumb/'.$image; ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?php echo $products['name']; ?></h4>
                        <h4 class="text-muted"><b>$<?php echo $products['price']; ?></b></h4>
                    </div>
                    <p class="card-text"><?php echo $products['about']; ?></p>
                    <a href="<?php echo base_url().'Product/addToCart/'.$products['product_id']; ?>" class="btn btn-primary"><i
                            class="fas fa-shopping-cart"></i> Add to
                        Cart</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <div class="jumbotron">
            <h1>No records found</h1>
        </div>
        <?php } ?>
    </div>
    <hr class="my-4">
</div>