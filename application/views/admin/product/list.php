<div class="container mt-3">
    <div class="container shadow-container">
        <?php if($this->session->flashdata('product_success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('product_success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <h2>All Menu Details</h2>
            </div>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:50%;">
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Seafood Name</th>
                        <th>About</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($product)) { ?>
                    <?php foreach($product as $products) {?>
                    <tr>
                        <td><?php echo $products['product_id']; ?></td>
                        <td><?php echo $products['name']; ?></td>
                        <td><?php echo $products['about']; ?></td>
                        <td><?php echo "$".$products['price']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/product/edit/'.$products['product_id']; ?>"
                                class="btn btn-info mb-1"><i
                                    class="fas fa-edit mr-1"></i>Edit</a>

                            <a href="javascript:void(0);" onclick="deleteProduct(<?php echo $products['product_id']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="4">Records not founds</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
function deleteProduct(id) {
    if (confirm("Are you sure you want to delete dish?")) {
        window.location.href = '<?php echo base_url().'admin/product/delete/';?>' + id;
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