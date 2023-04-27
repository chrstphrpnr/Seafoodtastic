<div class="container">
    <form action="<?php echo base_url().'admin/category/create_category';?>" method="POST"
        class="form-container mx-auto  shadow-container" id="myForm" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Add New Category</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control
                    <?php echo (form_error('category_name') != "") ? 'is-invalid' : '';?>" placeholder="Add Category"
                    value="<?php echo set_value('category_name');?>">

                    <?php echo form_error('category_name'); ?>
                    <span></span>
                </div>
              
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <span></span>
                </div>
            </div>
        </div>
       
        <div class="form-actions">
            <input type="submit" id="btn" name="submit" class="btn btn-success" value="Save">
            <a href="<?php echo base_url().'admin/category/index'?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
