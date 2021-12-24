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
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h4 class="card-title">List Work Order</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive-xl">
                                <table id="tbWo" class="table table-striped table-hover">
                                    <thead class="thead-default">
                                        <tr>
                                            <th>WO ID.</th>
                                            <th>SO Number</th>
                                            <th>Item Code</th>
                                            <th>Description</th>
                                            <th>Start</th>
                                            <th>Deadline</th>
                                            <th>Qty Order</th>
                                            <th>Qty finish</th>
                                            <th>Qty Reject</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($datawo as $wo) :
                                            $opqty = $wo->wo_qty - ($wo->wo_qtyfinish + $wo->wo_qtyng);
                                        ?>
                                            <tr>
                                                <td><?= $wo->wo_id ?></td>
                                                <td><?= $wo->wo_sono ?></td>
                                                <td><?= $wo->wo_itemcode ?></td>
                                                <td><?= $wo->wo_itemname ?></td>
                                                <td><?= $wo->wo_start ?></td>
                                                <td><?= $wo->wo_end ?></td>
                                                <td><?= $wo->wo_qty ?></td>
                                                <td><?= $wo->wo_qtyfinish ?></td>
                                                <td><?= $wo->wo_qtyng  ?></td>
                                                <td>
                                                    <?php
                                                    switch ($wo->wo_status) {
                                                        case "100":
                                                            echo "WO Release";
                                                            break;
                                                        case "150":
                                                            echo "On Process";
                                                            break;
                                                        case "200":
                                                            echo "WO Finished";
                                                            break;
                                                        default:
                                                            echo "WO Created by Planner";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    switch ($wo->wo_status) {
                                                        case "100":
                                                            echo "<a id='btnDeliver' class='btn btn-warning btn-sm' data-wono='" . $wo->wo_id . "' data-woqty='" . $opqty . "'><i class='fa fa-external-link-alt'></i>Deliver</a>";
                                                            break;
                                                        case "150":
                                                            echo "<a id='btnDeliver' class='btn btn-warning btn-sm' data-wono='" . $wo->wo_id . "' data-woqty='" . $opqty . "'><i class='fa fa-external-link-alt'></i>Deliver</a>";
                                                            echo "<a href='" . site_url('production/workorder/detail/' . strtolower($wo->wo_id)) . "' class='btn btn-success btn-sm' data-id='" . $wo->wo_id . "'><i class='fa fa-search'></i> Detail</a>";
                                                            break;
                                                        case "200":
                                                            echo "<a href='" . site_url('production/workorder/detail/' . strtolower($wo->wo_id)) . "' class='btn btn-success btn-sm' data-id='" . $wo->wo_id . "'><i class='fa fa-search'></i> Detail</a>";
                                                            break;
                                                        default:
                                                            echo "<a id='btnRelease' class='btn btn-info btn-sm' data-woid='" . $wo->wo_id . "'><i class='fa fa-edit'></i> Rilis</a>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="woModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rilis Work Order</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="POST" action="<?= base_url('production/workorder/rilis') ?>">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="woid" class="col-sm-2 control-label" style="text-align:right;">WO ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="woid" class="form-control" id="woid" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wostartdt" class="col-sm-2 control-label" style="text-align:right;">Tanggal Prod.</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="wostartdt" class="form-control" id="wostartdt" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="time" name="wostarttm" class="form-control" id="wostarttm" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="woenddt" class="col-sm-2 control-label" style="text-align:right;">Deadline</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="woenddt" class="form-control" id="woenddt" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="time" name="woendtm" class="form-control" id="woendtm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="release" class="btn btn-md btn-success"><i class="fa fa-save"></i> Rilis</button>
                                <a id="btnCancel" class="btn btn-md btn-warning"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="woDeliver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deliver Work Order</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="POST" action="<?= base_url('production/workorder/deliver') ?>">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="wono" class="col-sm-2 control-label" style="text-align:right;">WO ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="wono" class="form-control" id="wono" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wodeldate" class="col-sm-2 control-label" style="text-align:right;">Date</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="wodeldate" class="form-control" id="wodeldate" readonly value="<?= date('Y-m-d H:i:s') ?>">
                                    </div>

                                    <label for="woqty" class="col-sm-2 control-label" style="text-align:right;">Qty Order</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="woqty" class="form-control" id="woqty" readonly>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label for="woprocess" class="col-sm-2 control-label" style="text-align:right;">Proses</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="woprocess" class="form-control" id="woprocess" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wofqty" class="col-sm-2 control-label" style="text-align:right;">Finish Qty</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="wofqty" class="form-control" id="wofqty" required>
                                    </div>

                                    <label for="wonqty" class="col-sm-2 control-label" style="text-align:right;">Reject Qty</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="wonqty" class="form-control" id="wonqty" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wonqty" class="col-sm-2 control-label" style="text-align:right;">Operator</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="woopr" class="form-control" id="woopr" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="release" class="btn btn-md btn-success"><i class="fa fa-save"></i> Save</button>
                                <a id="btnCancelDel" class="btn btn-md btn-warning"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbWo').DataTable();

        $('#tbWo').on('click', '#btnRelease', function() {
            var woid = $(this).data("woid");
            console.log(woid);
            $('#woid').val(woid);
            $('#woModalEdit').modal('show');
        });

        $('#tbWo').on('click', '#btnDeliver', function() {
            var wono = $(this).data("wono");
            var woqty = $(this).data("woqty");
            console.log(woid);
            $('#wono').val(wono);
            $('#woqty').val(woqty);
            $('#woDeliver').modal('show');
        });

        $('#btnCancel').click(function() {
            $('#woid').val('');
            $('#woModalEdit').modal('hide');
        });

        $('#btnCancelDel').click(function() {
            $('#woid').val('');
            $('#woDeliver').modal('hide');
        });
    });
</script>