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
                    <h1 class="m-0 text-dark">PPB Detail
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

                            <a href="<?= base_url('planner/issuedPPB/print_ppb/' . $uri4 . '') ?>" target='_blank' class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print PPB</a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('planner/issuedppb') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                            <hr>

                            <div class="callout callout-success" style="background-color:#D7FCE9 ;">
                                <p>MR Detail</p>
                                <table class="table table-sm table-responsive" border="0">
                                    <?php

                                    foreach ($detailppb as $row) {

                                    ?>

                                        <tr>
                                            <td width="10%"><b>Section request</b></td>
                                            <td width="3%">:</td>
                                            <td width="25%"><?php echo $row->ppb_section_id ?></td>
                                            <td width="10%"><b>User</b></td>
                                            <td width="3%">:</td>
                                            <td><?= $row->ppb_section_id ?></td>
                                            <td width="10%"><b>Date</b></td>
                                            <td width="3%">:</td>
                                            <td><?= $row->ppb_request_dt ?></td>
                                        </tr>

                                    <?php }
                                    ?>

                                </table>




                            </div>
                            <div class="table-responsive">

                                <table class="table table-sm table-bordered " id="table-data" border=" 0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>Item Name</th>
                                            <th>Code</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th width="8%" style="text-align: center;">request dt</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($detailpartppb as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++ ?></td>
                                                <td><?= $row->ppb_part_name ?></td>
                                                <td><?= $row->ppb_part_cd ?></td>
                                                <td><?= $row->ppb_qty ?></td>
                                                <td><?= $row->ppb_price ?></td>
                                                <td><?= $row->ppb_qty * $row->ppb_price ?></td>
                                                <td><?= $row->ppb_incoming_dt ?></td>
                                                <!-- <td align="center"><button class='btn btn-xs btn-danger btn-sm hapus-mr_part' data-id='$row->mr_detail_id' ><i class='far fa-trash-alt'></i></button></td> -->

                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>

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