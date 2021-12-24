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
$tot_rm_amount = $mtl_amount;
$tot_process_amount = $processamount;

?>


<div class="col-12">




    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">




            <!-- === detail other start == -->
            <!-- <div class="card card-success"> -->
            <!-- <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Packing & Transportasi</h6>
                </div> -->
            <div class="card-body">
                <form action="<?php echo site_url('engineering/estimationcost/update_inq_detail_cost') ?>" method="post" class="form-horizontal">
                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="inq_dtl_update_dt" id="inq_dtl_update_dt" placeholder="Date" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Inquiry No.</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" name="id_inquiry" id="id_inquiry" value="<?= $uri4 ?>" readonly>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">tools Cost</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" name="" id="" value="<?= number_format($tot_tools_amount, 0, ',', '.') ?>" readonly>
                                    <input type="hidden" class="form-control form-control-sm" name="cost_tool" id="cost_tools" value="<?= $tot_tools_amount ?>">
                                    <!-- <input type="text" class="form-control form-control-sm" name="cost_tool" id="cost_tools" value="<?= $detailothetedit['cost_tool'] ?>" readonly> -->
                                </div>
                                <input type="hidden" class="form-control" name="update_by" id="update_by" value="<?php echo $user ?>">
                                <input type="hidden" class="form-control" name="today" id="today" value="<?php echo $today ?>">
                                <input type="hidden" class="form-control" name="id_inquiry_detail" id="id_inquiry_detail" value="<?= $uri5 ?>">
                                <input type="hidden" class="form-control" name="cost_pack" id="cost_pack" value="0">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Material Cost</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " value="<?= number_format($tot_rm_amount, 0, ',', '.') ?>" type="text" name="" class="form-control form-control-sm" id="cost_mtl" placeholder="" readonly>
                                    <input style="border: 1px solid grey-light; " value="<?= $tot_rm_amount ?>" type="hidden" name="cost_mtl" class="form-control form-control-sm" id="cost_mtl" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Process Cost</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " value="<?= number_format($tot_process_amount, 0, ',', '.') ?>" type="text" name="" class="form-control form-control-sm" id="cost_process" placeholder="" readonly>
                                    <input style="border: 1px solid grey-light; " value="<?= $tot_process_amount ?>" type="hidden" name="cost_process" class="form-control form-control-sm" id="cost_process" placeholder="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Transportation Cost</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " value="<?= $detailothetedit['cost_del'] ?>" type="text" name="cost_del" class="form-control form-control-sm" id="cost_del" placeholder="">

                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Over Head</label>
                                <div class="col-sm-5">
                                    <input style="border: 1px solid grey-light; " value="<?= $detailothetedit['cost_overhead'] ?>" type="text" name="cost_overhead" class="form-control form-control-sm" id="cost_pack" placeholder="">
                                </div>
                                <div lass="col-sm-1">%</div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Description</label>
                                <div class="col-sm-6">
                                    <textarea style="border: 1px solid grey-light; " value="" type="text" name="note" class="form-control form-control-sm" id="note" placeholder=""><?= $detailothetedit['inq_dtl_note'] ?></textarea>
                                </div>
                            </div>

                        </div>


                    </div>


                    <div class="card-footer ">
                        <!-- <button style="float:right;width:100px;" type="submit" value="" class="btn  btn-secondary btn-sm"> Update</button> -->
                        <?php foreach ($detailinquiry as $row) {
                            if ($row->eng_approve == 1) { ?>
                                Last update <?= $detailothetedit['inq_dtl_update_dt'] ?> - <?= $detailothetedit['inq_dtl_update_by'] ?> <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm" disabled> Update</button>
                            <?php } else { ?>
                                Last update <?= $detailothetedit['inq_dtl_update_dt'] ?> - <?= $detailothetedit['inq_dtl_update_by'] ?> <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Update</button>
                        <?php }
                        } ?>
                    </div>
                </form>

            </div>


            <!--- process end --->






            <!-- /.card -->
            <!-- </div> -->
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