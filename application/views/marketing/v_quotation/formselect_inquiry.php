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
                    <h1 class="m-0 text-dark">Create quotation
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Select <small>Inqury Number </small> </h3>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('marketing/quotation') ?>" style="float:right;">X</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <form role="form" id="quickForm" method="post" action="<?= base_url('marketing/quotation/quotation_detail') ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Inquiry</label>
                                    <select name="id_inquiry" class="custom-select">
                                        <option value="">choose ...</option>
                                        <?php foreach ($inquiryNo as $inqNo) { ?>
                                            <option value="<?= $inqNo['id_inquiry'] ?>"><?= $inqNo['id_inquiry'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                            </div>
                            <!-- /.card-body --
                            <div class="card-footer">
                                <button style="float:right" type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </form> -->
                        <div class="card-body">
                            <!-- <table class="table table-responsive g-10"> -->
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <th>Create Quo</th>
                                    <th>Inquiry Number</th>
                                    <th>Customer</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($inquiryNo as $inqNo) { ?>
                                        <tr>
                                            <!-- <td><a href="http://"><i class="fas fa-calculator" aria-hidden="true"></i></a></td> -->
                                            <td>


                                                <a href='<?= base_url('marketing/quotation/quotation_detail/' . $inqNo['id_inquiry'] . ' ') ?>'><i class="fa fa-search" aria-hidden="true"></i></a>


                                            </td>
                                            <td>
                                                <?= $inqNo['id_inquiry'] ?>

                                            </td>
                                            <td>
                                                <?= $inqNo['cust_cd'] ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>