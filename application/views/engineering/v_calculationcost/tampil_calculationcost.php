<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');

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
                    <h1 class="m-0 text-dark">Calculation Cost
                </div><!-- /.col -->
                <div class="col-sm-6">
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
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <h4>Detail Calculation </h4>
                                </div>
                            </div>

                            <style>
                                td {
                                    padding: 5px;

                                }
                            </style>
                            <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>

                        </div>-->
                            <div class="row">
                                <div class="col-2">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" data-toggle="pill" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" href="" data-toggle="pill" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Home</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" href="" data-toggle="pill" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Profile</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" href="" data-toggle="pill" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Messages</a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" href="" data-toggle="pill" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Settings</a>
                                    </div>

                                </div>
                                <div class="col-10">

                                    <!-- <div class="callout callout-success" style="background-color:#D7FCE9 ;">
                                <table class="table table-sm " style="margin:1px; font-size:15px; "width="80%" border="0">
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
                                                $value = $row->nm_reff;
                                            }

                                    ?>
                                            <tr>
                                                <td width="10%"><b>Inquiry No</b></td>
                                                <td width="3%" >:</td>
                                                <td width="20%" ><?php echo $uri4 ?></td>
                                                <td width="10%"><b>Customer code</b></td>
                                                <td width="3%">:</td>
                                                <td ><?= $row->customer_cd2 ?></td>
                                                <td width="10%"><b><?= $label ?></b></td>
                                                <td width="3%">:</td>
                                                <td ><?= $value ?></td>
                                            </tr>
                                            <tr >
                                                <td width="10%"><b>Created date</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_dt ?></td>
                                                <td width="10%"><b>Customer desc</b></td>
                                                <td >:</td>
                                                <td ><?= $row->customer_nm ?></td>
                                                <td width="10%"><b><?= $label2 ?></b></td>
                                                <td >:</td>
                                                <td ><?= $value2 ?></td>
                                            </tr>
                                            <tr >
                                                <td width="10%"><b>Created by</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_by ?></td>
                                                <td width="10%"><b>Information by</b></td>
                                                <td width="3%">:</td>
                                                <td ><?= $row->information_by ?></td>
                                            </tr>
                                        <?php }
                                    } ?>

                                </table>
                            </div> -->


                                    <!-- ./row -->
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="card card-success card-outline-tabs card-outline">
                                                <div class="card-header p-0 pt-1">
                                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tools</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Materials</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Process</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Others</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                            <!-- Detail tools -->
                                                            <div class="card card-danger card-outline">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Tools</h6>
                                                                </div>
                                                                <form action="<?php echo site_url('engineering/estimationcost/tambah_tools') ?>" method="post" class="form-horizontal">
                                                                    <div class="card-body">
                                                                        <div class="form-row">


                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Tool Name</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select name="id_barang" id="part_nm" class="form-control part_nm" style="width: 100%;">
                                                                                            <option selected="selected"></option>
                                                                                            <?php


                                                                                            foreach ($tools as $row) {
                                                                                                echo '<option name="id_barang" value="' . $row->id_barang . '">' . $row->part_nm . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                                                                                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry Number</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-4 col-form-label" name="tool_qty" style="text-align:right;">Life time</label>
                                                                                    <div class="col-sm-4">
                                                                                        <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="qty" name="tool_qty" placeholder="Quantity">
                                                                                    </div>
                                                                                    <div class="col-sm-2">
                                                                                        pcs / tools
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer ">

                                                                        <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-outline-secondary"> save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <BR />
                                                            <div class="table-responsive">

                                                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Part No</th>
                                                                            <th>Part name</th>
                                                                            <th>Unit</th>
                                                                            <th>Life time</th>
                                                                            <th>Price</th>
                                                                            <th>Total</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($detailtools as $row) :
                                                                        ?>
                                                                            <tr>
                                                                                <td><?= $no++; ?></td>
                                                                                <td><?= $row->part_no; ?></td>
                                                                                <td><?= $row->part_nm; ?></td>
                                                                                <td><?= $row->nm_unit; ?></td>
                                                                                <td><?= $row->tool_qty; ?></td>
                                                                                <td><?= $row->price; ?></td>
                                                                                <td width="120"><?= $row->tot_amount; ?></td>
                                                                                <td width="60" align="center">

                                                                                    <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/delete_tool/' . $row->id_barang . '/' . $row->id_inquiry) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>

                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-sm table-bordered " width="100%">


                                                                    <tr>
                                                                        <td align="right" style=" padding-right:10px;background-color:darkgray">
                                                                            <b>Grand Total</b>
                                                                        </td>

                                                                        <td width="180" style=" padding-left:10px;">
                                                                            <?= $tot_tools_amount ?>
                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                            </div>

                                                            <!--- tool end --->
                                                        </div>

                                                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                                                            <!--- detail material start ----->
                                                            <div class="card card-info card-outline">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Material</h6>
                                                                </div>
                                                                <form action="<?php echo site_url('engineering/estimationcost/tambah_material') ?>" method="post" class="form-horizontal">
                                                                    <div class="card-body">
                                                                        <div class="form-row">


                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Process Name</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="id_barang" id="part_no" class="form-control part_no" style="width: 100%;">
                                                                                            <option selected="selected"></option>
                                                                                            <?php

                                                                                            foreach ($materials as $row) {
                                                                                                echo '<option name="id_barang" value="' . $row->id_barang . '">' . $row->part_no . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                                                                                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry Number</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-4 col-form-label" name="tool_qty" style="text-align:right;">Qty</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="rm_qty" name="rm_qty" placeholder="Quantity">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer ">

                                                                        <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-outline-secondary"> save</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <BR />
                                                            <div class="table-responsive">

                                                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Part No</th>
                                                                            <th>Part name</th>
                                                                            <th>Unit</th>
                                                                            <th>Qty</th>
                                                                            <th>Price</th>
                                                                            <th>Tot. Amount</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($detailmaterials as $row) :
                                                                        ?>
                                                                            <tr>
                                                                                <td><?= $no++; ?></td>
                                                                                <td><?= $row->part_no; ?></td>
                                                                                <td><?= $row->part_nm; ?></td>
                                                                                <td><?= $row->nm_unit; ?></td>
                                                                                <td><?= $row->rm_qty; ?></td>
                                                                                <td><?= $row->price; ?></td>
                                                                                <td width="120"><?= $row->tot_amount; ?></td>
                                                                                <td width="60" align="center">

                                                                                    <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/delete_rm/' . $row->id_barang . '/' . $row->id_inquiry) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>

                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-sm table-bordered " width="100%">


                                                                    <tr>
                                                                        <td align="right" style=" padding-right:10px;background-color:darkgray">
                                                                            <b>Grand Total</b>
                                                                        </td>

                                                                        <td width="180" style=" padding-left:10px;">
                                                                            <?= $tot_rm_amount ?>
                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                            <!--- material  end --->

                                                        </div>


                                                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">

                                                            <!-- === detail process start == -->
                                                            <div class="card card-success card-outline">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Process</h6>
                                                                </div>
                                                                <form action="<?php echo site_url('engineering/estimationcost/tambah_process') ?>" method="post" class="form-horizontal">
                                                                    <div class="card-body">
                                                                        <div class="form-row">


                                                                            <div class="form-group col-md-4">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="created_dt" id="created_dt" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Process Name</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="id_process" id="id_process " class="form-control form-control-sm nm_process" required>
                                                                                            <option value="">- Pilih process -</option>

                                                                                            <?php
                                                                                            foreach ($process as $row) {
                                                                                                echo "<option value='" . $row->id_process . "'>" . $row->nm_process . "</option>";
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
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry Number</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Machine Type</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="id_machine" id="type_machine " class="form-control type_machine" required>
                                                                                            <option value="">- Pilih Machine type -</option>

                                                                                            <?php
                                                                                            foreach ($machineType as $row) {
                                                                                                echo "<option value='" . $row->id_machine . "'>" . $row->type_machine . "</option>";
                                                                                            }

                                                                                            ?>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Time</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="" type="text" name="mc_time" class="form-control form-control-sm" id="mc_time" placeholder="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer ">

                                                                        <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-outline-secondary"> save</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <BR />
                                                            <div class="table-responsive">

                                                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>

                                                                            <th>Process</th>
                                                                            <th>Mesin Type</th>
                                                                            <th>Time</th>
                                                                            <th>Cost M/C</th>
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

                                                                                <td><?= $row->nm_process; ?></td>
                                                                                <td><?= $row->type_machine; ?></td>
                                                                                <td><?= $row->mc_time; ?></td>
                                                                                <td><?= $row->cost_machine; ?></td>
                                                                                <td width="120"><?= $row->tot_amount; ?></td>

                                                                                <td width="60" align="center">

                                                                                    <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/delete_process/' . $row->id_process_detail . '/' . $row->id_inquiry) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>

                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-sm table-bordered " width="100%">


                                                                    <tr>
                                                                        <td align="right" style=" padding-right:10px;background-color:darkgray">
                                                                            <b>Grand Total</b>
                                                                        </td>

                                                                        <td width="180" style=" padding-left:10px;">
                                                                            <?= $tot_process_amount ?>
                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                            <!--- process end --->

                                                        </div>


                                                        <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">

                                                            <!-- === detail process start == -->
                                                            <div class="card card-secondary card-outline">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Packing & Transportasi</h6>
                                                                </div>
                                                                <form action="<?php echo site_url('engineering/estimationcost/update_estimation') ?>" method="post" class="form-horizontal">
                                                                    <div class="card-body">
                                                                        <div class="form-row">


                                                                            <div class="form-group col-md-4">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" name="esti_update_dt" id="esti_update_dt" placeholder="Date" value="<?php echo date("Y-m-d H:i:s");  ?>">
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
                                                                                        <input type="text" class="form-control form-control-sm" name="cost_tools" id="cost_tools" value="<?= $tot_tools_amount ?>" readonly>
                                                                                    </div>
                                                                                    <input type="hidden" class="form-control" name="update_by" id="update_by" value="<?php echo $user ?>">
                                                                                    <input type="hidden" class="form-control" name="today" id="today" value="<?php echo $today ?>">
                                                                                    <input type="hidden" class="form-control" name="status" id="status" value="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-4">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Material Cost</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="<?= $tot_rm_amount ?>" type="text" name="cost_materials" class="form-control form-control-sm" id="cost_materials" placeholder="" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Process Cost</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="<?= $tot_process_amount ?>" type="text" name="cost_process" class="form-control form-control-sm" id="cost_process" placeholder="" readonly>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Transportasi Cost</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="" type="text" name="cost_transportation" class="form-control form-control-sm" id="cost_transportation" placeholder="">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Packing cost</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="" type="text" name="cost_packing" class="form-control form-control-sm" id="cost_packing" placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Description</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input style="border: 1px solid grey-light; " value="" type="text" name="note" class="form-control form-control-sm" id="note" placeholder="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer ">

                                                                        <button style="float:right;width:100px;" type="submit" value="" class="btn  btn-secondary"> Update</button>
                                                                    </div>
                                                                </form>

                                                            </div>

                                                            <BR />

                                                            <!--- process end --->

                                                        </div>



                                                    </div>
                                                    <!-- end -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
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
    echo $a;
    echo $b;
    echo $c; ?>

    function changeValue(id) {
        document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('part_nm').value = part_nm[id].part_nm;
        document.getElementById('id_barang').value = id_barang[id].id_barang;
    };
</script>