<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Inventory

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
                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <h3 class="card-title text-info">Inventory Stock :</h3>
                            <br />
                            <hr />
                            <div class="table-responsive">
                                <table  id="tbIv" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi ID</th>
                                            <th>Nama Lokasi</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 1;
                                        foreach ($inventory as $iv) :
                                            ?>
                                            <tr>
                                                <td><?= $n ?></td>
                                                <td><?= $iv->iv_lokid ?></td>
                                                <td><?= $iv->nm_lok ?></td>
                                                <td><?= $iv->iv_itemcode ?></td>
                                                <td><?= $iv->iv_itemname ?></td>
                                                <td><?= $iv->iv_qty ?></td>
                                                <td><?= $iv->iv_desc ?></td>
                                            </tr>
                                            <?php
                                            $n++;
                                        endforeach;
                                        ?>
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
    $(document).ready(function () {
        $('#tbIv').DataTable();
    });
</script>