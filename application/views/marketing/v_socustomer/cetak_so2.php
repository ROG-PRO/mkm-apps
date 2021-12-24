<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sales Order | Cetak</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .garis {
            border: 1px solid black;
            margin-top: 1px;
        }

        .garis-luar {
            border: 1px solid black;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 5px;
            padding-left: 5px;
        }
    </style>
</head>

<body>
<div class="container" style="width: 1400px;">
    <div class="wrapper garis-luar">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="card card-default garis">
                <?php if ($so->so_approved == 0) : ?>
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-lg">
                            NOT APPROVED
                        </div>
                    </div>
                <?php endif ?>
                <div class="card-body with-border">
                    <div class="row">
                        <div class="col-2">
                            <h2 class="page-header">
                                <img src="<?= base_url("images/logomkm2.jpg") ?>" width="150">
                            </h2>
                        </div>
                        <div class="col-10 text-center">
                            <h2 class="page-header">
                                SALES ORDER
                            </h2>
                            <hr />
                            <h3 class="text-left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No : <?= $so->so_no ?> </h3>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- info row -->
            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            Date : <?= $so->so_date ?> <br>
                            Customer : <?= $so->customer_nm ?> <br>
                            Project : <?= $so->so_project ?> <br>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col text-center">
                            PO No : <?= $so->so_pono ?>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            MENTION <br>
                            Drawing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col text-center">
                            <br>
                            Attachment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox"> &nbsp;&nbsp;&nbsp; Sheets
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            Delivery Plan : <?= $so->so_deliverydate ?>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-border" border="1">
                                <thead>
                                    <tr>
                                        <th width="35%">Description</th>
                                        <th>Spec</th>
                                        <th>PO Qty</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($so_part as $row) : ?>
                                        <tr>
                                            <td><?= $row->sod_itemcode ?></td>
                                            <td><?= $row->sod_itemname . " - " . $row->sod_model ?></td>
                                            <td><?= $row->sod_qty ?></td>
                                            <td><?= $row->sod_remark ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">
                            Flow Circulation : Marketing (Registrasi SO) -> Engineering (Drawing Registration) -> <br>
                            -> PPIC (schedule Production) -> back to Marketing (Keep documentation)
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="card card-default garis">
                <div class="card-body with-border">
                    <div class="row invoice-info">
                        <div class="col-sm-2 invoice-col text-center">
                            Marketing <br>
                            <br>
                            <br>
                            <br>
                            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-2 invoice-col text-center">
                            Engineering <br>
                            <br>
                            <br>
                            <br>
                            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-2 invoice-col text-center">
                            PPIC <br>
                            <br>
                            <br>
                            <br>
                            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-2 invoice-col text-center">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-2 invoice-col text-center">
                            Approved <br>
                            Marketing <br>
                            <br>
                            <br>
                            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</div>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>