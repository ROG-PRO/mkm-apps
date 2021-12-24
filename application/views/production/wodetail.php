<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Work Order
                        <!--| <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                        <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i></button></h1>-->

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item active"> <?= $title; ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-outline card-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="card-title text-info">Work Order Detail :</h3>
                                    <br />
                                    <hr />
                                    <dl class="row">
                                        <dd class="col-sm-3 text-info">Work Order ID.</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_id ?></dt>
                                        <dd class="col-sm-3 text-info">Date</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_date ?></dt>
                                        <dd class="col-sm-3 text-info">Nomor SO</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_sono ?></dt>
                                        <dd class="col-sm-3 text-info">Item Code</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_itemcode ?></dt>
                                        <dd class="col-sm-3 text-info">Item Name</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_itemname ?></dt>
                                    </dl>
                                    <hr />
                                    <dl class="row">
                                        <dd class="col-sm-3 text-info">WO Start.</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_start ?></dt>
                                        <dd class="col-sm-3 text-info">WO End</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_end ?></dt>
                                        <dd class="col-sm-3 text-info">WO Remark</dd>
                                        <dt class="col-sm-9 text-black"><?= $datawo->wo_remark ?></dt>
                                    </dl>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Quantity</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th>WO</th>
                                                <th>Finished</th>
                                                <th>NG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td><?= $datawo->wo_qty ?></td>
                                                <td><?= $datawo->wo_qtyfinish ?></td>
                                                <td><?= $datawo->wo_qtyng ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                        <h3 class="card-title text-info">Work Order History :</h3>
                                    <br />
                                    <hr />
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">#</th>
                                            <th rowspan="2">Date</th>
                                            <th rowspan="2">Operator</th>
                                            <th rowspan="2">Process</th>
                                            <th colspan="3" class="text-center">Quantity</th>
                                            <th rowspan="2">Remark</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">In</th>
                                            <th class="text-center">Out</th>
                                            <th class="text-center">NG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datahistory as $hist) :
                                        ?>
                                            <tr>
                                                <td><?= $hist->woh_id ?></td>
                                                <td><?= $hist->woh_date ?></td>
                                                <td><?= $hist->woh_operator ?></td>
                                                <td><?= $hist->woh_process ?></td>
                                                <td class="text-right"><?= $hist->woh_qtyin ?></td>
                                                <td class="text-right"><?= $hist->woh_qtyout ?></td>
                                                <td class="text-right"><?= $hist->woh_qtyng ?></td>
                                                <td><?= $hist->woh_remark . " " . $hist->woh_text ?></td>
                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbWo').DataTable();


    });
</script>