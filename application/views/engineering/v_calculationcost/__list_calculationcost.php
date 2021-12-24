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

                    <h1 class="m-0 text-dark">Estimation Cost

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


                    <div class="card card-success card-outline">
                        <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>
                            
                        </div>-->
                        <div class="card-body">
                            <button class="btn btn-success btn-sm" onclick="print()"><i class="fas fa-print"></i> Print</button>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('engineering/estimationcost') ?>" style="float:right"> X</a>
                            <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i> upload csv</button></h1><br /> -->
                            <hr>

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
                                <table class="table table-sm table-responsive" style="margin:1px; font-size:13px; " width="80%" border="0">
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
                                                <td><b>Prod/Process type</b></td>
                                                <td width="3%">:</td>
                                                <td>
                                                    <form action="<?= base_url('engineering/estimationcost/update_typeprod') ?>" method="post">
                                                        <select name="type_prod" style="height:28px;width:140px;" class="" required <?php if ($row->eng_approve == 1) {
                                                                                                                                        echo "disabled";
                                                                                                                                    } ?>>
                                                            <option value="" selected disabled>Please select</option>
                                                            <option value="">None</option>
                                                            <option value="MP" <?php if ($row->type_prod == "MP") {
                                                                                    echo 'selected';
                                                                                } ?>>Mass Pro</option>
                                                            <option value="JO" <?php if ($row->type_prod == "JO") {
                                                                                    echo 'selected';
                                                                                } ?>>Job Order</option>

                                                        </select>
                                                        <select name="type_process" style="height:28px;width:140px;" class="" required <?php if ($row->eng_approve == 1) {
                                                                                                                                            echo "disabled";
                                                                                                                                        } ?>>
                                                            <option value="" selected disabled>Please select</option>
                                                            <option value="">None</option>
                                                            <option value="M" <?php if ($row->type_process == "M") {
                                                                                    echo 'selected';
                                                                                } ?>>Machining</option>
                                                            <!--  <option value="JO" <?php if ($row->type_prod == "JO") {
                                                                                            echo 'selected';
                                                                                        } ?>>Job Order</option> -->
                                                            <option value="F" <?php if ($row->type_process == "F") {
                                                                                    echo 'selected';
                                                                                } ?>>Fabrication</option>
                                                        </select>

                                                        <button onclick="return confirm('Update proses akan menghapus hasil kalkukasi')" class="btn-secondary" style="height: 27px;border: 1px solid #6D6D6D; " type="submit button" <?php if ($row->eng_approve == 1) {
                                                                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                                                                        } ?>>Update</button>
                                                        <input type="hidden" name="id_inquiry" value="<?= $row->id_inquiry ?>">

                                                        <!-- <button class="btn-secondary" style="height: 27px;border: 1px solid #6D6D6D; " type="submit button">Update</button> -->
                                                        <!-- <input type="hidden" name="id_inquiry" value="<?= $row->id_inquiry ?>" > -->
                                                </td>

                                                <!-- <td width="10%"><b>Process Type</b></td> -->
                                                <td width="3%"></td>
                                                <td>
                                                    <!-- <form action="<?= base_url('engineering/estimationcost/update_typeprod') ?>" method="post"> -->
                                                </td>
                                                </form>
                                            </tr>
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
                                                <!-- <td><button class="btn btn-primary btn-sm" onclick="print()"><i class="fas fa-print"></i> Print</button>
                                                    <a class="btn btn-danger btn-sm" href="<?= base_url('engineering/estimationcost') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a> -->
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
                                                <th style="text-align: center;" rowspan="2">No</th>
                                                <th width="5%" style="text-align: center;" rowspan="2">Action</th>
                                                <th rowspan="2">Part No</th>
                                                <th rowspan="2">Incld.Mtl</th>
                                                <th colspan="4" style="text-align: center;">Drawing</th>
                                                <th rowspan="2">Part name</th>
                                                <th rowspan="2">Inq_qty</th>
                                                <th rowspan="2">Esti_qty</th>
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">Tools Cost</th>
                                                <th rowspan="2">Material Cost</th>
                                                <th rowspan="2">Process Cost</th>
                                                <th rowspan="2">HPP Total</th>

                                            </tr>
                                            <tr>


                                                <th>Drawing rev0</th>
                                                <th>Drawing rev1</th>
                                                <th>Drawing Rev2</th>
                                                <th>Drawing Rev3</th>


                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <!-- <a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-check-double"></i> Update</a> -->
                                                </td>
                                                <td colspan="13" align="right">
                                                    <label style="vertical-align: middle;">Grand Total</label>
                                                </td>
                                                <td align="right" width="9%">
                                                    <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($total_amount, 0, ',', '.'); ?> " disabled>
                                                    <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                                                </td>



                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $type_prod = $row->type_prod;
                                            foreach ($detailpartinquiry as $row) :
                                                $partno = str_replace(' ', '%20', $row->inq_part_no);
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++ ?></td>
                                                    <td align="center">
                                                        <?php if ($row->inq_incld_mtl == 1) { ?>
                                                            <a href="<?= base_url('engineering/estimationcost/jo_incld_mtl_estimation/' . $row->id_inquiry . '/' . $row->id_inquiry_detail) ?>" class='btn btn-secondary btn-sm'><i class='fa fa-calculator' aria-hidden='true'></i></a>
                                                        <?php } else if ($row->inq_incld_mtl == 0) { ?>
                                                            <a href="<?= base_url('engineering/estimationcost/jo_materials_estimation/' . $row->id_inquiry . '/' . $row->id_inquiry_detail) ?>" class='btn btn-secondary btn-sm'><i class='fa fa-calculator' aria-hidden='true'></i></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $row->inq_part_no ?></td>
                                                    <td><?= $row->inq_incld_mtl == '1' ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev1 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev1 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev2 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev2 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev3 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev3 ?> </a></td>
                                                    <td><?= $row->inq_part_nm ?></td>
                                                    <td><?= $row->inq_qty ?></td>
                                                    <td><?= $row->estimation_qty ?></td>
                                                    <td><?= $row->inq_nm_unit ?></td>
                                                    <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format(($row->cost_mtl + $row->cost_process + $row->cost_tool), 0, ',', '.'); ?></td>

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
                                                <th rowspan="2" style="text-align: center;">No</th>
                                                <th rowspan="2" width="5%" style="text-align: center;">Action</th>
                                                <th rowspan="2">Part No</th>
                                                <th rowspan="2">Incld Mtl</th>
                                                <th colspan="4">Drawing</th>

                                                <th rowspan="2">Part name</th>
                                                <th rowspan="2">Inq_qty</th>
                                                <th rowspan="2">Esti_qty</th>
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">MTL Cost</th>
                                                <th rowspan="2">Process Cost</th>
                                                <th rowspan="2">Tool Cost</th>
                                                <th rowspan="2">Trans. Cost</th>
                                                <th rowspan="2">OH %</th>
                                                <th rowspan="2">Overhead Cost</th>
                                                <th rowspan="2">HPP Total</th>

                                            </tr>
                                            <tr>


                                                <th>Drawing rev0</th>
                                                <th>Drawing rev1</th>
                                                <th>Drawing Rev2</th>
                                                <th>Drawing Rev3</th>


                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <!-- <a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-check-double"></i> Update</a> -->
                                                </td>
                                                <td colspan="16" align="right">
                                                    <label style="vertical-align: middle;">Grand Total</label>
                                                </td>
                                                <td align="right" width="9%">
                                                    <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($grtotal_amount, 0, ',', '.'); ?> " disabled>
                                                    <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                                                </td>



                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            $type_prod = $row->type_prod;
                                            $no = 1;
                                            foreach ($detailpartinquiry as $row) :
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++ ?></td>
                                                    <td align="center">
                                                        <?php if ($row->inq_incld_mtl == 1) { ?>
                                                            <a href="<?= base_url('engineering/estimationcost/jo_incld_mtl_estimation/' . $row->id_inquiry . '/' . $row->id_inquiry_detail) ?>" class='btn btn-secondary btn-sm'><i class='fa fa-calculator' aria-hidden='true'></i></a>
                                                        <?php } else if ($row->inq_incld_mtl == 0) { ?>
                                                            <a href="<?= base_url('engineering/estimationcost/jo_materials_estimation/' . $row->id_inquiry . '/' . $row->id_inquiry_detail) ?>" class='btn btn-secondary btn-sm'><i class='fa fa-calculator' aria-hidden='true'></i></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $row->inq_part_no ?></td>
                                                    <td><?= $row->inq_incld_mtl == '1' ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev1 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev1 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev2 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev2 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev3 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev3 ?> </a></td>
                                                    <td><?= $row->inq_part_nm ?></td>
                                                    <td><?= $row->inq_qty ?></td>
                                                    <td><?= $row->estimation_qty ?></td>
                                                    <td><?= $row->inq_nm_unit ?></td>
                                                    <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_del, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_overhead); ?></td>
                                                    <?php
                                                    $oh_cost = (($row->cost_mtl + $row->cost_process + $row->cost_tool + $row->cost_del) * $row->cost_overhead / 100)
                                                    ?>
                                                    <td align="right"><?= number_format($oh_cost, 0, ',', '.') ?></td>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format(($row->cost_mtl + $row->cost_process + $row->cost_del + $oh_cost), 0, ',', '.'); ?></td>

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
                                                <th style="text-align: center;" rowspan="2">No</th>
                                                <th width="5%" style="text-align: center;" rowspan="2">Action</th>
                                                <th rowspan="2">Part No</th>
                                                <th rowspan="2">Incd. Mtl</th>
                                                <th colspan="4" style="text-align: center;">Drawing</th>

                                                <th rowspan="2">Part name</th>
                                                <th rowspan="2">Inq_qty</th>
                                                <th rowspan="2">Esti_qty</th>
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">Tools Cost</th>
                                                <th rowspan="2">Material Cost</th>
                                                <th rowspan="2">Process Cost</th>
                                                <th rowspan="2">HPP Total</th>

                                            </tr>
                                            <tr>


                                                <th>Drawing rev0</th>
                                                <th>Drawing rev1</th>
                                                <th>Drawing Rev2</th>
                                                <th>Drawing Rev3</th>


                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <!-- <a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-check-double"></i> Update</a> -->
                                                </td>
                                                <td colspan="13" align="right">
                                                    <label style="vertical-align: middle;">Grand Total</label>
                                                </td>
                                                <td align="right" width="9%">
                                                    <input style="text-align: right;" class="form-control form-control-sm" value="<?= number_format($total_amount, 0, ',', '.'); ?> " disabled>
                                                    <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                                                </td>



                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php

                                            $no = 1;
                                            foreach ($detailpartinquiry as $row) :
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++ ?></td>
                                                    <td align="center"><a href="#" onclick="return confirm('Please update Prod/Process type first !')" class='btn btn-secondary btn-sm'><i class='fa fa-calculator' aria-hidden='true'></i>
                                                        </a></td>
                                                    <td><?= $row->inq_part_no ?></td>
                                                    <td><?= $row->inq_incld_mtl == '1' ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev1 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev1 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev2 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev2 ?> </a></td>
                                                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev3 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev3 ?> </a></td>
                                                    <td><?= $row->inq_part_nm ?></td>
                                                    <td><?= $row->inq_qty ?></td>
                                                    <td><?= $row->estimation_qty ?></td>
                                                    <td><?= $row->inq_nm_unit ?></td>
                                                    <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td>
                                                    <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td>
                                                    <td align="right" style="padding-right: 17px;"><?= number_format(($row->cost_mtl + $row->cost_process + $row->cost_tool), 0, ',', '.'); ?></td>

                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>

                            <?php

                            }
                            ?>


                            <hr style="margin-top: 5px">
                            <!-- <a href="<?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>" class="btn btn-secondary btn-sm" style="float: right;"><i class="fas fa-check-double"></i> Finish</a> -->
                            <?php foreach ($detailinquiry as $row) {
                                if ($row->eng_approve == 1) { ?>
                                    <a onclick="cancelConfirm(' <?= base_url('engineering/estimationcost/cancel_engsts/' . $uri4 . '') ?>')" href="#!" class="btn btn-success btn-sm" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i> Cancel Calculation</a>
                                <?php } else { ?>
                                    <a onclick="updateConfirm(' <?= base_url('engineering/estimationcost/update_engsts/' . $uri4 . '') ?>')" href="#!" class="btn btn-success btn-sm" style="float: right;margin-right: 5px;"><i class="fas fa-check"></i> Calculation Finish</a>
                                    <a onclick="recalculateConfirm(' <?= base_url('engineering/estimationcost/recalculate_estimationcost/' . $uri4 . '') ?>')" href="#!" class="btn btn-success btn-sm" style="float: right;margin-right: 5px;"><i class="fas fa-retweet"></i> Recalculate</a>
                            <?php }
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>

<!-- cancel Confirmation-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin mau cancel calculation result</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a id="btn-cancel" class="btn btn-danger" href="#">Update</a>
            </div>
        </div>
    </div>
</div>
<!-- Update Confirmation-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pastikan data sudah benar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-update" class="btn btn-primary" href="#">Update</a>
            </div>
        </div>
    </div>
</div>
<!-- recalculate Confirmation-->
<div class="modal fade" id="recalculateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><i class="fas fa-exclamation-triangle" style="color:orange"></i> Semua data Kalkulasi akan terhapus secara permanen dan data tidak bisa dikembalikan ! </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-recalculate" class="btn btn-primary" href="#">Recalculate</a>
            </div>
        </div>
    </div>
</div>
<!-- update prod type Confirmation-->
<div class="modal fade" id="updateprodtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><i class="fas fa-exclamation-triangle" style="color:orange"></i> Update prod/process type akan menghapus hasil Kalkulasi secara permanen dan data tidak bisa dikembalikan ! </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-recalculate" class="btn btn-primary" href="#">Recalculate</a>
            </div>
        </div>
    </div>
</div>

<script>
    function cancelConfirm(url) {
        $('#btn-cancel').attr('href', url);
        $('#cancelModal').modal();
    }

    function updateConfirm(url) {
        $('#btn-update').attr('href', url);
        $('#updateModal').modal();
    }

    function recalculateConfirm(url) {
        $('#btn-recalculate').attr('href', url);
        $('#recalculateModal').modal();
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