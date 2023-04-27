<div class="container">
    <form action="<?php echo base_url().'admin/category/edit/'.$category['category_id'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Edit "<?php echo $category['category_name'] ?>" Details</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Category Name</label>
                    <input type="text" name="category_name"  class="form-control
                    <?php echo (form_error('category_name') != "") ? 'is-invalid' : '';?>" placeholder="Add category name"
                        value="<?php echo set_value('category_name', $category['category_name']);?>">
                    <?php echo form_error('category_name'); ?>
                </div>
               
            <div class="col-md-12">
                <div class="form-group has-danger">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <br>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($category['img'] != '' && file_exists('./public/uploads/category/thumb/'.$category['img'])) { ?>
                    <img class="mt-1" src="<?php echo base_url().'public/uploads/category/thumb/'.$category['img']; ?>">
                    <?php } else {?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                </div>
             
        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-success" value="Make Changes">
            <a href="<?php echo base_url().'admin/category/index'?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
