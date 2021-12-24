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
$uri8 = $this->uri->segment('8');

// $tot_tools_amount = $tools_amount;
// $tot_rm_amount = $rm_amount;
// $tot_process_amount = $process_amount;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h2 class="m-0 text-dark">Estimation Cost <h2>


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

                            <h6 class="m-0 font-weight-bold " style="padding:0px">Detail estimation


                                <a href="<?= base_url('engineering/estimationcost/jo_process_estimation/' . $uri5 . '/' . $uri6 . '/' . $uri7 . '/' . $uri8 . '') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>
                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>

                        <br />

                        <div class="col-12">

                            <style>
                                fieldset {
                                    border: 1px solid #DDDDDD;
                                    display: inline-block;
                                    font-size: 12px;
                                    padding: 1em 2em;
                                    width: 100%;
                                }

                                legend {
                                    background: #BFD48C;
                                    color: #FFFFFF;
                                    margin-top: 15px;
                                    margin-bottom: 5px;
                                    padding: 1px 10px;
                                    width: fit-content;
                                    font-size: 14px;
                                }
                            </style>


                            <div class="col-12">




                                <!-- ./row -->
                                <div class="row">
                                    <div class="col-12 col-sm-12">




                                        <!-- === detail process start == -->
                                        <div class="card card-warning">
                                            <div class="card-header py-2">
                                                <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="fas fa-pencil-alt"></i> Edit Detail Process</h6>
                                            </div>
                                            <form action="<?php echo site_url('engineering/estimationcost/jo_edit_process') ?>" method="post" class="form-horizontal">
                                                <div class="card-body">

                                                    <div class="form-row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group ">
                                                                <label>Material</label>

                                                                <select name="id_barang" id="id_barang " class="form-control form-control-sm nm_process" required="">
                                                                    <option value="">- Pilih process -</option>

                                                                    <?php

                                                                    foreach ($mtl_process as $row) {

                                                                        echo "<option value='" . $row->id_barang . "'";
                                                                        echo $row->id_barang ==  $detailprocessedit['id_barang'] ? 'selected' : '';
                                                                        echo ">" . $row->part_no . "</option>";
                                                                    }

                                                                    ?>


                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group ">
                                                                <label>Process Name <?= $detailprocessedit['id_process'] ?></label>

                                                                <select name="id_process" id="id_process " class="form-control nm_process">
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
                                                                <input type="hidden" class="form-control " name="created_by" id="created_by" value="<?php echo $user ?>">

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group ">
                                                                <label>Tanggal</label>

                                                                <input style="border: 1px solid grey-light; " disabled type="text" class="form-control " name="created_dt" id="created_dt" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">

                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="id_inquiry_detail" value="<?= $uri6 ?>">
                                                        <input type="hidden" name="id_process_detail" value="<?= $uri4 ?>">
                                                        <input value="<?= $uri5 ?>" type="hidden" name="id_inquiry" class="form-control " id="id_inquiry" placeholder="" readonly>
                                                        <input type="hidden" name="prod_type" value="<?= $uri7 ?>">
                                                        <input type="hidden" name="part_no" value="<?= $uri8 ?>">

                                                        <!-- <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label>Inquiry Number</label>


                                    </div>
                                </div> -->


                                                        <!-- <div class="col-sm-4">
                                    <div class="form-group ">
                                        <label>Machine Type</label>

                                        <select name="id_machine" id="type_machine " class="form-control type_machine">
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

                                <div class="col-sm-4">
                                    <div class="form-group ">

                                        <label>Time/minute</label>

                                        <input style="border: 1px solid grey-light; " value="" type="text" name="mc_time" class="form-control " id="mc_time" placeholder="">
                                    </div>
                                </div> -->
                                                    </div>

                                                    <br />
                                                    <fieldset>
                                                        <legend>In House</legend>
                                                        <div class="form-row" id="div_1">

                                                            <div class="col-sm-4" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_nm">Machine Type</label>

                                                                    <select name="id_machine" id="type_machine " class="form-control " onchange='changeValue(this.value)'>
                                                                        <option value="">- Pilih Machine type -</option>

                                                                        <?php
                                                                        // foreach ($machineType as $row) {
                                                                        //     echo "<option value='" . $row->id_machine . "'>" . $row->type_machine . "</option>";
                                                                        // }

                                                                        $con = mysqli_connect("localhost", "root", "mySQL", "mkm_test");
                                                                        $query = "SELECT *  from machine ";
                                                                        $result = mysqli_query($con, $query);
                                                                        // $a          = "var part_no = new Array();\n;";
                                                                        $x          = "var cost_unit = new Array();\n;";
                                                                        $y          = "var cost_machine = new Array();\n;";
                                                                        $z          = "var id_machine = new Array();\n;";

                                                                        while ($row = mysqli_fetch_array($result)) {

                                                                            echo "<option value='" . $row['id_machine'] . "'";
                                                                            echo $row['id_machine'] ==  $detailprocessedit['id_machine'] ? 'selected' : '';
                                                                            echo ">" . $row['type_machine'] . "</option>";
                                                                            $x .= "cost_unit['" . $row['id_machine'] . "'] = {cost_unit:'" . addslashes($row['cost_unit']) . "'};\n";
                                                                            $y .= "cost_machine['" . $row['id_machine'] . "'] = {cost_machine:'" . addslashes($row['cost_machine']) . "'};\n";
                                                                            $z .= "id_machine['" . $row['id_machine'] . "'] = {id_machine:'" . addslashes($row['id_machine']) . "'};\n";
                                                                        }
                                                                        ?>
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_price">Time/minute</label>

                                                                    <input style="border: 1px solid grey-light; " type="text" name="mc_time" class="form-control " value="<?= $detailprocessedit['mc_time'] ?>" id="mc_time" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_price">Cost</label>

                                                                    <input style="border: 1px solid grey-light; " value="<?= $detailprocessedit['mc_cost'] ?>" type="text" name="mc_cost" class="form-control " id="cost_machine" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_price">Unit</label>

                                                                    <input style="border: 1px solid grey-light; " value="" type="text" name="mc_unit" class="form-control " id="cost_unit" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <legend style="background-color: deepskyblue;">Subcont</legend>
                                                        <div class="form-row" id="div_1">

                                                            <div class="col-sm-4" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_nm">Subcont Name</label>

                                                                    <input style="border: 1px solid grey-light; " value="<?= $detailprocessedit['subcont_name'] ?>" type="text" name="subcont_name" class="form-control " id="subcont_name" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_nm">SubProcess Name</label>

                                                                    <input style="border: 1px solid grey-light; " value="<?= $detailprocessedit['subcont_process'] ?>" type="text" name="subcont_process" class="form-control " id="subcont_process" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" id="div_2">
                                                                <div class="form-group " id="div_3">
                                                                    <label id="subProcess_price">Unit Price</label>

                                                                    <input style="border: 1px solid grey-light; " value="<?= $detailprocessedit['jasa_cost'] ?>" type="text" name="jasa_cost" class="form-control " id="jasa_cost" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="card-footer ">
                                                    <button style="float:right;width:100px;" type="submit" value="Update" class="btn  btn-success btn-sm">Update</button>
                                                </div>


                                            </form>
                                        </div>



                                        <!--- process end --->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
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
    echo $x;
    echo $y;
    echo $x; ?>

    function changeValue(id) {
        document.getElementById('cost_unit').value = cost_unit[id].cost_unit;
        document.getElementById('cost_machine').value = cost_machine[id].cost_machine;
        document.getElementById('id_machine').value = id_machine[id].id_machine;
    };
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type='text/javascript'>
    $(window).load(function() {
        $("#id_process").change(function() {
            console.log($("#id_process option:selected").val());
            if ($("#id_process option:selected").val() == '28') {

                $('#jasa_cost').prop('disabled', false);

            } else {

                $('#jasa_cost').prop('disabled', true);

            }
        });
    });
</script>