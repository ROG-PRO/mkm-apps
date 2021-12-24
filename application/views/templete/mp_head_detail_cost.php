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
                    <h1 class="m-0 text-dark">Estimation Cost
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
                            <h6 class="m-0 font-weight-bold " style="padding:0px">Detail estimation / <?= $uri6 . ' / ' . $uri7 ?>
                                <a href="<?= base_url('engineering/estimationcost/list_estimation/' . $uri4 . ' ') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>

                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>
                        <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>

                        </div>-->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-2" style="width: 300px;">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" data-toggle="" role="tablist" aria-orientation="vertical">
                                        <!-- <a class="nav-link <?php if ($uri3 == 'mp_tools_estimation') {
                                                                    echo 'active';
                                                                } ?>" id="vert-tabs-home-tab" href="<?= base_url('engineering/estimationcost/mp_tools_estimation/' . $title . '/' . $id_inquiry_detail . '/' . str_replace(' ', '', $uri6) . '/' . $uri7 . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-home" aria-selected="true">Tools</a> -->
                                        <a class="nav-link <?php if ($uri3 == 'mp_materials_estimation') {
                                                                echo 'active';
                                                            } ?>" id="vert-tabs-profile-tab" href="<?= base_url('engineering/estimationcost/mp_materials_estimation/' . $title . '/' . $id_inquiry_detail . '/' . str_replace(' ', '', $uri6) . '/' . $uri7 . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-profile" aria-selected="false">Materials</a>
                                        <a class="nav-link <?php if ($uri3 == 'mp_process_estimation') {
                                                                echo 'active';
                                                            } ?>" id="vert-tabs-messages-tab" href="<?= base_url('engineering/estimationcost/mp_process_estimation/' . $title . '/' . $id_inquiry_detail . '/' . str_replace(' ', '', $uri6) . '/' . $uri7 . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-messages" aria-selected="false">Proccess</a>
                                        <a class="nav-link <?php if ($uri3 == 'mp_tools_estimation') {
                                                                echo 'active';
                                                            } ?>" id="vert-tabs-messages-tab" href="<?= base_url('engineering/estimationcost/mp_tools_estimation/' . $title . '/' . $id_inquiry_detail . '/' . str_replace(' ', '', $uri6) . '/' . $uri7 . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-messages" aria-selected="false">Tools</a>
                                        <a class="nav-link <?php if ($uri3 == 'mp_others_estimation') {
                                                                echo 'active';
                                                            } ?>" id="vert-tabs-settings-tab" href="<?= base_url('engineering/estimationcost/mp_others_estimation/' . $title . '/' . $id_inquiry_detail . '/' . str_replace(' ', '', $uri6) . '/' . $uri7 . '') ?>" data-toggle="" role="" aria-controls="vert-tabs-settings" aria-selected="false">Others</a>
                                    </div>

                                </div>