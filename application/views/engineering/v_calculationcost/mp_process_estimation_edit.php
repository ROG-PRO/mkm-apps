<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');
$uri5 = $this->uri->segment('5');
$uri6 = $this->uri->segment('6');
$uri7 = $this->uri->segment('7');

$tot_tools_amount = $tools_amount;
$tot_rm_amount = $rm_amount;
$tot_process_amount = $process_amount;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Estimation Cost
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
                        <li class="breadcrumb-item active"><?= $uri1 ?></li>
                        <li class="breadcrumb-item active"><?= $uri2 ?></li>
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


                    <!--<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i> upload csv</button></h1><br />-->

                    <div class="card card-success card-outline">


                        <div class="card-header py-2">
                            <h6 class="m-0 font-weight-bold " style="padding:0px">Detail estimation / <?= $uri6 . ' / ' . $uri7 ?>
                                <a href="<?= base_url('engineering/estimationcost/mp_process_estimation/' . $uri5 . '/' . $uri6 . '/' . $uri7 . '/ ') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>

                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>

                        <div class="col-12">




                            <!-- ./row -->
                            <div class="row">
                                <div class="col-12 col-sm-12">




                                    <br />

                                    <!-- === detail process start == -->
                                    <div class="card card-warning">
                                        <div class="card-header py-2">
                                            <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit Detail Process</h6>
                                        </div>
                                        <form action="<?php echo site_url('engineering/estimationcost/mp_tambah_process') ?>" method="post" class="form-horizontal">
                                            <div class="card-body">
                                                <div class="form-row">


                                                    <div class="form-group col-md-4">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Tanggal</label>
                                                            <div class="col-sm-6">
                                                                <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="created_dt" id="created_dt" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                                <input type="hidden" name="id_inquiry_detail" value="<?= $uri7 ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" form-group row">
                                                            <label for="inputPassword3" class="col-sm-5 col-form-label" style="text-align:right;">Process Name</label>
                                                            <div class="col-sm-6">
                                                                <select name="id_process" id="id_process " class="form-control form-control-sm nm_process" required>
                                                                    <option value="">- Pilih process -</option>

                                                                    <?php
                                                                    foreach ($process as $row) {
                                                                        echo "<option value='" . $row->id_process . "'";
                                                                        echo $row->id_process ==  $detailprocessedit['id_process'] ? 'selected' : '';
                                                                        echo ">" . $row->process_nm . "</option>";
                                                                    }

                                                                    ?>

                                                                </select>
                                                                <!--<input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">-->
                                                                <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Inquiry Number</label>
                                                            <div class="col-sm-6">
                                                                <input style="border: 1px solid grey-light; " value="<?= $uri5 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-5 col-form-label" name="" style="text-align:right;">Machine Type</label>
                                                            <div class="col-sm-7">
                                                                <select name="id_machine" id="type_machine " class="form-control type_machine" required>
                                                                    <option value="">- Pilih Machine type -</option>

                                                                    <?php
                                                                    foreach ($machineType as $row) {

                                                                        echo "<option value='" . $row->id_machine . "'";
                                                                        echo $row->id_machine ==  $detailprocessedit['id_machine'] ? 'selected' : '';
                                                                        echo ">" . $row->type_machine . "</option>";
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Time</label>
                                                            <div class="col-sm-5">
                                                                <input style="border: 1px solid grey-light; " value="<?= $detailprocessedit['mc_time'] ?>" type="text" name="mc_time" class="form-control form-control-sm" id="mc_time" placeholder="">
                                                            </div>
                                                            Minute
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="card-footer ">

                                                <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Update</button>
                                            </div>
                                        </form>
                                    </div>



                                    <!--- process end --->







                                </div>
                            </div>
                        </div>
    </section>
</div>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<script>
    $(document).ready(function() {
        $(".part_nm").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });

        $(".part_no").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });
        $(".type_machine").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });
        $(".nm_process").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });

    });
</script>

<script type="text/javascript">
    <?php
    echo $a;
    echo $b;
    echo $c; ?>

    function changeValue(id) {
        document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('part_nm').value = part_nm[id].part_nm;
        document.getElementById('id_barang').value = id_barang[id].id_barang;
    };
</script>