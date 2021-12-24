<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales Order Detail</li>
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
                <div class="col-md-12">
                    <?php if ($so->so_approved == 0) { ?>
                        <a class="btn btn-app bg-success" onclick="approveConfirm(' <?php echo site_url('marketing/socustomer/approve/' . $so->so_no) ?>')">
                            <i class="fas fa-check"></i> Approve
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-app bg-success disabled">
                            <i class="fas fa-check"></i> Approved
                        </a>
                    <?php } ?>
                    <a href="<?= site_url('marketing/socustomer/print/' . strtolower($so->so_no)) ?>" class="btn btn-app bg-success" target="_blank">
                        <i class="fas fa-print"></i> Print Preview
                    </a>
                    <div class="card card-outline card-success">
                        <div class="card-header with-border">
                            <h3 class="card-title">Data Sales Order</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($so->so_approved == 0) : ?>
                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-danger text-lg">
                                        NOT APPROVED
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="form-group row">
                                <label for="so_no" class="col-sm-2 control-label">Nomor SO</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_no"><?= $so->so_no ?></dd>
                                </div>
                                <label for="so_date" class="col-sm-2 control-label">Tanggal SO</label>
                                <div class="col-sm-3">
                                    <dd class="form-control form-control-sm" id="so_date"><?= $so->so_date ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_customer" class="col-sm-2 control-label">Customer</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_no"><?= $so->so_customerid . " - " . $so->customer_nm ?></dd>
                                </div>
                                <label for="so_pono" class="col-sm-2 control-label">Nomor PO</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_pono"><?= $so->so_pono ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_project" class="col-sm-2 control-label">Nama Project</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_project"><?= $so->so_project ?></dd>
                                </div>
                                <label for="so_deliverydate" class="col-sm-2 control-label">Tanggal Delivery</label>
                                <div class="col-sm-3">
                                    <dd class="form-control form-control-sm" id="so_deliverydate"><?= $so->so_deliverydate ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_process" class="col-sm-2 control-label">Jenis Proses</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_no"><?= $so->so_proses = 'F' ? 'Fabrication' : 'Machining'  ?></dd>
                                </div>
                                <label for="so_production" class="col-sm-2 control-label">Jenis Produksi</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_production"><?= $so->so_proses = 'MP' ? 'Mass Pro' : 'Job Order'  ?></dd>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_process" class="col-sm-2 control-label">Approved by</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_no"><?= $so->so_approvedby ?></dd>
                                </div>
                                <label for="so_production" class="col-sm-2 control-label">Tanggal Approved</label>
                                <div class="col-sm-4">
                                    <dd class="form-control form-control-sm" id="so_production"><?= $so->so_approveddate ?></dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data Detail Part Sales Order</h3>
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
                                            <th>Delivery Date</th>
                                            <th>Note</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="displayPart">

                                    </tbody>
                                </table>
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
            <div class="modal-body">Approve Sales Order sekarang</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-approve" class="btn btn-success" href="#">Approved</a>
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

<?php if ($this->session->flashdata('success') == TRUE) : ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Approved berhasil!'
            })
        });
    </script>
<?php endif; ?>


<script>
    $(document).ready(function() {
        getdatapart();

        function getdatapart() {
            var sono = '<?= $soid ?>';
            $.ajax({
                type: 'GET',
                url: '<?= base_url('marketing/socustomer/getdatapartbyso') ?>',
                dataType: 'JSON',
                data: 'sono=' + sono,
                async: true,
                success: function(data) {
                    var html;
                    var i;
                    var j = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + j + '</td>' +
                            '<td>' + data[i].sod_itemcode + '</td>' +
                            '<td>' + data[i].sod_itemname + '</td>' +
                            '<td>' + data[i].sod_model + '</td>' +
                            '<td>' + data[i].sod_qty + '</td>' +
                            '<td>' + data[i].sod_deldt + '</td>' +
                            '<td>' + data[i].sod_remark + '</td>' +
                            '<td></td>' +
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
</script>