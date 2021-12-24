<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input MR Detail</li>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item"><a href="#">Engineering </a></li>
                        <li class="breadcrumb-item"><a href="#">Material Request </a></li>
                        <li class="breadcrumb-item active">Input Detail</li>
                    </ol>
                </div>
                <!`-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $user = $this->session->userdata('user_logged')->username;
    $today = date("Y-m-d H:i:s");
    $uri4 = $this->uri->segment('4');
    $uri5 = $this->uri->segment('5');

    ?>
    <section class="content">
        <div class="container-fluid">
            <form action="<?= base_url('engineering/materialrequest/savemr_wsop') ?>" method="post" class="form-horizontal">
                <div class="row">
                    <!-- <div class="col-md-12">
                            <button type="submit" name="savepo" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= site_url('engineering/materialrequest') ?>" class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i class="fas fa-times"></i> Batal</a>
                            <div class="card card-outline card-primary">
                            !-- <div class="card-header with-border">
                                <h3 class="card-title">Data PO</h3>
                            </div> --
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="po_custcode" class="col-sm-1 control-label">So Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_custcode" class="form-control" value="<?= $so_number ?>">
                                    </div>

                                    <label for="so_pono" class="col-sm-1 control-label">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="po_pono" class="form-control" value="<?= $mrDate ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <a href="<?= base_url('engineering/materialrequest/input_mr1/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" type="button" style="border-color: green;" disabled>A. RAW MATERIAL</a>
                        <!-- <a href="<?= base_url('engineering/materialrequest/input_mr1/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" type="button" style="border-color: green;" disabled>A. RAW MATERIAL</a> -->
                        <a href="#" class="btn btn-success btn-sm" type="button">B. TOOLS</a>
                        <a href=#" class="btn btn-secondary btn-sm ">C. OTHERS</a>
                        <!-- <a href="<?= base_url('engineering/materialrequest/input_mrOthers/' . $uri4 . '/' . $uri5) ?>" class="btn btn-secondary btn-sm ">C. OTHERS</a> -->
                        <!-- <button class="btn btn-secondary btn-sm disabled" style="border-color: green;" disabled="true">C. OTHERS</button> -->

                    </div>
                </div>
            </form>

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">TOOLS</h3>
                </div>
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                                <br/> -->
                    <!-- <a href="<?= base_url('engineering/materialrequest/create_mr_wsopart') ?>" class="btn btn-success btn-sm">Without SO part reference</a>
                                <a style="border-color:  green" href="<?= base_url('engineering/materialrequest/create_mr_wsopart') ?>" class="btn btn-secondary btn-sm">With SO part reference</a>
                                <br/> -->
                    <div class="callout callout-success" style="background: #DAF5DC;padding: 0px">
                        <div class="card-body">
                            <form action="<?= base_url('engineering/materialrequest/addmrtooldetail/' . $uri4 . '/' . $uri5) ?>" method="post">

                                <div class="form-row">

                                    <div>
                                        <input type="hidden" class="form-control" name="mr_created_by" id="mr_created_by" value="<?php echo $user ?>">
                                        <label></label>
                                        <input type="hidden" class="form-control" name="mr_created_dt" id="mr_created_dt" value="<?php echo $today ?>">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="mtl_type_cd">Kode Jenis Mtl</label>
                                        <select name="id_barang" id="id_barang" class="form-control " onchange='changeValue(this.value)' required>
                                            <option value="">- Pilih Tools -</option>
                                            <?php
                                            $a = "var id_barang = new Array();\n;";
                                            $b = "var part_no = new Array();\n;";
                                            $c = "var part_nm = new Array();\n;";

                                            foreach ($tools as $row) {
                                                echo "<option value='" . $row->id_barang . "'>" . $row->part_no . "</option>";
                                                $a .= "id_barang['" . $row->id_barang . "'] = {id_barang:'" . addslashes($row->id_barang) . "'};\n";
                                                $b .= "part_no['" . $row->id_barang . "'] = {part_no:'" . addslashes($row->part_no) . "'};\n";
                                                $c .= "part_nm['" . $row->id_barang . "'] = {part_nm:'" . addslashes($row->part_nm) . "'};\n";
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <input type="hidden" class="form-control " name="mr_item" id="part_no" value="" placeholder="" required>
                                    <input type="hidden" class="form-control " name="mr_item_nm" id="part_nm" value="" placeholder="" required>
                                    <input type="hidden" class="form-control " name="so_number" id="" value="<?= $uri4 ?>" required>

                                    <div class="form-group col-md-2">
                                        <label for="mr_item">Satuan</label>
                                        <input type="text" class="form-control " name="mr_unit" id="mr_unit" value="Pcs" placeholder="Unit" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="id_inquiry">Quantiry</label>
                                        <input type="text" class="form-control " name="mr_qty" id="mr_qty" placeholder="Quantity" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="mr_supplier">Supplier reference</label>
                                        <input type="text" class="form-control" name="mr_supplier" id="mr_supplier" required placeholder="Suuplier">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="mr_soa">SOA</label>
                                        <input type="text" class="form-control " name="mr_soa" id="mr_soa" required placeholder="SOA">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">&nbsp;</label>
                                        <button type="submit" class="form-control btn btn-success btn-sm "> <i class="fas fa-plus-circle"></i> Add </button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card card-success card-outline">
                    <!-- <div class="card-header py-2">
                                <h6 class="m-0 font-weight-bold ">
                                    <!-- <button style="float: right;margin-right: 5px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload  "></i>  .csv</button> --
                                    <a href="<?= base_url('marketing/inquiry/templete_inquiry') ?>" style="float: right;" class="btn btn-secondary ">
                                        <font style="color:#4A4343"><i class="fas fa-download  "></i> Templete</font>
                                    </a>
                                    <?php echo form_open_multipart($action); ?>
                                    <input style="float: right;margin-right: 5px;" type="file" name="inquiry" accept="text/csv" class="btn btn-secondary btn-sm">
                                    <input style="float: right;margin-right: 5px;" type="submit" Value="Import" name="import" class="btn btn-secondary">
                                    <?php echo form_close(); ?>
                                    Detail part
                                </h6>
                            </div> -->
                    <div class="card-body">
                        <!-- <form action="<?= base_url('engineering/materialrequest/savemrtooldetail/' . $uri4 . '/' . $uri5) ?>" method="post" class="form-horizontal"> -->
                        <div class="form-row">

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="mtl_type_cd" style="text-align:right;">SO Number</label>
                                            <div class="col-sm-6">
                                                <input type="text" value="<?= $so_number ?>" class="form-control" name="so_number" id="inputPassword3" placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">MR Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="<?= $uri5 ?>" class="form-control" name="mr_no" id="inputPassword3" placeholder="MR">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="<?= $today ?>" class="form-control" name="mr_date" id="inputPassword3" placeholder="Date">
                                            </div>
                                        </div>



                                    </div>
                                    <!-- <div>
                                                    <input type="hidden" class="" name="receive_cd" id="receive_cd" value="<?php echo date("YmdHis"); ?>">
                                                    <input type="hidden" class="" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                </div> -->
                                    <div class="form-group col-md-6">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Created by</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="created_by" class="form-control" value="<?= $user ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Note</label>
                                            <div class="col-sm-6">
                                                <textarea type="text" class="form-control" name="mr_note" id="inputPassword3" placeholder="Note"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="table-responsive">

                                    <table class="table table-sm table-bordered " id="table" border=" 0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Satuan</th>
                                                <th>Supplier</th>
                                                <th>SOA</th>
                                                <th>Kode Jenis MR</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            if (isset($detailmr)) {
                                                $no = 1;
                                                foreach ($detailmr as $row) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->mr_item ?></td>
                                                        <td><?= $row->mr_qty ?></td>
                                                        <td><?= $row->mr_unit ?></td>
                                                        <!-- <td><?= $row->mr_unit ?></td> -->
                                                        <td><?= $row->mr_supplier ?></td>
                                                        <td><?= $row->mr_soa ?></td>
                                                        <td><?= $row->mtl_type_cd ?></td>
                                                        <td width="4%" align="center">

                                                            <a onclick="deleteConfirm(' <?php echo site_url('engineering/materialrequest/hapusmrdetail_wsop/' . $row->mr_detail_id) . '/' . $uri4 . '/' . $uri5 ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>


                        <div class="card-footer ">

                            <a href="<?= base_url('engineering/materialrequest/input_mrOthers/' . $uri4 . '/' . $uri5) ?>" style="float:right;width: 100px;" type="submit" value="" class="btn btn-success"> Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>

            </div>
        </div>
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
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>
<script type="text/javascript">
    <?php
    echo $a;
    echo $b;
    ?>

    function changeValue(id) {
        document.getElementById('id_barang').value = id_barang[id].id_barang;
        document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('part_nm').value = part_nm[id].part_nm;

    };
</script>