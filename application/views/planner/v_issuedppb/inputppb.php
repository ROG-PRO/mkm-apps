<style>
    label {
        float: right;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input Detail PPB</li>
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
            <form action="<?= base_url('planner/issuedppb/save') ?>" method="post" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card card-outline card-primary">
                            <div class="card-header with-border">
                                <!-- <h3 class="card-title">Data PPB</h3> -->
                                <button type="submit" name="saveppb" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= site_url('planner/issuedppb') ?>" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fas fa-times"></i> Batal</a>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group row">
                                            <label for="so_number" class="col-sm-4 col-form-label" style="float: right;"> So Number</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_so_number" class="form-control" value="<?= $this->input->post('so_number') ?>">
                                                <input type="hidden" name="mr_no" class="form-control" value="<?= $this->input->post('mr_no') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_pono" class="col-sm-4 col-form-label" style="float: right;">Customer</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_customer_id" class="form-control" value="<?= $mr->customer_cd ?>" style="float: right;">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_project" class="col-sm-4 col-form-label" style="float: right;">Request Date</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_request_dt" class="form-control" value="<?= $mr->mr_dt ?>">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_project" class="col-sm-4 col-form-label" style="float: right;">PO Number</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_po_number" class="form-control" value="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group row">
                                            <label for="so_deliverydate" class="col-sm-4 col-form-label" style="float: right;">Document No.</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_doc_no" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_process" class="col-sm-4 control-label" style="float: right;">Request Section</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_section_id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_production" class="col-sm-4 control-label" style="float: right;">Request by</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="ppb_request_by" class="form-control">

                                            </div>
                                        </div>


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
                                                <th>Nama Barang</th>
                                                <th>Code</th>
                                                <!-- <th>Model</th> -->
                                                <th>Quantity</th>
                                                <th>Harga</th>
                                                <th>Tanggal diminta</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php for ($i = 0; $i < count($mrdetail);) : ?>
                                                <tr>
                                                    <td><input type="text" name="ppb_part_name[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_item_nm ?>"></td>
                                                    <td><input type="text" name="ppb_part_cd[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_item ?>"></td>
                                                    <!-- <td><input type="text" name="po_qty[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_qty ?>"></td> -->
                                                    <td><input type="text" name="ppb_qty[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_qty ?>"></td>
                                                    <td><input type="text" name="ppb_price[<?= $i ?>]"></td>
                                                    <td><input type="date" name="ppb_incoming_dt[<?= $i ?>]" placeholder="Data"></td>
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