<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');
$uri5 = $this->uri->segment('5');


$tot_tools_amount = $tools_amount;
$tot_rm_amount = $rm_amount;
$tot_process_amount = $process_amount;

?>

<div class="col-10">




    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">




            <!-- === detail other start == -->
            <div class="card card-secondary">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Packing & Transportasi</h6>
                </div>
                <form action="<?php echo site_url('engineering/estimationcost/update_inq_detail_cost') ?>" method="post" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-row">


                            <!-- <div class="form-group col-md-12">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="" id="esti_update_dt" placeholder="Date" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" style="text-align:right;">Inquiry No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="id_inquiry" id="id_inquiry" value="<?= $uri4 ?>" readonly>
                                    </div>
                                </div> -->


                            <!-- <label for="inputPassword3" class="col-sm-5 col-form-label" style="text-align:right;">tools Cost</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-sm" name="cost_tool" id="cost_tools" value="<?= $tot_tools_amount ?>" readonly>
                                    </div> -->
                            <input type="hidden" name="update_by" id="update_by" value="<?php echo $user ?>">
                            <input type="hidden" name="today" id="today" value="<?php echo $today ?>">
                            <input type="hidden" name="id_inquiry_detail" id="id_inquiry_detail" value="<?= $uri5 ?>">
                            <input type="hidden" name="status" id="status" value="">


                            <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" style="text-align:right;">Description</label>
                                    <div class="col-sm-8">
                                        <textarea style="border: 1px solid grey-light; " value="" type="text" name="note" class="form-control form-control-sm" id="note" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group col-md-4">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Material Cost</label>
                                    <div class="col-sm-6">
                                        <input style="border: 1px solid grey" value="<?= $tot_rm_amount; ?>" type="text" name="cost_mtl" class="form-control form-control-sm" id="cost_materials" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-5 col-form-label" name="" style="text-align:right;">Process Cost</label>
                                    <div class="col-sm-6">
                                        <input style="border: 1px solid grey-light; " value="<?= $tot_process_amount; ?>" type="text" name="cost_process" class="form-control form-control-sm" id="cost_process" placeholder="" readonly>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-5 col-form-label" name="" style="text-align:right;">Transportasi Cost</label>
                                    <div class="col-sm-6">
                                        <input style="border: 1px solid grey-light; " value="" type="text" name="cost_del" class="form-control form-control-sm" id="cost_transportation" placeholder="">

                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group col-md-4"> -->
                            <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label" style="text-align:right;">Packing cost</label>
                                    <div class="col-sm-6">
                                        <input style="border: 1px solid grey-light; " value="" type="text" name="cost_pack" class="form-control form-control-sm" id="cost_packing" placeholder="">
                                    </div>
                                </div> -->


                            <!-- </div> -->


                        </div>
                        <table border="0" class="table table-sm ">
                            <tr>
                                <td>Tanggal </td>
                                <td width="50%">
                                    <input style="border: 1px solid grey-light; " readonly type="text" class="form-control form-control-sm" name="" id="esti_update_dt" placeholder="Date" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                </td>

                            </tr>
                            <tr>
                                <td>Inquiry Number </td>
                                <td style="width: 50px;;">
                                    <input type="text" class="form-control form-control-sm" name="id_inquiry" id="id_inquiry" value="<?= $uri4 ?>" readonly>
                                </td>

                            </tr>
                            <tr>
                                <td>Material Cost </td>
                                <td style="width: 50px;;"><input type="text" class="form-control form-control-sm" value="<?= $tot_rm_amount; ?>"></td>

                            </tr>
                            <tr>
                                <td>Process Cost</td>
                                <td><input type="text" class="form-control form-control-sm" value="<?= $tot_process_amount; ?>"></td>

                            </tr>
                            <tr>
                                <td>Tools Cost</td>
                                <td><input type="text" class="form-control form-control-sm" value="<?= $tot_tools_amount; ?>"></td>

                            </tr>
                            <tr>
                                <td>Transportation Cost</td>
                                <td><input type="text" class="form-control form-control-sm" value=""></td>

                            </tr>
                            <tr>
                                <td>Packing Cost</td>
                                <td><input type="text" class="form-control form-control-sm" value=""></td>

                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><textarea type="text" class="form-control form-control-sm" value=""></textarea>

                            </tr>
                        </table>
                    </div>

                    <div class="card-footer ">

                        <button style="float:right;width:100px;" type="submit" value="" class="btn  btn-secondary btn-sm"> Update</button>
                    </div>
                </form>

            </div>


            <!--- process end --->






            <!-- /.card -->
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
    echo $a;
    echo $b;
    echo $c; ?>

    function changeValue(id) {
        document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('part_nm').value = part_nm[id].part_nm;
        document.getElementById('id_barang').value = id_barang[id].id_barang;
    };
</script>