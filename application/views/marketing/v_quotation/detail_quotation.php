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
                    <h1 class="m-0 text-dark">Quotation Detail
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

                    <div class="card card-success card-outline">
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


                            <div class="callout callout-success" style="background-color:#D7FCE9 ;">
                                <h6 style="margin-left: 5px;"><u>Inquiry Detail</u>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/quotation') ?>" style="text-decoration:none;color:white;float:right">X</a>
                                </h6>
                                <table class="table table-sm" style="margin:1px; font-size:12px; " width="100%" border="0">
                                    <?php
                                    if (isset($detailinquiry)) {
                                        foreach ($detailinquiry as $row) {

                                            if ($row->information_by == 'Telp') {
                                                $label = 'Telp No.';
                                                $label2 = 'Contact Name';
                                                $value = $row->no_telp;
                                                $value2 = $row->nm_contact;
                                            } else if ($row->information_by == 'Email') {
                                                $label = 'Email';
                                                $label2 = 'From';
                                                $value = $row->email;
                                                $value2 = $row->email_from;
                                            } else {
                                                $label = 'Reference';
                                                $label2 = '';
                                                $value = $row->nm_reff;
                                                $value2 = '';
                                            }

                                    ?>


                                            <tr>
                                                <td width="10%"><b>Inquiry No</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?php echo $row->id_inquiry ?></td>
                                                <td width="10%"><b>Customer code</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->customer_cd2 ?></td>
                                                <td width="10%"><b><?= $label ?></b></td>
                                                <td width="3%">:</td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created date</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_dt ?></td>
                                                <td width="10%"><b>Customer desc</b></td>
                                                <td>:</td>
                                                <td><?= $row->customer_nm ?></td>
                                                <td width="10%"><b><?= $label2 ?></b></td>
                                                <td>:</td>
                                                <td><?= $value2 ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created by</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_by ?></td>
                                                <td width="10%"><b>Information by</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->information_by ?></td>
                                                <td width="10%"><b>Prod type</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->type_prod ?></td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </table>
                            </div>
                            <div class="callout callout-default" style="background-color:none ;">
                                <div class="table-responsive">

                                    <table class="table table-sm table-bordered " id="table" border=" 0" style="padding:1px">
                                        <thead>
                                            <tr>
                                                <!-- <TH><input type="checkbox" id="check-all"> </TH> -->
                                                <th style="text-align: center;">No</th>
                                                <th>Select Print</th>
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
                                                <th>Profit-%</th>
                                                <th>Trans-%</th>
                                                <th>Profit</th>
                                                <th>transport</th>
                                                <th>Quot Prize</th>
                                                <th>Qty</th>
                                                <th>Tot.Quot.Price</th>
                                                <!-- <th width="8%" style="text-align: center;">Action</th> -->

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="18" align="right">
                                                    <label style="vertical-align: center;">Grand Total</label>
                                                </td>
                                                <!-- <td align="right" width="9%">
                                                        <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($total_amount, 0, ',', '.'); ?> " disabled>
                                                        <!<span id="" class=" text-success"><?= $amountmtl ?></span> -->
                                                <!-- </td> --
                                                    <td></td>
                                                    <td></td>
                                                    <td></td> -->
                                                <td align="right" width="9%">
                                                    <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($tot_quot_price, 0, ',', '.'); ?> " disabled>
                                                    <!-- <td align="center"><a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-check-double"></i> Finish</a></td> -->



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
                                                    <td align="center">
                                                        <?= $row->quo_print_flex == '1' ?
                                                            "<a href=" . base_url('marketing/quotation/quo_print_no/' . $row->id_inquiry_detail . '/' . $row->id_inquiry . '') . " style='float: center;'><i class='fa fa-check-circle' aria-hidden='true'></i></a>" :
                                                            "<a href=" . base_url('marketing/quotation/quo_print_yes/' . $row->id_inquiry_detail . '/' . $row->id_inquiry . '') . "  style='float: center;color:red'><i class='fas fa-times-circle'></i></a>"; ?>

                                                    </td>
                                                    <!-- <td style="text-align:center;width:5%">
                                                    
                                                </td> -->
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
                                                    $hpp = ($row->cost_tool + $row->cost_mtl + $row->cost_process);
                                                    /*$profit = ($hpp * 40/100);
                                                        $trnsp = ($profit * 4/100);
                                                        $quot_price = ($hpp + $profit + $trnsp);*/
                                                    $quot_price_tot = ($row->quot_price) * $row->inq_qty;


                                                    ?>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format($hpp, 0, ',', '.'); ?></td>
                                                    <td style="text-align:center;width:5%;background-color:mistyrose">
                                                        <?php echo "
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->profit_percent</span> 
                                                    <input type='text' class='field-profit_percent form-control form-control-sm editor' value='$row->profit_percent' data-id='$row->id_inquiry_detail' />
                                                " ?>
                                                    </td>
                                                    <td style="text-align:center;width:5%;background-color:mistyrose">
                                                        <?php echo "
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->transport_percent</span> 
                                                    <input type='text' class='field-transport_percent form-control form-control-sm editor' value='$row->transport_percent' data-id='$row->id_inquiry_detail' />
                                                " ?>
                                                    </td>
                                                    <!-- <td align="right"> <?php echo $row->profit_percent; ?></td> -->
                                                    <td align="right"> <?php echo number_format($row->profit, 0, ',', '.'); ?></td>
                                                    <td align="right"><?php echo number_format($row->transport, 0, ',', '.'); ?></td>
                                                    <td align="right" style="padding-right: 17px;"><?php echo number_format($row->quot_price, 0, ',', '.'); ?></td>
                                                    <td><?= $row->inq_qty ?></td>
                                                    <td align="right" style="padding-right: 17px;"><?php echo number_format($quot_price_tot, 0, ',', '.'); ?></td>
                                                    <!-- <td></td> -->
                                                    <!-- <td align="center"><a href="<?= base_url('engineering/estimationcost/jo_materials_estimation/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '') ?>" class='btn btn-secondary btn-sm' style="width:70px;"><i class='fa fa-calculator' aria-hidden='true'></i> Calc.
                                                        </a></td> -->

                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>


                                </div>

                                <table class="table table-sm" style="margin:1px; font-size:12px; " width="100%" border="0">
                                    <?php if ($dataquoedit['inquiry_status'] > 0) { ?>
                                        <form action="<?= base_url('marketing/quotation/updatequotation') ?>" method="POST">
                                        <?php } else { ?>
                                            <form action="<?= base_url('marketing/quotation/createquotation') ?>" method="POST">
                                            <?php } ?>
                                            <!-- <tr>
                                                <td colspan="9">
                                                    <h6><u>Input Quotation Detail </u>
                                                        <h6>
                                                </td>

                                            </tr> -->
                                            <tr>
                                                <td><b>Quotation Number</b></td>
                                                <td>:</td>
                                                <td>
                                                    <input name="quo_no" type="text" style="background-color:yellow" class="form-control form-control-sm" value="<?= $dataquoedit['quotation_no']; ?>" />
                                                    <input name="id_inquiry" type="hidden" style="background-color:yellow" class="form-control form-control-sm" value="<?= $dataquoedit['id_inquiry']; ?>" />
                                                </td>
                                                <td>Attention</td>
                                                <td>:</td>
                                                <td><input name="attention" type="text" class="form-control form-control-sm" value="<?= $dataquoedit['attention']; ?>" /></td>
                                                <td>Payment Term</td>
                                                <td>:</td>
                                                <td><input name="payment_term" type="text" class="form-control form-control-sm" value="<?= $dataquoedit['payment_term']; ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td>To</td>
                                                <td>:</td>
                                                <td><input type="text" name="customer_contact" value="<?= $dataquoedit['customer_contact']; ?>" class="form-control form-control-sm"></td>
                                                <td>Job</td>
                                                <td>:</td>
                                                <td><input type="text" name="job" value="<?= $dataquoedit['job']; ?>" class="form-control form-control-sm"></td>
                                                <td>Working Shedule</td>
                                                <td>:</td>
                                                <td><input type="text" name="working_schedule" value="<?= $dataquoedit['working_schedule']; ?>" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>Subject</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" name="subject" value="<?= $dataquoedit['subject']; ?>" class="form-control form-control-sm">
                                                </td>
                                                <td>Validity Price</td>
                                                <td>:</td>
                                                <td><select name="validity_price" value="<?= $dataquoedit['validity_price']; ?>" class="form-control form-control-sm">
                                                        <option value="">-- Select-- </option>
                                                        <option value="10%" <?= $dataquoedit['validity_price'] == '10%' ? 'Selected' : '' ?>>Tax 10%</option>
                                                        <option value="0%" <?= $dataquoedit['validity_price'] == '0%' ? 'Selected' : '' ?>>0</option>
                                                    </select>
                                                </td>
                                                <!-- <td><input type="text" name="validity_price" value="<?= $dataquoedit['validity_price']; ?>" class="form-control form-control-sm"></td> -->
                                                <td rowspan="2">Remark</td>
                                                <td rowspan="2">:</td>
                                                <td rowspan="2"><textarea name="q_note" class="form-control form-control-sm"><?= $dataquoedit['q_note']; ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Customer reff</td>
                                                <td>:</td>
                                                <td><input type="text" name="cust_reff" value="<?= $dataquoedit['cust_reff']; ?>" class="form-control form-control-sm"></td>
                                                <td>Excluded</td>
                                                <td>:</td>
                                                <td><input type="text" name="excluded" value="<?= $dataquoedit['excluded']; ?>" class="form-control form-control-sm"></td>


                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php if ($dataquoedit['q_approved_sts'] == '1') { ?>

                                                        <span class="badge badge-success" style="font-size: 12px;text-align:bottom"><i class="fas fa-check" aria-hidden="true"></i> Quotation Approved</span><br />
                                                        Approved by : <?= $dataquoedit['q_approved_by'] ?><br />
                                                        Date : <?= $dataquoedit['q_approved_at'] ?>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger" style="font-size: 12px;"> Quotation Not Approved</span>

                                                    <?php }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td colspan="3">
                                                    <?php if ($dataquoedit['inquiry_status'] > 0) { ?>
                                                        <?php if ($dataquoedit['q_print_sts'] == 1) { ?>
                                                            <a onclick="ApproveConfirm(' <?= base_url('marketing/quotation/approvequotation/' . $dataquoedit['id_inquiry'] . '/' . $dataquoedit['quotation_no'] . '') ?>')" target='_blank' href="#!" data-toggle='modal' data-target="#modal-approve " class="btn btn-info btn-sm" style="text-decoration: none;color:white"><i class="fas fa-signature    "></i> Approve</a>
                                                            <a href="<?= base_url('marketing/quotation/print_quotation/' . $dataquoedit['id_inquiry'] . '') ?>" class="btn btn-info btn-sm" style="text-decoration: none;color:white"><i class="fas fa-print" aria-hidden="true"></i> Reprint</a>
                                                        <?php } else { ?>
                                                            <a onclick="ApproveConfirm(' <?= base_url('marketing/quotation/approvequotation/' . $dataquoedit['id_inquiry'] . '/' . $dataquoedit['quotation_no'] . '') ?>')" target='_blank' href="#!" data-toggle='modal' data-target="#modal-approve " class="btn btn-info btn-sm" style="text-decoration: none;color:white"><i class="fas fa-signature    "></i> Approve</a>
                                                            <!-- <a onclick="printConfirm(' <?= base_url('marketing/quotation/update_qPrintSts/' . $dataquoedit['id_inquiry'] . '') ?>')" target='_blank' href="#!" data-toggle='modal' data-target="#modal-print " class="btn btn-info btn-sm" style="text-decoration: none;color:white"><i class="fas fa-print" aria-hidden="true"></i> Print</a> -->
                                                            <a href="<?= base_url('marketing/quotation/print_quotation/' . $dataquoedit['id_inquiry'] . '') ?>" class="btn btn-info btn-sm" style="text-decoration: none;color:white"><i class="fas fa-print" aria-hidden="true"></i> Print</a>
                                                            <!-- <button onclick="return confirm('Quotation will be approved continue?')" style="float: right;margin-left:2px;margin-right:2px;" type="submit" class="btn btn-sm btn-success">Update</button> -->
                                                        <?php } ?>
                                                        <a onclick="cancelConfirm(' <?= base_url('marketing/quotation/cancel_quotation/' . $dataquoedit['id_inquiry'] . '') ?>')" href="#!" data-toggle='modal' data-target="#cancelModalQuo " class="btn btn-warning btn-sm" style="float: right;text-decoration:none;color:white">Cancel</a>
                                                        <button onclick="return confirm('Update will be executed continue?')" style="float: right;margin-left:2px;margin-right:2px;" type="submit" class="btn btn-sm btn-success">Update</button>
                                                        <button style="float: right" type="submit" class="btn btn-sm btn-success" disabled>Create</button>
                                                        <!-- <a onclick="createConfirm('')" type="submit" href="#!" data-toggle='modal' data-target="#createModalQuo " class="btn btn-success btn-sm" style="float: right;">Create</a> -->
                                                    <?php } else { ?>
                                                        <!-- <button disabled onclick="printConfirm(' <?= base_url('marketing/quotation/update_qPrintSts/' . $dataquoedit['id_inquiry'] . '') ?>')" target='_blank' href="#!" data-toggle='modal' data-target="#modal-print " class="btn btn-info btn-sm"><i class="fas fa-print" aria-hidden="true"></i> Print</button> -->
                                                        <button disabled style="float: right" type="button" class="btn btn-sm btn-success">Cancel</button>
                                                        <button disabled onclick="return confirm('Update will be executed continue?')" style="float: right;margin-left:2px;margin-right:2px;" type="submit" class="btn btn-sm btn-success">Update</button>
                                                        <button onclick="return confirm('New quotation number will be created, continue?')" style="float: right" type="submit" class="btn btn-sm btn-success">Create Quotation</button>
                                                    <?php   } ?>
                                                </td>

                                            </tr>
                                            </form>


                                </table>


                            </div>


                        </div>
                    </div>
                </div>
    </section>
</div>



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
            <div class="modal-body">Quotation will be cancelled, continue ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a id="btn-cancel" class="btn btn-danger" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- create Confirmation-->
<div class="modal fade" id="createModalQuo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">New quotation number will be created, continue ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a id="btn-cancel" class="btn btn-danger" href="#">Yes</a>
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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a id="btn-print" class="btn btn-info" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>


<!--new inquiry modal-->
<div class="modal fade" id="modal-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve Quotation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <div class="card card-success card-outline">
                    <!-- <div class="card-header py-3"> -->
                    <!-- <h6 class="m-0 font-weight-bold " style="padding:0px"> Quotation Information</h6> -->
                    <!-- <h6 class="m-0 font-weight-bold " style="padding:0px">Quotation no. <?= $quotation_no ?></h6> -->
                    <!-- </div> -->
                    <form action="<?= base_url('marketing/quotation/approvequotation') ?>" method="post">
                        <div class="card-body">


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label" style="text-align:right;">Approve By</label>
                                        <div class="col-sm-6">
                                            <input name="q_approved_by" id="" type="text" value="<?= $dataquoedit['q_approved_by'] ?>" class="form-control form-control-sm">
                                            <input name="inqNo" id="" type="hidden" value="<?= $dataquoedit['id_inquiry'] ?>" class="form-control form-control-sm">
                                            <input name="quoNo" id="" type="hidden" value="<?= $dataquoedit['quotation_no'] ?>" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">

                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label" style="text-align:right;">Phone Number</label>
                                        <div class="col-sm-6">
                                            <input name="q_approved_phone" id="" value="<?= $dataquoedit['q_approved_phone'] ?>" type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--start modal input -->

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

    function approveConfirm(url) {
        $('#btn-approve').attr('href', url);
        $('#approveModal').modal();
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