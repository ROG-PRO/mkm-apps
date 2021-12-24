<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PO Customer Detail</li>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item"><a href="#">Sales Order </a></li>
                        <li class="breadcrumb-item active">Order Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $user = $this->session->userdata('user_logged')->username;
    $today = date("Y-m-d H:i:s");

    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php if ($po->po_soflex == 0) { ?>
                    <a class="btn bg-success btn-app" style="margin-bottom: 5px;color:white;float:right" onclick="approveConfirm(' <?php echo site_url('marketing/socustomer/createso/' . $po->po_no) ?>')">
                        <i class="fas fa-file"></i> Create SO
                    </a>
                <?php } else { ?>
                    <a class="btn bg-success btn-app disabled" style="margin-bottom: 5px;background: #D3D0D0;float:right">
                        <i class="fas fa-check"></i> Created SO
                    </a>
                    <?php } ?><?php if ($po->po_soflex == 1) { ?>
                    <a class="btn bg-warning btn-app" style="margin-bottom: 5px;color:white;float:right" onclick="cancelConfirm(' <?php echo site_url('marketing/socustomer/cancelso/' . $po->po_no) ?>')">
                        <i class="fas fa-times"></i> Cancel SO
                    </a>
                <?php } else { ?>
                    <!-- <a class="btn btn-secondary btn-sm disabled" style="margin-bottom: 5px;background: #D3D0D0">
                            <i class="fas fa-check"></i> Created SO
                        </a> -->
                <?php } ?>

                <a class="btn bg-danger btn-app" style="margin-bottom: 5px;color:white;float:right" href="<?php echo site_url('marketing/pocustomer') ?>">
                    <i class="fas fa-times"></i> Close
                </a>

                <div class="col-md-12">


                    <div class="card  card-outline card-success">
                        <div class="card-header with-border">
                            <h3 class="card-title" style="margin: 0px">Data PO Customer</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="so_no" class="col-sm-1 control-label">Nomor PO</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_no" style="background:yellow"><?= $po->po_no ?></dd>
                                </div>
                                <label for="so_date" class="col-sm-1 control-label">Tanggal SO</label>
                                <div class="col-sm-3">
                                    <dd class="form-control" id="so_date"><?= $po->po_date ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_customer" class="col-sm-1 control-label">Customer</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_no"><?= $po->po_customerid . " - " . $po->customer_nm ?></dd>
                                </div>
                                <label for="so_pono" class="col-sm-1 control-label">Nomor PO</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_pono"><?= $po->po_pono ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_project" class="col-sm-1 control-label">Nama Project</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_project"><?= $po->po_project ?></dd>
                                </div>
                                <label for="so_deliverydate" class="col-sm-1 control-label">Tanggal Delivery</label>
                                <div class="col-sm-3">
                                    <dd class="form-control" id="so_deliverydate"><?= $po->po_deliverydate ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_process" class="col-sm-1 control-label">Jenis Proses</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_no"><?= $po->po_proses ?></dd>
                                    <!-- <dd class="form-control" id="so_no"><?= $po->po_proses = 'F' ? 'Fabrication' : 'Machining'  ?></dd> -->
                                </div>
                                <label for="so_production" class="col-sm-1 control-label">Jenis Produksi</label>
                                <div class="col-sm-4">
                                    <dd class="form-control" id="so_production"><?= $po->po_jenis ?></dd>
                                    <!-- <dd class="form-control" id="so_production"><?= $po->po_jenis = 'MP' ? 'Mass Pro' : 'Job Order'  ?></dd> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data Detail Part PO Customer</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Model</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Del date</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody id="displayPart">

                                    </tbody>
                                </table>
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<!-- Approve Modal-->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">SO will be generate, Continue ? </div>
            <!-- <div class="modal-body">Anda yakin data PO ini akan dibuat menjadi Sales Order?</div> -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-approve" class="btn btn-success" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>
<!-- Cancel Modal-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin Cancel Sales Order?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-approve" class="btn btn-success" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-logout" class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        getdatapart();

        function getdatapart() {
            var pono = '<?= $poid ?>';
            $.ajax({
                type: 'GET',
                url: '<?= base_url('marketing/pocustomer/getdatapartbypo') ?>',
                dataType: 'JSON',
                data: 'pono=' + pono,
                async: true,
                success: function(data) {
                    var html;
                    var i;
                    var j = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + j + '</td>' +
                            '<td>' + data[i].pod_itemcode + '</td>' +
                            '<td>' + data[i].pod_itemname + '</td>' +
                            '<td>' + data[i].pod_model + '</td>' +
                            '<td>' + data[i].pod_qty + '</td>' +
                            '<td>' + data[i].pod_unit + '</td>' +
                            '<td>' + data[i].pod_deldt + '</td>' +
                            '<td>' + data[i].pod_remark + '</td>' +
                            '</tr>';
                        j++;
                    }
                    console.log(html);
                    $('#displayPart').html(html);
                }
            });
        }
    });


    function approveConfirm(url) {
        $('#btn-approve').attr('href', url);
        $('#approveModal').modal();
    }

    function cancelConfirm(url) {
        $('#btn-cancel').attr('href', url);
        $('#cancelModal').modal();
    }
</script>