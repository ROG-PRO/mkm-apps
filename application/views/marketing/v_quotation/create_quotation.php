<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->fullname;
$today = date("Y-m-d H:i:s");
$date = date("Y-m-d");
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create quotation without Estimation Cost
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo site_url('marketing/quotation') ?>">Log <?= $uri2 ?> </a></li>
                            <li class="breadcrumb-item active"><?= $uri3 ?> </li>
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
                            <div class="card-header">
                               
                                <h3 class="card-title"><i class="fas fa-list-alt"></i> Create quotation List</h3> 
                               
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-sm" align="" id="dataaddquotation">
                                    <thead class="thead-grey" align="left">
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="5%">Detail</th>
                                            <th width="10%">Quotation No.</th>
                                            <th width="10%">Inquiry No.</th>
                                            <th width="8%">Status</th>
                                            <th width="8%">Cust. CD</th>
                                            <th>Create by</th>
                                            <th>Create dt</th>
                                            <th>Description</th>
                                            <!-- <th>Price</th> -->
                                            <!-- <th>Eng. Status</th>
                                            <th>Eng. Update</th> -->

                                            <!-- <th width="8%"><i class="fas fa-paperclip"></i> Drawing</th> -->
                                           <!--  <th>quotation</th>
                                            <th>print</th> -->

                                        <!--<th>Create date</th>--
                                            <th>Inquiry status</th>-->

                                            <!-- <th width="5%" align="center">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody align="left">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>