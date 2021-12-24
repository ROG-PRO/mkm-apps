<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi <?= $title; ?></li>
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

                <div class="col-lg-12">

                    <!-- Circle Buttons -->
                    <div class="card shadow mb-12">
                        <!--<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                        </div>-->

                        <div class="card-body">
                            <?php
                            if (isset($detail)) {
                                foreach ($detail as $row) {
                            ?>


                                    <table width="100%" border="0">
                                        <tr>
                                            <td>Supplier : </td>
                                            <td rowspan="2" width="1%" align="center">
                                                <div style=" width:1px; height:30px; background-color:grey;">
                                                </div>
                                            </td>

                                            <td width="2%" rowspan="2" align="center">
                                                <font color="grey"><i class="fas fa-fw fa-print"></i></font>
                                            </td>
                                            <td rowspan="2" width="1%" align="center">
                                                <div style=" width:1px; height:30px; background-color:grey;">
                                                </div>
                                            </td>
                                            <td width="2%" rowspan="2" align="center">
                                                <font color="grey"><i class="far fa-fw fa-edit"></i></font>
                                            </td>

                                            <td rowspan="2" width="1%" align="center">
                                                <div style=" width:1px; height:30px; background-color:grey;">
                                                </div>
                                            </td>
                                            <td width="2%" rowspan="2" align="center">
                                                <a href="#" onclick="return confirm('Yakin Hapus? <?php echo $row->receive_cd ?>')" title="Hapus Data" data-toggle="tooltip" class="">
                                                    <font color="red"><i class="far fa-fw fa-trash-alt"></i></font>
                                                </a>
                                            </td>
                                            <td width="1%" rowspan="2" align="center"></td>

                                            <td width="15%">&nbsp;&nbsp;No. referensi: &nbsp;<?php echo $row->id_book_inv;
                                                                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:17px"><?php echo $row->sup_name;
                                                                        ?> </td>
                                            <td>&nbsp;&nbsp;Date: &nbsp;<?php echo $row->recv_dt;
                                                                        ?></td>
                                        </tr>
                                    </table>
                            <?php }
                            } ?>
                            <hr>
                            <br />
                            <div class="table-responsive">

                                <table id="table-datatable" class="table table-sm table-bordered " width="90%" border="0">
                                    <thead>
                                        <tr>
                                            <th height="30px">No</th>
                                            <th height="30px">Part No</th>
                                            <th height="30px">Part name</th>
                                            <th height="30px">Unit</th>
                                            <th height="30px">Jumlah</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (isset($partdetail)) {
                                            foreach ($partdetail as $row) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->part_no ?></td>
                                                    <td><?php echo $row->part_nm ?></td>
                                                    <td><?php echo $row->nm_unit ?></td>
                                                    <td><?php echo $row->qty ?></td>

                                                </tr>
                                        <?php }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <br />
                                <hr>
                                <table width="100%" border="0">
                                    <?php
                                    if (isset($detail)) {
                                        foreach ($detail as $row) {
                                    ?>
                                            <tr>
                                                <td width="90%">Note : <?php echo $row->note;
                                                                        ?></td>

                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>



<!--<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>-->