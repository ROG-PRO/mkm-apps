<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input Detail PO</li>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item"><a href="#">Marketing </a></li>
                        <li class="breadcrumb-item"><a href="#">PO Cstomer </a></li>
                        <li class="breadcrumb-item active">Input Detail</li>
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
            <form action="<?= base_url('marketing/pocustomer/save') ?>" method="post" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="savepo" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= site_url('marketing/pocustomer') ?>" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fas fa-times"></i> Batal</a>
                        <div class="card card-outline card-primary">
                            <div class="card-header with-border">
                                <h3 class="card-title">Data PO</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="po_custcode" class="col-sm-1 control-label">Customer Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_custcode" class="form-control" value="<?= $inquiry->cust_cd ?>">
                                    </div>

                                    <label for="so_pono" class="col-sm-1 control-label">Nomor PO Cust.</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_pono" class="form-control" value="<?= $this->input->post('poPono') ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="so_project" class="col-sm-1 control-label">Nama Project</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_project" class="form-control" value="<?= $inquiry->project_nm ?>">
                                        <input type="hidden" name="id_inquiry" class="form-control" value="<?= $inquiry->id_inquiry ?>">
                                    </div>
                                    <label for="so_deliverydate" class="col-sm-1 control-label">Tanggal Delivery</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="po_delivdate" class="form-control" value="<?= $this->input->post('poDelivery') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="so_process" class="col-sm-1 control-label">Jenis Proses</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_jproses" class="form-control" value="<?= $inquiry->type_process  ?>">
                                    </div>
                                    <label for="so_production" class="col-sm-1 control-label">Jenis Produksi</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_jprod" class="form-control" value="<?= $inquiry->type_prod ?>">
                                        <input type="hidden" name="po_inquiry" value="<?= $this->input->post('poInquiry') ?>">
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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Model</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Delivey DT</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php for ($i = 0; $i < count($inqdetail);) : ?>
                                                <tr>
                                                    <td><input type="text" name="po_partcode[<?= $i ?>]" value="<?= $inqdetail[$i]->inq_part_no ?>"></td>
                                                    <td><input type="text" name="po_partname[<?= $i ?>]" value="<?= $inqdetail[$i]->inq_part_nm ?>"></td>
                                                    <td><input type="text" name="po_model[<?= $i ?>]" placeholder="Input model"></td>
                                                    <td><input style="width: 50px" type="text" name="po_qty[<?= $i ?>]" value="<?= $inqdetail[$i]->inq_qty ?>"></td>
                                                    <td><input style="width: 50px" type="text" name="po_unit[<?= $i ?>]" value="<?= $inqdetail[$i]->inq_nm_unit ?>"></td>
                                                    <td><input type="date" name="po_deldt[<?= $i ?>]" value="<?= $inqdetail[$i]->quo_deldt ?>"></td>
                                                    <td><input type="text" name="po_note[<?= $i ?>]" placeholder="Note"></td>
                                                </tr>
                                            <?php $i++;
                                            endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>
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

</script>