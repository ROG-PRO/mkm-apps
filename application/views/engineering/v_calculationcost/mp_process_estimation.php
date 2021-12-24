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

$tot_tools_amount = $tools_amount;
$tot_rm_amount = $rm_amount;
$tot_process_amount = $process_amount;

?>

<div class="col-10">




    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">




            <!-- === detail process start == -->
            <div class="card card-secondary">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Process</h6>
                </div>
                <form action="<?php echo site_url('engineering/estimationcost/mp_tambah_process') ?>" method="post" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Tanggal</label>
                                    <div class="col-sm-6">
                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="created_dt" id="created_dt" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                        <input type="hidden" name="id_inquiry_detail" value="<?= $uri5 ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="inputPassword3" class="col-sm-5 col-form-label" style="text-align:right;">Process Name</label>
                                    <div class="col-sm-6">
                                        <select name="id_process" id="id_process " class="form-control form-control-sm nm_process" required>
                                            <option value="">- Pilih process -</option>

                                            <?php
                                            foreach ($process as $row) {
                                                echo "<option value='" . $row->id_process . "'>" . $row->process_nm . "</option>";
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
                                        <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-5 col-form-label" name="" style="text-align:right;">Machine Type</label>
                                    <div class="col-sm-7">
                                        <select name="id_machine" id="type_machine" class="form-control" onchange='changeValue(this.value)' required>
                                            <option value="">- Pilih Machine type -</option>

                                            <?php

                                            $con = mysqli_connect("localhost", "root", "mySQL", "mkm_test");
                                            $query = "SELECT *  from machine ";
                                            $result = mysqli_query($con, $query);

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

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Cost</label>
                                    <div class="col-sm-4">
                                        <input style="border: 1px solid grey-light; " value="" type="text" name="mc_cost" class="form-control form-control-sm" id="cost_machine" placeholder="">
                                        <!-- <input style="border: 1px solid grey-light; " value="" type="text" name="" class="form-control form-control-sm" id="cost_unit" placeholder=""> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <input style="border: 1px solid grey-light; " value="" type="text" name="mc_cost" class="form-control form-control-sm" id="cost_machine" placeholder=""> -->
                                        <input style="border: 1px solid grey-light; " value="" type="text" name="" class="form-control form-control-sm" id="cost_unit" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Time</label>
                                    <div class="col-sm-5">
                                        <input style="border: 1px solid grey-light; " value="" type="text" name="mc_time" class="form-control form-control-sm" id="mc_time" placeholder="">
                                    </div>
                                    <small>Minute</small>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer ">

                        <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Save</button>
                    </div>
                </form>
            </div>


            <div class="table-responsive">

                <table class="table table-sm table-bordered " id="table" border=" 0">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Process</th>
                            <th>Mesin Type</th>
                            <th>Time (Minute)</th>
                            <th>Cost M/C (hour)</th>
                            <th>Tot Amount</th>
                            <th>Action</th>

                        </tr>
                    </thead>



                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($detailprocess as $row) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>

                                <td><?= $row->process_nm; ?></td>
                                <td><?= $row->type_machine; ?></td>
                                <td><?= $row->mc_time; ?></td>
                                <td><?= number_format($row->cost_machine, 0, ',', '.'); ?></td>
                                <td width="120" align="right"><?= number_format($row->tot_amount, 0, ',', '.'); ?></td>

                                <td width="60" align="center">
                                    <a href="<?= base_url('engineering/estimationcost/mp_process_estimation_edit/' . $row->id_process_detail . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6) ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/mp_delete_process/' . $row->id_process_detail . '/' . $row->id_inquiry) ?>')" href="#!" class=""><i class="fas fa-trash" style="color:red"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="5" align="right">
                                <label>Grand Total</label>
                            </td>
                            <td align="right">
                                <?= number_format($tot_process_amount, 0, ',', '.') ?>
                                <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                            </td>
                            <td></td>

                        </tr>
                    </tfoot>
                </table>

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
    echo $x;
    echo $y;
    echo $x; ?>

    function changeValue(id) {
        document.getElementById('cost_unit').value = cost_unit[id].cost_unit;
        document.getElementById('cost_machine').value = cost_machine[id].cost_machine;
        document.getElementById('id_machine').value = id_machine[id].id_machine;
    };
</script>