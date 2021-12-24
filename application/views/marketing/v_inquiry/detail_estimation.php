<style type="text/css">
    td {
        cursor: pointer;
    }

    .editor {
        display: none;
    }
</style>
<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');

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
                    <h1 class="m-0 text-dark">Estimation Result
                </div><!-- /.col -->
                <div class="container col-sm-6">
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

                    <div class="card card-success card-outline ">
                        <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>

                        </div>-->
                        <div class="card-body">

                            <!--  <div class="row">
                                <div class="col-12">
                                    <h4>Detail Calculation </h4>
                                </div>
                            </div> -->

                            <style>
                                td {
                                    padding: 5px;

                                }
                            </style>
                            <A href="<?= base_url('marketing/inquiry/inquiry_detail_edit/' . $uri4 . '') ?>" class="btn btn-success btn-sm"> Lihat Inquiry </A>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/inquiry') ?>" style="float:right"> X</a>
                            <br />
                            <hr>

                            <div class="position-relative p-3 " style="height: 120px;background-color:#D7FCE9">
                                <?php
                                if (isset($detailinquiry)) {
                                    foreach ($detailinquiry as $r) { ?>
                                        <?php if ($r->inquiry_status2 == 1) { ?>
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-primary">
                                                    Continue
                                                </div>
                                            </div>
                                        <?php } else if ($r->inquiry_status2 == 0) { ?>
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-warning">
                                                    Cancel
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="">

                                                </div>
                                            </div>
                                        <?php  }
                                        ?>


                                        <table class="table table-sm table-responsive" style="margin:1px; font-size:12px; " width="80%" border="0">
                                            <?php

                                            if ($r->information_by == 'Telp') {
                                                $label = 'Telp No.';
                                                $label2 = 'Contact Name';
                                                $value = $r->no_telp;
                                                $value2 = $r->nm_contact;
                                            } else if ($r->information_by == 'Email') {
                                                $label = 'Email';
                                                $label2 = 'From';
                                                $value = $r->email;
                                                $value2 = $r->email_from;
                                            } else {
                                                $label = 'Reference';
                                                $label2 = '';
                                                $value = $r->nm_reff;
                                                $value2 = '';
                                            }

                                            ?>

                                            <tr>
                                                <td width="10%"><b>Inquiry No</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?php echo $uri4 ?></td>
                                                <td width="10%"><b>Customer code</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $r->customer_cd2 ?></td>
                                                <td width="10%"><b><?= $label ?></b></td>
                                                <td width="3%">:</td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created date</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $r->inquiry_created_dt ?></td>
                                                <td width="10%"><b>Customer desc</b></td>
                                                <td>:</td>
                                                <td><?= $r->customer_nm ?></td>
                                                <td width="10%"><b><?= $label2 ?></b></td>
                                                <td>:</td>
                                                <td><?= $value2 ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created by</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $r->inquiry_created_by ?></td>
                                                <td width="10%"><b>Information by</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $r->information_by ?></td>
                                                <td width="10%"><b>Prod type</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $r->type_prod ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php }
                                        ?>

                                        </table>

                            </div>


                            <!-- <div class="callout callout-success " style="background-color:#D7FCE9 ;">


                            </div> -->





                            <br />




                            <div class="table-responsive">
                                <br />

                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                    <thead>
                                        <tr>
                                            <!-- <TH><input type="checkbox" id="check-all"> </TH> -->
                                            <th style="text-align: center;">No</th>

                                            <th>Part No</th>
                                            <th>Part name</th>
                                            <th>Unit</th>
                                            <th>Tools Cost</th>
                                            <th>Matl Cost</th>
                                            <th>Process Cost</th>
                                            <th>Trans Cost</th>
                                            <th>OH-%</th>
                                            <th>OH Price</th>
                                            <th>HPP Total</th>



                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td colspan="10" align="right">
                                                <label style="vertical-align: center;">Grand Total</label>
                                            </td>

                                            <td align="right" width="9%">
                                                <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($total_amount, 0, ',', '.'); ?> " disabled>
                                                <!-- <td align="center"><a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-check-double"></i> Finish</a></td> -->

                                            </td>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($detailpartinquiry as $row) :
                                        ?>
                                            <tr>
                                                <!-- <td><input type='checkbox' class='check-item' name='id_inquiry[]' value='<?= $row->id_inquiry ?>'></td> -->
                                                <td align="center"><?= $no++ ?></td>
                                                <!-- <td align="center"><?= $row->quo_print_flex ?></td> -->

                                                <td><?= $row->inq_part_no ?></td>
                                                <!-- <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank' ><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td> -->
                                                <td><?= $row->inq_part_nm ?></td>
                                                <td><?= $row->inq_nm_unit ?></td>
                                                <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td>
                                                <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td>
                                                <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td>
                                                <td align="right"><?= number_format($row->cost_del, 0, ',', '.'); ?></td>
                                                <td align="right"><?= number_format($row->cost_overhead); ?></td>
                                                <?php
                                                $overhead_price = (($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del) * $row->cost_overhead / 100);
                                                ?>
                                                <td align="right"><?= number_format($overhead_price); ?></td>

                                                <?php
                                                $hpp = ($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del + $overhead_price);


                                                ?>
                                                <td align="right" style="padding-right: 17px;"><?= number_format($hpp, 0, ',', '.'); ?></td>


                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>





                            <hr>
                            <form action="<?= base_url('marketing/inquiry/update_sts_inquiry') ?>" method="post">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="">Inquiry Status</label>
                                        <select name="inquiry_status" class="form-control">
                                            <option value="" disabled>--select status ---</option>
                                            <option value="3" <?php echo $r->inquiry_status2 == '3' ? 'selected' : '' ?>>None</option>
                                            <option value="0" <?php echo $r->inquiry_status2 == '0' ? 'selected' : '' ?>>Cancel</option>
                                            <option value="1" <?php echo $r->inquiry_status2 == '1' ? 'selected' : '' ?>>Continue</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label class="">Inquiry Note : </label>
                                        <textarea class="form-control" type="text" name="inquiry_note"><?= $r->inquiry_note ?></textarea>
                                        <input class="form-control" name="id_inquiry" type="hidden" value='<?= $uri4 ?>'>
                                        <button onclick="return confirm('Update status Inquiry ?')" class="btn btn-success btn-sm" style="margin-top:10px;float:right" type="submit">Update inquiry Status</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
    </section>
</div>

<!--new inquiry modal-->
<div class="modal fade" id="modal-quo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Quotation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <div class="card card-success card-outline">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold " style="padding:0px"> Quotation Information</h6>
                        <!-- <h6 class="m-0 font-weight-bold " style="padding:0px">Quotation no. <?= $quotation_no ?></h6> -->
                    </div>
                    <div class="card-body">

                        <form id="formtambahdata<?= $title ?>" action="<?= base_url('marketing/quotation/createquotation/' . $uri4 . '') ?>" method="post">
                            <?php
                            if (isset($detailinquiry)) {
                                foreach ($detailinquiry as $row) { ?>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Inquery CD</label>
                                                <div class="col-sm-6">
                                                    <input name="id_inquiry" id="id_inquiry" type="text" value="<?= $uri4 ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">To</label>
                                                <div class="col-sm-6">
                                                    <input name="customer_contact" id="customer_contact" value="<?= $row->customer_contact ?>" type="text" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Subject</label>
                                                <div class="col-sm-7">
                                                    <input name="subject" id="subject" type="text" value="<?= $row->subject ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;"> Customer ref.</label>
                                                <div class="col-sm-7">
                                                    <input name="cust_reff" id="cust_reff" type="text" value="<?= $row->cust_reff ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <input name="inquiry_created_by" id="inquiry_created_by" type="hidden" class="form-control form-control" value="<?php echo $user; ?>">


                                            <input name="inquiry_created_dt" id="inquiry_created_dt" type="hidden" class="form-control form-control" value="<?php echo $today; ?>">

                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Attention</label>
                                                <div class="col-sm-6">
                                                    <input name="attention" id="attention" type="text" value="<?= $row->attention ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Job</label>
                                                <div class="col-sm-6">
                                                    <input name="job" id="job" type="text" value="<?= $row->job ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Validity Price</label>
                                                <div class="col-sm-6">
                                                    <input name="part_no" id="part_no" type="text" value="<?= $row->validity_price ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Excluded</label>
                                                <div class="col-sm-6">
                                                    <input name="validity_price" id="validity_price" type="text" value="<?= $row->excluded ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Payment term</label>
                                                <div class="col-sm-6">
                                                    <input name="payment_term" id="payment_term" type="text" value="<?= $row->payment_term ?>" class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label" style="text-align:right;">Working schedule</label>
                                                <div class="col-sm-6">
                                                    <input name="working_schedule" id="working_schedule" value="<?= $row->working_schedule ?>" type="text" class="form-control form-control-sm">
                                                </div>
                                            </div>


                                    <?php }
                            }; ?>
                                        </div>


                                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--start modal input -->

<!-- cancel Confirmation-->
<div class="modal fade" id="cancelModalQuo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin mau cancel Quotation</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a id="btn-cancel" class="btn btn-danger" href="#">Update</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Print-->
<div class="modal fade" id="modal-print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-print" aria-hidden="true"></i> Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pastikan data yang akan dicetak sudah benar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a id="btn-print" class="btn btn-info" href="#">OK</a>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    function cancelConfirm(url) {
        $('#btn-cancel').attr('href', url);
        $('#cancelModal').modal();
    }

    function printConfirm(url) {
        $('#btn-print').attr('href', url);
        $('#printModal').modal();
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
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "post",
            cache: false,
            dataType: "json"
        })


        $(document).on("click", "td", function() {
            $(this).find("span[class~='caption']").hide();
            $(this).find("input[class~='editor']").fadeIn().focus();
        });
        $(document).on("keydown", ".editor", function(e) {
            if (e.keyCode == 13) {
                var target = $(e.target);
                var value = target.val();
                var id = target.attr("data-id");
                var data = {
                    id: id,
                    value: value
                };
                if (target.is(".field-profit_percent")) {
                    data.modul = "profit_percent";
                } else if (target.is(".field-quo_print_flex")) {
                    data.modul = "quo_print_flex";
                } else if (target.is(".field-transport_percent")) {
                    data.modul = "transport_percent";
                }


                $.ajax({
                    data: data,
                    url: "<?php echo base_url('marketing/quotation/update_inquiry_detail'); ?>",
                    success: function(a) {
                        target.hide();
                        target.siblings("span[class~='caption']").html(value).fadeIn();
                    }
                })
            }
        });
    });
</script>