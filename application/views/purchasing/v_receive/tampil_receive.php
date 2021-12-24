<!-- /.content-header -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data <?= $title ?> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item active">Master <?= $title; ?></li>
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
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> <?= $title ?> list</h3>
                            <a href="<?= base_url('purchasing/receive/add') ?>" style="float:right;" class="btn btn-outline-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> New</a>

                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm" align="" id="data<?= $title ?>">
                                <thead class="thead-grey" align="left">
                                    <tr>
                                        <th>No</th>
                                        <th><?= $title ?> cd</th>
                                        <th>Supplier</th>
                                        <th>Tanggal</th>
                                        <th>No Referensi</th>
                                        <!-- <th>Update by</th>-->
                                        <th>Note</th>
                                        <th width="7%" align="center">Detail</th>
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