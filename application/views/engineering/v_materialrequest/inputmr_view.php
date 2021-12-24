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
    $uri4 = $this->uri->segment(4);

    ?>
    <section class="content">
        <div class="container-fluid">

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
                    <button class="btn btn-success btn-sm" type="button">A. RAW MATERIAL</button>
                    <a href="<?= base_url('engineering/materialrequest/input_mrTools/' . $so_number . '/' . $mr_no) ?>" class="btn btn-secondary btn-sm disabled" style="border-color: green;" disabled>B. TOOLS</a>
                    <button class="btn btn-secondary btn-sm disabled" style="border-color: green;" disabled>C. OTHERS</button>
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title" style="float: left;">RAW MATERIAL</h3>
                            <a href="<?= site_url('engineering/materialrequest/create_mr_wsopart') ?>" class="btn btn-danger btn-sm" style="margin-bottom: 5px;float:right">X</a>
                            <!-- <button type="submit" name="savepo" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-save"></i> Save</button> -->
                        </div>


                        <div class="card-body">
                            <!-- <div class="card-body">
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

                                </div> -->
                            <!-- <div class="card-body"> -->
                            <!-- <form action="" method="post" class="form-horizontal"> -->
                            <div class="form-row">

                                <div class="form-group col-md-6">

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="so_number" style="text-align:right;">SO Number</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="so_number" class="form-control" value="<?= $so_number ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Date</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mr_date" class="form-control" value="<?= date('Y-m-d H:i:s') ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="mr_no" class="form-control" value="<?= $mr_no ?>">
                                            </div>
                                        </div> -->



                                </div>

                                <div class="form-group col-md-6">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Created by</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mr_created_by" class="form-control" value="<?= $user ?>" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label" style="text-align:right;">Note</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" name="mr_note" id="" placeholder="Note"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!-- </div> -->
                            <!-- </div> -->
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;">Item Code</th>
                                            <th rowspan="2" style="vertical-align: middle;">Item Name</th>
                                            <th colspan="4">BOM</th>
                                            <th rowspan="2" style="vertical-align: middle;">SO Qty</th>
                                            <!-- <th>Delivey DT</th> -->
                                            <th rowspan="2" style="vertical-align: middle;">MR Qty</th>
                                            <th rowspan="2" style="vertical-align: middle;">Unit</th>
                                            <th rowspan="2" style="vertical-align: middle;">MR SOA</th>
                                            <th rowspan="2" style="vertical-align: middle;">Supplier</th>
                                            <!-- <th rowspan="2" style="vertical-align: middle;">Mtl type</th>  -->
                                        </tr>
                                        <tr>
                                            <!-- <th>Item Code</th> -->
                                            <!-- <th>Item Name</th> -->
                                            <th width="15%">RM Part No</th>
                                            <th width="5%">RM Panjang</th>
                                            <th width="5%">RM Lebar/Dia.</th>
                                            <th width="5%">RM Tinggi</th>
                                            <!-- <th>SO Quantity</th> -->
                                            <!-- <th>Unit</th> -->
                                            <!-- <th>Delivey DT</th> -->
                                            <!-- <th>Note</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <?php for ($i = 0; $i < count($mrdetail);) : ?>
                                            <tr>
                                                <td>
                                                    <input style="width: 100%" type="text" name="mr_item[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_item ?>">
                                                    <!-- <input style="width: 100%" type="hidden" name="so_number[<?= $i ?>]" value="<?= $sodetail[$i]->sod_sono ?>"> -->
                                                </td>
                                                <td><input style="width: 100%" type="text" name="mr_item_nm[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_item_nm ?>"></td>
                                                <td><input style="width: 100%" type="text" name="mr_rmpartno[<?= $i ?>]" placeholder="Input model" value="<?= $mrdetail[$i]->mr_rmpartno ?>"></td>
                                                <td><input style="width: 100%" type="text" name="mr_rmlong[<?= $i ?>]" placeholder="Input model" value="<?= $mrdetail[$i]->mr_rmlong ?>"></td>
                                                <td><input style="width: 100%" type="text" name="mr_rmwidth[<?= $i ?>]" placeholder="Input model" value="<?= $mrdetail[$i]->mr_rmwidth ?>"></td>
                                                <td><input style="width: 100%" type="text" name="mr_rmheight[<?= $i ?>]" placeholder="Input model" value="<?= $mrdetail[$i]->mr_rmheight ?>"></td>
                                                <td><input style="width: 50px" type="text" name="mr_soqty[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_soqty ?>"></td>
                                                <td><input style="width: 50px;background:yellow" type="text" name="mr_qty[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_qty ?>"></td>
                                                <td><input style="width: 50px" type="text" name="mr_unit[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_unit ?>"></td>
                                                <!-- <td><input type="date" name="po_deldt[<?= $i ?>]" value="<?= $mrdetail[$i]->quo_deldt ?>"></td> -->
                                                <td><input style="width: 100%" type="text" name="mr_soa[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_soa ?>" placeholder="SOA"></td>
                                                <td><input style="width: 100%" type="text" name="mr_supplier[<?= $i ?>]" value="<?= $mrdetail[$i]->mr_supplier ?>" placeholder="Supplier"></td>
                                                <!--  <td>
                                                    <select name="mtl_type_cd" id="mtl_type_cd" style="height: 24px">
                                                        <option value="">- Mtl_type -</option>
                                                        <?php
                                                        foreach ($mtltype as $row) {
                                                            echo "<option value='" . $row->mtl_type_cd . "'>" . $row->mtl_type_cd . "</option>";
                                                        }

                                                        ?>

                                                    </select>
                                                </td> -->
                                            </tr>
                                        <?php $i++;
                                        endfor; ?>
                                    </tbody>
                                </table>
                                <hr>
                                <!-- <button type="submit" name="savepo" class="btn btn-success btn-sm" style="margin-bottom: 5px;float:right"> Next</button> -->
                                <a href="<?= base_url('engineering/materialrequest/input_mrTools/' . $so_number . '/' . $mr_no) ?>" style="float:right" class="btn btn-sm btn-success">Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">B. TOOLS</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('engineering/materialrequest/addmrtooldetail') ?>" method="post">

                        <div class="form-row">

                            <div>
                                <input type="hidden" class="form-control" name="mr_created_by" id="mr_created_by" value="<?php echo $user ?>">
                                <label></label>
                                <input type="hidden" class="form-control" name="mr_created_dt" id="mr_created_dt" value="<?php echo $today ?>">
                                <input type="hidden" class="form-control" name="mr_created_dt" id="mr_created_dt" value="<?php echo $so_number ?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="mr_item">Item</label>
                                <input type="text" class="form-control " name="mr_item" id="mr_item" value="" placeholder="Item" required>
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
                            <div class="form-group col-md-2">
                                <label for="mtl_type_cd">Kode Jenis Mtl</label>
                                <select name="mtl_type_cd" id="mtl_type_cd" class="form-control " required>
                                    <option value="">- Pilih Satuan -</option>
                                    <?php
                                    foreach ($mtltype as $row) {
                                        echo "<option value='" . $row->mtl_type_cd . "'>" . $row->mtl_type_cd . "</option>";
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="form-group col-md-1">
                                <label for="">&nbsp;</label>
                                <button type="submit" class="form-control btn btn-primary btn-sm "> <i class="fas fa-plus-circle"></i> Add </button>
                            </div>
                        </form>
                    </div>


                    <div class="table-responsive">

                        <table class="table table-sm table-bordered " id="table" border=" 0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Supplier</th>
                                    <th>SOA</th>
                                    <th>Kode Jenis Mtl</th>
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
                                            <td><?= $row->mr_supplier ?></td>
                                            <td><?= $row->mr_soa ?></td>
                                            <td><?= $row->mtl_type_cd ?></td>
                                            <td width="4%" align="center">

                                                <a onclick="deleteConfirm(' <?php echo site_url('engineering/materialrequest/hapusmrdetail/' . $row->mr_detail_id) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>

                            </tbody>
                        </table>

                    </div>







                </div> -->
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

</script>