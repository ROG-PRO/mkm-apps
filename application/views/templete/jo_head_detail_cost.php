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
$uri7 = $this->uri->segment('7');

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

                    <h2 class="m-0 text-dark">Estimation Cost <h2>


                </div><!-- /.col -->
                <div class="col-sm-6">
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


                        <div class="card-header py-2">

                            <h6 class="m-0 font-weight-bold " style="padding:0px">Detail estimation / <?= $detailInq['type_prod'] . ' / ' . $detailInq['inq_part_no'] ?>
                                <a href="<?= base_url('engineering/estimationcost/list_estimation/' . $uri4 . ' ') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>
                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>

                        <br />

                        <ul style="margin-left: 18px;margin-right: 18px;" class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <?php if ($detailInq['inq_incld_mtl'] == 1) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($uri3 == "jo_incld_mtl_estimation") {
                                                            echo "active";
                                                        } ?>" id="vert-tabs-profile-tab" href="<?= base_url('engineering/estimationcost/jo_incld_mtl_estimation/' . $title . '/' . $id_inquiry_detail . '')  ?>" data-toggle="" role="" aria-controls="vert-tabs-profile" aria-selected="false">Materials</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($uri3 == "jo_materials_estimation") {
                                                            echo "active";
                                                        } ?>" id="vert-tabs-profile-tab" href="<?= base_url('engineering/estimationcost/jo_materials_estimation/' . $title . '/' . $id_inquiry_detail . '')  ?>" data-toggle="" role="" aria-controls="vert-tabs-profile" aria-selected="false">Materials</a>
                                </li>
                            <?php } ?>


                            <li class="nav-item">
                                <a class="nav-link <?php if ($uri3 == 'jo_process_estimation') {
                                                        echo 'active';
                                                    } ?>" id="vert-tabs-messages-tab" href="<?= base_url('engineering/estimationcost/jo_process_estimation/' . $title . '/' . $id_inquiry_detail .  '') ?>" data-toggle="" role="" aria-controls="vert-tabs-messages" aria-selected="false">Proccess</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($uri3 == 'jo_tools_estimation') {
                                                        echo 'active';
                                                    } ?>" id="vert-tabs-home-tab" href="<?= base_url('engineering/estimationcost/jo_tools_estimation/' . $title . '/' . $id_inquiry_detail . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-home" aria-selected="true">Tools</a>
                                <!-- }?>" id="vert-tabs-home-tab"  href="<?= base_url('engineering/estimationcost/jo_tools_estimation/' . $title . '/' . $id_inquiry_detail . ' ') ?>" data-toggle="" role="" aria-controls="vert-tabs-home" aria-selected="true">Tools</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($uri3 == 'jo_others_estimation') {
                                                        echo 'active';
                                                    } ?>" id="vert-tabs-settings-tab" href="<?= base_url('engineering/estimationcost/jo_others_estimation/' . $title . '/' . $id_inquiry_detail . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-settings" aria-selected="false">Others</a>
                            </li>
                        </ul>