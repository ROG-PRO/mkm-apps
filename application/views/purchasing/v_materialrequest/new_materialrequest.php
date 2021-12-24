<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->fullname;
$today = date("Y-m-d H:i:s");
$date = date("Y-m-d");
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><a href="<?php echo site_url('purchasing/receive') ?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back </a></h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo site_url('marketing/inquiry') ?>">Log <?= $uri2 ?> </a></li>
                        <li class="breadcrumb-item active"><?= $uri3 ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <!-- Circle Buttons -->
                    <div class="card card-success card-outline">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                                <br/> -->

                            <div class="callout callout-success" style="background: #DAF5DC;padding: 0px">
                                <div class="card-body">
                                    <form action="<?= base_url('planner/materialrequest/addmaterial') ?>" method="post">

                                        <div class="form-row">

                                            <div>
                                                <input type="hidden" class="form-control" name="inquiry_detail_cby" id="inquiry_detail_cby" value="<?php echo $user ?>">
                                                <label></label>
                                                <input type="hidden" class="form-control" name="inquiry_detail_cdt" id="inquiry_detail_cdt" value="<?php echo $today ?>">
                                            </div>

                                            <div class="form-group col-md-2">
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
                                            <div class="form-group col-md-1">
                                                <label for="mr_soa">SOA</label>
                                                <input type="text" class="form-control " name="mr_soa" id="mr_soa" required placeholder="SOA">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="mr_soa">Kode Jenis Mtl</label>
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

                            </div>
                        </div>
                        <div class="card card-success card-outline">
                            <div class="card-header py-2">
                                <h6 class="m-0 font-weight-bold ">
                                    <!-- <button style="float: right;margin-right: 5px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload  "></i>  .csv</button> -->
                                    <a href="<?= base_url('marketing/inquiry/templete_inquiry') ?>" style="float: right;" class="btn btn-secondary ">
                                        <font style="color:#4A4343"><i class="fas fa-download  "></i> Templete</font>
                                    </a>
                                    <?php echo form_open_multipart($action); ?>
                                    <input style="float: right;margin-right: 5px;" type="file" name="inquiry" accept="text/csv" class="btn btn-secondary btn-sm">
                                    <input style="float: right;margin-right: 5px;" type="submit" Value="Import" name="import" class="btn btn-secondary">
                                    <?php echo form_close(); ?>
                                    Detail part
                                </h6>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('marketing/inquiry/addinquiry') ?>" method="post" class="form-horizontal">
                                    <div class="form-row">

                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" style="text-align:right;" class="col-sm-4 col-form-label">Cust. CD</label>
                                                        <div class="col-sm-4">

                                                            <select name="cust_cd" id="customer_cd" class="form-control select2" style="width: 100%;" onchange='changeValue(this.value)'>
                                                                <option selected="selected">Please select</option>
                                                                <?php

                                                                $a          = "var customer_cd = new Array();\n;";
                                                                $b          = "var customer_nm = new Array();\n;";
                                                                $c          = "var customer_cd2 = new Array();\n;";

                                                                foreach ($customer as $row) {
                                                                    echo '<option name="customer_cd" value="' . $row->customer_cd . '">' . $row->customer_cd . '</option>';
                                                                    $a .= "customer_cd['" . $row->customer_cd . "'] = {customer_cd:'" . addslashes($row->customer_cd) . "'};\n";
                                                                    $b .= "customer_nm['" . $row->customer_cd . "'] = {customer_nm:'" . addslashes($row->customer_nm) . "'};\n";
                                                                    $c .= "customer_cd2['" . $row->customer_cd . "'] = {customer_cd2:'" . addslashes($row->customer_cd2) . "'};\n";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input disabled type="text" class="form-control control-sm" id="customer_cd2" name="cust_cd2" placeholder="Customer cd" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" style="text-align:right;" class="col-sm-4 col-form-label">Customer</label>
                                                        <div class="col-sm-8">
                                                            <input disabled type="text" class="form-control control-sm" id="customer_nm" name="cust_nm" placeholder="Customer Name" value="">
                                                        </div>
                                                    </div>
                                                    <div class=" form-group row">
                                                        <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry No.(by Cust.)</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputPassword3" name="inquiry_custno" placeholder="No. Ref">
                                                        </div>
                                                    </div>
                                                    <!--  <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Tanggal</label>
                                                            <div class="col-sm-6">
                                                                <input  disabled type="text" class="form-control control-sm" id="created_dt" name="created_dt" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                            </div>
                                                        </div> -->
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Informasion by</label>
                                                        <div class="col-sm-4">
                                                            <select name="information_by" id="information_by" class="form-control" required="required">
                                                                <option value="" disabled selected>Please select</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Email">Email</option>
                                                                <option value="Reff">Ref</option>
                                                            </select>
                                                        </div>


                                                        <div class="col-sm-4" id="div_from" hidden>
                                                            <input type="text" class="form-control" id="from" placeholder="from" name="email_from" value="" hidden>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="nm_contact" placeholder="Contact name" name="nm_contact" value="" hidden>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="div_email" hidden>
                                                        <label for="inputEmail3" id="lbl_email" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Email</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="" hidden>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row" id="div_telp">
                                                        <label for="inputEmail3" id="lbl_no_telp" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Telp</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="no_telp" placeholder="No Telp" name="no_telp" value="" hidden>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" id="lbl_reff" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Reference</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nm_reff" placeholder="Reference" name="nm_reff" value="" hidden>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div>
                                                    <input type="hidden" class="" name="receive_cd" id="receive_cd" value="<?php echo date("YmdHis"); ?>">
                                                    <input type="hidden" class="" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry No.</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Supplier" name="id_inquiry" value="<?= $inquiry_cd ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Estimated by</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="<?= $user ?>" placeholder="Supplier">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Date</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" value="<?= $today ?>" class="form-control" name="created_dt" id="inputPassword3" placeholder="Date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Note</label>
                                                        <div class="col-sm-6">
                                                            <textarea type="text" class="form-control" name="inquiry_note" id="inputPassword3" placeholder="Note"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="table-responsive">

                                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Part No</th>
                                                            <th>Part name</th>
                                                            <th>Unit</th>
                                                            <th>Jumlah</th>
                                                            <th>Drawing</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php
                                                        if (isset($detailinquiry)) {
                                                            $no = 1;
                                                            foreach ($detailinquiry as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['inq_part_no']; ?></td>
                                                                    <td><?= $row['inq_part_nm'] ?></td>
                                                                    <td><?= $row['inq_nm_unit'] ?></td>
                                                                    <td><?= $row['inq_qty']; ?></td>
                                                                    <td><a href="<?= base_url('drawing/' . $row['inq_drawing'] . ' ') ?>"><?= $row['inq_drawing']; ?></a></td>
                                                                    <td width="4%" align="center">

                                                                        <a onclick="deleteConfirm(' <?php echo site_url('marketing/inquiry/hapusinquirydetail/' . $row['id_inquiry_detail']) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>

                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer ">

                                <button style="float:right;width: 100px;" type="submit" value="" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

    </section>
</div>

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk insertcsv data -->
<div class="modal fade" id="insertcsv<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert csv <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= form_open_multipart($action); ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="" name="inquiry" accept="text/csv">
                    <label class="custom-file-label" for="exampleInputFile">*.csv file only</label>
                </div>


            </div>
            <div class="modal-footer">
                <button style="margin-top:10px;float:right;" class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <button style="margin-top:10px;float:right;" class="btn btn-success " type="submit" name="import">Import</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#__part_nm").select2({
            placeholder: "Please Select",
            allowClear: true,
            theme: 'bootstrap4'
        });

    });
    $(document).ready(function() {
        $("#nm_unit").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });

    });
</script>
<!--<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()({
            theme: 'bootstrap4'

        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>-->

<script type="text/javascript">
    <?php
    echo $a;
    echo $b;
    echo $c; ?>

    function changeValue(id) {
        document.getElementById('customer_cd').value = customer_cd[id].customer_cd;
        document.getElementById('customer_nm').value = customer_nm[id].customer_nm;
        document.getElementById('customer_cd2').value = customer_cd2[id].customer_cd2;
    };
</script>


<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type='text/javascript'>
    $(window).load(function() {
        $("#information_by").change(function() {
            console.log($("#information_by option:selected").val());
            if ($("#information_by option:selected").val() == 'Telp') {
                $('#no_telp').prop('hidden', false);
                $('#lbl_no_telp').prop('hidden', false);
                $('#nm_contact').prop('hidden', false);
                $('#lbl_nm_contact').prop('hidden', false);
                $('#div_telp').prop('hidden', false);


            } else {
                $('#no_telp').prop('hidden', 'true');
                $('#lbl_no_telp').prop('hidden', 'true');
                $('#nm_contact').prop('hidden', 'true');
                $('#lbl_nm_contact').prop('hidden', 'true');
                $('#div_telp').prop('hidden', 'true');
            }
        });
    });

    $(window).load(function() {
        $("#information_by").change(function() {
            console.log($("#information_by option:selected").val());
            if ($("#information_by option:selected").val() == 'Email') {
                $('#email').prop('hidden', false);
                $('#lbl_email').prop('hidden', false);
                $('#from').prop('hidden', false);
                $('#div_email').prop('hidden', false);
                $('#div_from').prop('hidden', false);

            } else {
                $('#email').prop('hidden', 'true');
                $('#lbl_email').prop('hidden', 'true');
                $('#from').prop('hidden', 'true');
                $('#div_email').prop('hidden', true);
                $('#div_from').prop('hidden', true);

            }
        });
    });

    $(window).load(function() {
        $("#information_by").change(function() {
            console.log($("#information_by option:selected").val());
            if ($("#information_by option:selected").val() == 'Reff') {
                $('#nm_reff').prop('hidden', false);
                $('#lbl_reff').prop('hidden', false);


            } else {
                $('#nm_reff').prop('hidden', 'true');
                $('#lbl_reff').prop('hidden', 'true');


            }
        });
    });
</script>