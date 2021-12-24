<!-- <style type="text/css">
    td {
        cursor: pointer;
    }

    .editor {
        display: none;
    }
</style> -->
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
                    <h1 class="m-0 text-dark">Inquiry Detail
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
                            <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i> upload csv</button></h1><br /> -->
                            <A href="<?= base_url('marketing/inquiry') ?>" class="btn btn-danger btn-sm" style="float: right;"> X</A>
                            <?php foreach ($detailinquiry as $row) {
                                if ($row->eng_approve == 1) { ?>
                                    <!-- <button class="btn btn-info btn-sm" id="tambah-data" disabled><i class="fa fa-plus-circle" aria-hidden="true"></i> Add item</button> -->
                                    <button class=" btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Edit Inquiry </Button>
                                <?php } else { ?>
                                    <!-- <button class="btn btn-primary btn-sm" id="tambah-data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add item</button> -->
                                    <A href="<?= base_url('marketing/inquiry/inquiry_detail_edit/' . $uri4 . '') ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit Inquiry </A>
                                    <!-- <button class='btn btn-danger btn-sm cancel-inquiry' id='id' data-toggle='modal' data-id="<?= $uri4 ?>"><i class='fas fa-trash-alt'></i></button> -->
                            <?php }
                            } ?>
                            <HR>
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
                            <!-- <button class='btn btn-primary btn-sm create-quotation' data-toggle='modal'  data-target="#modal-quo "><i class='fas fa-edit'></i> Create Quotation
                            </button>
                            <a href="<?= base_url('marketing/inquiry/print_quotation/' . $uri4 . '') ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print Quotation</a> 
                            <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/inquiry') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                            <hr> -->

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
                                                <td width="20%" style="background-color: greenyellow;"><?php echo $uri4 ?></td>
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



                            <div class="table-responsive">

                                <table class="table table-sm table-bordered " id="table-data" border=" 0">
                                    <thead>
                                        <tr>
                                            <!-- <th style="text-align: center;">No</th> -->
                                            <th rowspan="2">Id Inquiry</th>
                                            <th rowspan="2">Part No</th>
                                            <th colspan="4" align="center">Drawing</th>

                                            <th rowspan="2">Part name</th>
                                            <th rowspan="2">Unit</th>
                                            <th rowspan="2">Jumlah</th>
                                            <th rowspan="2">Status</th>
                                            <th rowspan="2">Note</th>

                                            <!-- <th rowspan="2" width="8%" style="text-align: center;">Action</th> -->

                                        </tr>
                                        <tr>
                                            <!-- <th style="text-align: center;">No</th> -->

                                            <th> rev0</th>
                                            <th> rev1</th>
                                            <th> rev2</th>
                                            <th> rev3</th>




                                        </tr>
                                    </thead>


                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($detailpartinquiry2 as $r) :
                                        ?>
                                            <tr>
                                                <!-- <td align="center"><?= $no++ ?></td> -->
                                                <td><?= $r->id_inquiry ?></td>
                                                <td><?= $r->inq_part_no ?></td>
                                                <td><a href="<?= base_url('drawing/' . $r->inq_drawing . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $r->inq_drawing ?> </a></td>
                                                <td><a href="<?= base_url('drawing/' . $r->inq_drawing_rev1 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $r->inq_drawing_rev1 ?> </a></td>
                                                <td><a href="<?= base_url('drawing/' . $r->inq_drawing_rev2 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $r->inq_drawing_rev2 ?> </a></td>
                                                <td><a href="<?= base_url('drawing/' . $r->inq_drawing_rev3 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $r->inq_drawing_rev3 ?> </a></td>
                                                <td><?= $r->inq_part_nm ?></td>
                                                <td><?= $r->inq_nm_unit ?></td>
                                                <td><?= $r->inq_qty ?></td>
                                                <td><?php
                                                    if ($r->inq_dtl_sts2 == 1) {
                                                        echo '<span class="badge badge-warning">Cancel</span>';
                                                    } else if ($r->inq_dtl_sts2 == 2) {
                                                        echo '<span class="badge badge-primary">Continue</span>';
                                                    } else if ($r->inq_dtl_sts2 == 3) {
                                                        echo '<span class="badge badge-danger">Rejected</span>';
                                                    } ?></td>
                                                <td><?= $r->inq_dtl_note ?></td>


                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>

                                </table>

                            </div>
                            <hr>

                            <!-- <form action="<?= base_url('marketing/inquiry/update_sts_inquiry') ?>" method="post">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="">Inquiry Status</label>
                                        <select name="inquiry_status" class="form-control">
                                            <option value="">--select status ---</option>
                                            <option value="3" <?php echo $row->inquiry_status2 == '3' ? 'selected' : '' ?>>None</option>
                                            <option value="0" <?php echo $row->inquiry_status2 == '0' ? 'selected' : '' ?>>Cancel</option>
                                            <option value="1" <?php echo $row->inquiry_status2 == '1' ? 'selected' : '' ?>>Continue</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label class="">Inquiry Note : </label>
                                        <textarea class="form-control" type="text" name="inquiry_note"><?= $row->inquiry_note ?></textarea>
                                        <input class="form-control" name="id_inquiry" type="hidden" value='<?= $uri4 ?>'>
                                        <button onclick="return confirm('Yakin mau cancel Inquiry')" class="btn btn-success btn-sm" style="margin-top:10px;float:right" type="submit">Update inquiry Status</button>
                                    </div>
                                </div>
                            </form> -->

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
</div>



<script type="text/javascript">

</script>