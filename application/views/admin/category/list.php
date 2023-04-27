<div class="container my-5">
    <?php if($this->session->flashdata('category_success') != ""):?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('category_success');?>
    </div>
    <?php endif ?>
    <?php if($this->session->flashdata('error') != ""):?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error');?>
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-10">
            <h4>Available Category/s</h4>
        </div>
        <div class="col-md-10 text-right">
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:100%;">
        </div>
        <div class="col-md-10">
            <table class="table table-striped table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($category)) { ?>
                    <?php foreach($category as $categories) { ?>
                    <tr>
                        <td><?php echo $categories['category_id']; ?></td>
                        <td><?php echo $categories['category_name']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/category/edit/'.$categories['category_id']?>"
                                class="btn btn-info mb-1"><i class="fas fa-edit mr-1"></i>Edit</a>

                            <a href="javascript:void(0);" onclick="deleteCategory(<?php echo $categories['category_id']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                        <!-- <center>
                                <td><img class="img-responsive radius" 
                                src=" //echo base_url();?>public/admin/img/res.jpg"
                                style="min-width:150px; min-height: 100px;"></td>
                            </center> -->
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="10">Records not found</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
function deleteCategory(id) {
    if (confirm("Are you sure you want to delete category?")) {
        window.location.href = '<?php echo base_url().'admin/category/delete/';?>' + id;
    }
}
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>