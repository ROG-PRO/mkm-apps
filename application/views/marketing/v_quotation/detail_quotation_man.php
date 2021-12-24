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
                            <?php
                            foreach ($detailinquiry as $row) {
                                if ($row->inquiry_status == 0) { ?>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/quotation/CreateQuo') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                                    <!-- <a href="<?= base_url('marketing/quotation/print_quotation/' . $uri4 . '') ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</a> -->
                                    <button class='btn btn-primary btn-sm create-quotation' data-toggle='modal' data-target="#modal-quo "><i class='fas fa-edit'></i> Create
                                    </button>

                                <?php } else if ($row->inquiry_status == 1) { ?>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/quotation') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                                    <button class='btn btn-default btn-sm create-quotation' data-toggle='modal' data-target="#modal-quo " disabled><i class='fas fa-edit'></i> Create</button>
                                    <a onclick="printConfirm(' <?= base_url('marketing/quotation/update_qPrintSts/' . $uri4 . '') ?>')" target='_blank' href="#!" data-toggle='modal' data-target="#modal-print " class="btn btn-info btn-sm"><i class="fas fa-print" aria-hidden="true"></i> Print</a>

                                    <!-- <a href="<?= base_url('marketing/quotation/print_attachment/' . $uri4 . '') ?>" target='_blank' class="btn btn-info btn-sm"><i class="fas fa-print"></i> Attachment</a>  -->
                                    <a onclick="cancelConfirm(' <?= base_url('marketing/quotation/cancel_quotation/' . $uri4 . '') ?>')" href="#!" data-toggle='modal' data-target="#cancelModalQuo " class="btn btn-warning btn-sm" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i> Cancel Quotation</a>

                                    <!-- <label style="float:right;" for="">Quotation Number : <?= $row->quotation_no ?></label> -->

                                <?php } else { ?>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/quotation') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                                    <button class='btn btn-default btn-sm create-quotation' data-toggle='modal' data-target="#modal-quo " disabled><i class='fas fa-edit'></i> Create
                                    </button>
                                    <a href="<?= base_url('marketing/quotation/print_quotation/' . $uri4 . '') ?>" target='_blank' class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</a>
                                    <!-- <a onclick="cancelConfirm(' <?= base_url('marketing/quotation/cancel_quotation/' . $uri4 . '') ?>')" href="#!" data-toggle='modal' data-target="#cancelModalQuo " class="btn btn-warning btn-sm" style="float: right;" disabled><i class="fa fa-times" aria-hidden="true"></i>  Cancel Quotation</a> -->


                            <?php  }
                            }

                            ?>
                            <hr>

                            <div class="callout callout-success" style="background-color:#D7FCE9 ;">
                                <table class="table table-sm table-responsive" style="margin:1px; font-size:15px; " width="80%" border="0">
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
                                            <!--<tr>
                                                <td><b>Prod type</b></td>
                                                <td width="3%" >:</td>
                                                <td>
                                                    <form action="<?= base_url('engineering/estimationcost/update_typeprod') ?>" method="post">
                                                        <select name="type_prod" style="height:28px;width:140px;" class="">
                                                            <option value="" selected disabled>Please select</option>
                                                            <option value="MP" <?php if ($row->type_prod == "MP") {
                                                                                    echo 'selected';
                                                                                } ?>>Mass Pro</option>
                                                            <option value="JO" <?php if ($row->type_prod == "JO") {
                                                                                    echo 'selected';
                                                                                } ?>>Job Order</option>
                                                            <option value="FAB" <?php if ($row->type_prod == "FAB") {
                                                                                    echo 'selected';
                                                                                } ?>>Fabrication</option>
                                                        </select>
                                                        <button class="" style="height: 27px;border: 1px solid #6D6D6D; " type="submit">Update</button>
                                                        <input type="hidden" name="id_inquiry" value="<?= $row->id_inquiry ?>"></td>
                                                    </form>
                                                </tr> -->
                                            <tr>
                                                <td width="10%"><b>Inquiry No</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?php echo $uri4 ?></td>
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
                                    } ?>

                                </table>


                            </div>



                            <?php if ($row->type_prod == 'MP') {

                            ?>


                                <div class="table-responsive">

                                    <table class="table table-sm table-bordered " id="table" border=" 0">
                                        <thead>
                                            <tr>
                                                <!-- <TH><input type="checkbox" id="check-all"> </TH> -->
                                                <th style="text-align: center;">No</th>
                                                <th>Print_sts</th>
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
                                                    <!-- <td align="center"><?= $row->quo_print_flex ?></td> -->
                                                    <td style="text-align:center;width:5%">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->quo_print_flex</span> 
                                                                <input type='text' class='field-quo_print_flex form-control form-control-sm editor' value='$row->quo_print_flex' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td><?= $row->inq_part_no ?></td>
                                                    <!-- <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank' ><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td> -->
                                                    <td><?= $row->inq_part_nm ?></td>
                                                    <td><?= $row->inq_nm_unit ?></td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_tool, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_tool form-control form-control-sm editor' value='$row->cost_tool' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_mtl, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_mtl form-control form-control-sm editor' value='$row->cost_mtl' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_process, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_process form-control form-control-sm editor' value='$row->cost_process' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_del, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_del form-control form-control-sm editor' value='$row->cost_del' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:5%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_overhead, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_overhead form-control form-control-sm editor' value='$row->cost_overhead' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <!-- <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_del, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_overhead); ?></td> -->
                                                    <?php
                                                    $overhead_price = (($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del) * $row->cost_overhead / 100);
                                                    ?>
                                                    <td align="right"><?= number_format($overhead_price); ?></td>

                                                    <?php
                                                    $hpp = ($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del + $overhead_price);
                                                    /*$profit = ($hpp * 40/100);
                                                        $trnsp = ($profit * 4/100);
                                                        $quot_price = ($hpp + $profit + $trnsp);*/
                                                    $quot_price_tot = ($row->quot_price) * $row->inq_qty;


                                                    ?>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format($hpp, 0, ',', '.'); ?></td>
                                                    <td style="text-align:center;width:5%">
                                                        <?php echo "
                                                            <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->profit_percent</span> 
                                                            <input type='text' class='field-profit_percent form-control form-control-sm editor' value='$row->profit_percent' data-id='$row->id_inquiry_detail' />
                                                            " ?>
                                                    </td>
                                                    <td style="text-align:center;width:5%">
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


                            <?php

                            } elseif ($row->type_prod == 'JO') {
                            ?>

                                <div class="table-responsive">

                                    <table class="table table-sm table-bordered " id="table" border=" 0">
                                        <thead>
                                            <tr>
                                                <!-- <TH><input type="checkbox" id="check-all"> </TH> -->
                                                <th style="text-align: center;">No</th>
                                                <th>Print_sts</th>
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
                                                    <!-- <td align="center"><?= $row->quo_print_flex ?></td> -->
                                                    <td style="text-align:center;width:5%">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->quo_print_flex</span> 
                                                                <input type='text' class='field-quo_print_flex form-control form-control-sm editor' value='$row->quo_print_flex' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td><?= $row->inq_part_no ?></td>
                                                    <!-- <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank' ><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td> -->
                                                    <td><?= $row->inq_part_nm ?></td>
                                                    <td><?= $row->inq_nm_unit ?></td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_tool, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_tool form-control form-control-sm editor' value='$row->cost_tool' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_mtl, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_mtl form-control form-control-sm editor' value='$row->cost_mtl' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_process, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_process form-control form-control-sm editor' value='$row->cost_process' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:7%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_del, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_del form-control form-control-sm editor' value='$row->cost_del' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <td style="text-align:right;width:5%;">
                                                        <?php echo "
                                                                <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>" . number_format($row->cost_overhead, 0, ',', '.') . "</span> 
                                                                <input type='text' class='field-cost_overhead form-control form-control-sm editor' value='$row->cost_overhead' data-id='$row->id_inquiry_detail' />
                                                                " ?>
                                                    </td>
                                                    <!-- <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_del, 0, ',', '.'); ?></td> -->
                                                    <!-- <td align="right"><?= number_format($row->cost_overhead); ?></td> -->
                                                    <?php
                                                    $overhead_price = (($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del) * $row->cost_overhead / 100);
                                                    ?>
                                                    <td align="right"><?= number_format($overhead_price); ?></td>

                                                    <?php
                                                    $hpp = ($row->cost_tool + $row->cost_mtl + $row->cost_process + $row->cost_del + $overhead_price);
                                                    /*$profit = ($hpp * 40/100);
                                                        $trnsp = ($profit * 4/100);
                                                        $quot_price = ($hpp + $profit + $trnsp);*/
                                                    $quot_price_tot = ($row->quot_price) * $row->inq_qty;


                                                    ?>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format($hpp, 0, ',', '.'); ?></td>
                                                    <td style="text-align:center;width:5%">
                                                        <?php echo "
                                                            <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->profit_percent</span> 
                                                            <input type='text' class='field-profit_percent form-control form-control-sm editor' value='$row->profit_percent' data-id='$row->id_inquiry_detail' />
                                                            " ?>
                                                    </td>
                                                    <td style="text-align:center;width:5%">
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

                            <?php

                            } else {


                            ?>

                                <div class="table-responsive">

                                    <table class="table table-sm table-bordered " id="table" border=" 0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th>Part No</th>
                                                <th>Part name</th>
                                                <th>Unit</th>
                                                <th>Jumlah</th>
                                                <th>Drawing</th>
                                                <!-- <th width="6%" style="text-align: center;">Action</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td align="center"></td> -->

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                            <?php

                            }
                            ?>

                            <hr>
                            <form action="<?= base_url('marketing/quotation/update_qNote') ?>" method="post">
                                <div class="form-row">
                                    <!-- <div class="form-group col-md-4">
                                    <label for="note">Status Quotation</label>
                                    <input type="text" class="form-control " name="note" id="note" value="" placeholder="Status" >
                                    
                                </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="note">Remark</label>

                                        <textarea type="text" class="form-control" name="q_note" id="q_note" value="<?= $dataquoedit['q_note']; ?>" placeholder=""></textarea>
                                        <input type="hidden" name="id_inquiry" value="<?= $uri4 ?>">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">


                                        <button style="float:right;width: 100px;" type="submit button" value="" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
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
                } else if (target.is(".field-cost_tool")) {
                    data.modul = "cost_tool";
                } else if (target.is(".field-cost_mtl")) {
                    data.modul = "cost_mtl";
                } else if (target.is(".field-cost_process")) {
                    data.modul = "cost_process";
                } else if (target.is(".field-cost_del")) {
                    data.modul = "cost_del";
                } else if (target.is(".field-cost_overhead")) {
                    data.modul = "cost_overhead";
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