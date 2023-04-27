<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Sea Food Categories</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container text-center padding dish-card">
    <div class="row container">
        <?php if(!empty($categories)) { ?>
        <?php foreach($categories as $category) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-15 shadow-sm">
                <?php $image = $category['img'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/category/thumb/'.$image; ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $category['category_name']; ?></h4>
                    <hr>
                    <a href="<?php echo base_url().'product/list/'.$category['category_id']; ?>" class="btn btn-primary">View
                        Menu</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h1>No records found</h1>
        <?php } ?>
    </div>
</div>