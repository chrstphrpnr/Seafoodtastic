<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-users" style="color:#d8ad2e;font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countUser; ?></h2>
                        <p class="m-b-0">User/s</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow p-30">  
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-utensils" style="color:#17a2b8; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countProduct; ?></h2>
                        <p class="m-b-0">Products</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-file" style="color:#9466de; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countOrders; ?></h2>
                        <p class="m-b-0">Total Order/s</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-th-large" style="color:#505050; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countCategory;?></h2>
                        <p class="m-b-0">Categories</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-spinner" style="color:#ad6d9c; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countPendingOrders; ?></h2>
                        <p class="m-b-0">Pending Order/s</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-check-square" style="color:#28a745; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countDeliveredOrders; ?></h2> 
                        <p class="m-b-0">Delivered Order/s</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-times-circle" style="color:#dc3545; font-size: 2.5em;"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?php echo $countRejectedOrders; ?></h2>
                        <p class="m-b-0">Rejected Order/s</p>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
</div>