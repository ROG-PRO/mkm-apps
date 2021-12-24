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

// $tot_tools_amount = $tools_amount;
// $tot_rm_amount = $rm_amount;
// $tot_process_amount = $process_amount;

?>
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
            <!-- <div class="card card-success"> -->
            <div class="card-body">
                <!-- <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Process</h6>
                    </div> -->
                <form action="<?php echo site_url('engineering/estimationcost/jo_tambah_process') ?>" method="post" class="form-horizontal">

                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label>Material</label>

                                <select name="id_barang" id="id_barang " class="form-control form-control-sm nm_process" required="">
                                    <option value="">- Pilih process -</option>

                                    <?php

                                    foreach ($mtl_process as $row) {
                                        echo "<option value='" . $row->id_barang . "'>" . $row->part_no . "</option>";
                                    }

                                    ?>


                                </select>

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label>Process Name</label>

                                <select name="id_process" id="id_process " class="form-control nm_process">
                                    <option value="">- Pilih process -</option>

                                    <?php
                                    foreach ($process as $row) {
                                        echo "<option value='" . $row->id_process . "'>" . $row->process_nm . "</option>";
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
                                <input type="hidden" name="id_inquiry_detail" value="<?= $uri5 ?>">
                                <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="hidden" name="id_inquiry" class="form-control " id="id_inquiry" placeholder="" readonly>

                            </div>
                        </div>
                        <input type="hidden" name="prod_type" value="<?= $uri6 ?>">
                        <input type="hidden" name="part_no" value="<?= $uri7 ?>">
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
                                                echo "<option value='" . $row->id_machine . "'>" . $row->type_machine . "</option>";
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

                                        $con = mysqli_connect("localhost", "root", "Mkm@3210_", "mkm_test");
                                        $query = "SELECT *  from machine ";
                                        $result = mysqli_query($con, $query);
                                        // $a          = "var part_no = new Array();\n;";
                                        $x          = "var cost_unit = new Array();\n;";
                                        $y          = "var cost_machine = new Array();\n;";
                                        $z          = "var id_machine = new Array();\n;";

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option  value="' . $row['id_machine'] . '">' . $row['type_machine'] . '</option>';
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

                                    <input style="border: 1px solid grey-light; " value="" type="text" name="mc_time" class="form-control " id="mc_time" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-2" id="div_2">
                                <div class="form-group " id="div_3">
                                    <label id="subProcess_price">Cost</label>

                                    <input style="border: 1px solid grey-light; " value="" type="text" name="mc_cost" class="form-control " id="cost_machine" placeholder="">
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

                                    <input style="border: 1px solid grey-light; " value="" type="text" name="subcont_name" class="form-control " id="subcont_name" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4" id="div_2">
                                <div class="form-group " id="div_3">
                                    <label id="subProcess_nm">SubProcess Name</label>

                                    <input style="border: 1px solid grey-light; " value="" type="text" name="subcont_process" class="form-control " id="subcont_process" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4" id="div_2">
                                <div class="form-group " id="div_3">
                                    <label id="subProcess_price">Unit Price</label>

                                    <input style="border: 1px solid grey-light; " value="" type="text" name="jasa_cost" class="form-control " id="jasa_cost" placeholder="">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="card-footer ">
                        <?php foreach ($detailinquiry as $row) {
                            if ($row->eng_approve == 1) { ?>
                                <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm" disabled> Save</button>
                            <?php } else { ?>
                                <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Save</button>
                        <?php }
                        } ?>
                    </div>


                </form>



                <div class="table-responsive">

                    <table class="table table-sm table-bordered " id="table" border=" 0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Material</th>
                                <th>Bentuk</th>
                                <th>Panjang</th>
                                <th>Lebar / Dia.</th>
                                <th>Tebal</th>
                                <th>Process</th>
                                <th>Process inhouse</th>
                                <th>Process subcont</th>
                                <th>Value</th>
                                <th>Value unit</th>
                                <th>Luas MM</th>
                                <th>Luas MM2</th>
                                <th>Cost</th>
                                <th>Cost Unit</th>
                                <th>Tot Amount</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="15" align="right">
                                    <label>Grand Total</label>
                                </td>
                                <td align="right">
                                    <!-- <?= ($processamount); ?> -->
                                    <?= number_format($processamount, 0, ',', '.') ?>
                                    <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                                </td>
                                <td></td>

                            </tr>
                        </tfoot>

                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($detailprocess as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->part_no; ?></td>
                                    <td align="center"><?php
                                                        if ($row->id_shape == 1) {
                                                            echo '<i class="far fa-square"></i>';
                                                        } else {
                                                            echo '<i class="fas fa-circle"></i>';
                                                        }   ?>

                                    </td>
                                    <td><?= $row->rm_long; ?></td>
                                    <td><?= $row->rm_width; ?></td>
                                    <td><?= $row->rm_height; ?></td>
                                    <td><?= $row->process_nm; ?></td>
                                    <td><?= $row->type_machine; ?></td>
                                    <td><?= $row->subcont_process; ?></td>
                                    <td>
                                        <?php
                                        if ($row->mc_time == 0) {
                                            echo '';
                                        } else {
                                            echo  $row->mc_time;
                                        }; ?>

                                    </td>
                                    <td>
                                        <?php
                                        $unit = $row->cost_unit;
                                        if ($unit == 'HOUR') {
                                            echo 'minute';
                                        } elseif ($unit == 'MM') {
                                            echo 'mm';
                                        } elseif ($unit == 'MM2') {
                                            echo 'mm2';
                                        } elseif ($unit == 'KG') {
                                            echo 'kg';
                                        } else {
                                            echo '';
                                        }; ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($row->cost_unit == 'MM') {

                                            echo  2 * 3.14 * ($row->rm_long / 2);
                                        } else {
                                            echo '';
                                        }  ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($row->cost_unit == 'MM2') {
                                            if ($row->id_shape == 1) {
                                                echo 3.14 * ($row->rm_long - 5) * ($row->rm_height - 16);
                                            } elseif ($row->id_shape == 0) {
                                                echo 3.14 * ($row->rm_long - 5) * ($row->rm_width - 16);
                                            }
                                        } else {
                                            echo '';
                                        } ?>

                                    </td>
                                    <td align="right"><?= number_format($row->mc_cost, 0, ',', '.') ?></td>
                                    <td><?= $row->cost_unit; ?></td>

                                    <?php
                                    $menit = $row->mc_time;
                                    $unit = $row->cost_unit;
                                    $cost_process = $row->mc_cost;
                                    $panjang = $row->rm_long;
                                    $lebar = $row->rm_width;
                                    //$tot_amount = $menit*$cost_process/60;
                                    if ($unit == 'HOUR') {
                                        $tot_amount = $menit * $cost_process / 60;
                                    } elseif ($unit == 'MM') {
                                        $mm = (2 * 3.14 * ($panjang / 2));
                                        $tot_amount = $mm * $cost_process;
                                    } elseif ($unit == 'MM2') {
                                        if ($row->id_shape == 1) {
                                            $mm2 = 3.14 * ($row->rm_long - 5) * ($row->rm_height - 16);
                                        } elseif ($row->id_shape == 0) {
                                            $mm2 = 3.14 * ($row->rm_long - 5) * ($row->rm_width - 16);
                                        }
                                        $tot_amount = $mm2 * $cost_process;
                                    } elseif ($unit == 'KG') {
                                        $tot_amount = $menit * $cost_process;
                                    } else {
                                        $tot_amount = $row->jasa_cost;
                                    }; ?>
                                    <!-- <td width="120" align="right"><?= round($tot_amount, 3); ?></td> -->
                                    <td width="120" align="right"><?= number_format($tot_amount, 0, ',', '.'); ?></td>

                                    <td width="60" align="center">
                                        <a href="<?= base_url('engineering/estimationcost/jo_process_estimation_edit/' . $row->id_process_detail . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/jo_delete_process/' . $row->id_process_detail . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>')" href="#!" class=""><i class="fas fa-trash" style="color:red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>


                </div>
            </div>
            <!-- </div> -->

            <!--- process end --->

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