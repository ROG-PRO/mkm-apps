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
                    <h5 class="m-0 text-dark"><a href="<?php echo site_url('purchasing/receive') ?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back </a></h5>
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

                <div class="col-12">

                    <!-- Circle Buttons -->
                    <div class="card card-success card-outline">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">

                                <div class="form-row">


                                    <div>
                                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                                        <label></label>
                                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo $today ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Part name :</label>
                                        <select name="id_barang_a" id="part_nm" class="form-control select2" style="width: 100%;" onchange='changeValue(this.value)'>
                                            <option selected="selected"></option>
                                            <?php
                                            $con = mysqli_connect("localhost", "root", "mySQL", "mkm_test");
                                            $query = "SELECT * FROM barang";
                                            $result = mysqli_query($con, $query);
                                            $a          = "var part_no = new Array();\n;";
                                            $b          = "var part_nm = new Array();\n;";
                                            $c          = "var id_barang = new Array();\n;";

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option name="id_barang" value="' . $row['id_barang'] . '">' . $row['part_nm'] . '</option>';
                                                $a .= "part_no['" . $row['id_barang'] . "'] = {part_no:'" . addslashes($row['part_no']) . "'};\n";
                                                $b .= "part_nm['" . $row['id_barang'] . "'] = {part_nm:'" . addslashes($row['part_nm']) . "'};\n";
                                                $c .= "id_barang['" . $row['id_barang'] . "'] = {id_barang:'" . addslashes($row['id_barang']) . "'};\n";
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Quantity">Part no</label>
                                        <input type="text" class="form-control" name="part_no" id="part_no" readonly autocomplete="off">
                                        <input type="hidden" class="form-control" name="id_barang" id="id_barang" readonly autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Quantity">Quantity</label>
                                        <input type="text" class="form-control" name="qty" id="qty" required autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">&nbsp;</label>
                                        <button type="submit" class="btn btn-outline-info  form-control">Tambah </button>
                                    </div>
                            </form>
                        </div>



                        <hr style="border:2px solid grey-light">



                        <div class="card card-default">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold " style="padding:0px">Detail part</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-row">

                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <input style="border: 1px solid grey-light; height:27px;" disabled type="text" class="form-control" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">No. Ref.</label>
                                                        <div class="col-sm-10">
                                                            <input style="border: 1px solid grey-light; height:27px;" type="text" class="form-control" id="inputPassword3" placeholder="No. Referensi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <input type="hidden" class="form-control" name="receive_cd" id="receive_cd" value="<?php echo date("YmdHis"); ?>">
                                                    <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier</label>
                                                        <div class="col-sm-10">
                                                            <input style="border: 1px solid grey-light; height:27px;" type="text" class="form-control" id="inputEmail3" placeholder="Supplier">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">note</label>
                                                        <div class="col-sm-10">
                                                            <input style="border: 1px solid grey-light; height:27px;" type="text" class="form-control" id="inputPassword3" placeholder="note">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="table-responsive">

                                                <table class="table table-sm table-bordered " id="table" border=" 0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Part No</th>
                                                            <th>Part name</th>
                                                            <th>Unit</th>
                                                            <th>Jumlah</th>
                                                            <th>Tools</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php
                                                        $no = 1;
                                                        foreach ($detail as $row) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $row->part_no; ?></td>
                                                                <td><?= $row->part_nm; ?></td>
                                                                <td><?= $row->nm_unit; ?></td>
                                                                <td><?= $row->qty; ?></td>
                                                                <td width="4%" align="center">

                                                                    <a onclick="deleteConfirm(' <?php echo site_url('admin/receive/delete/' . $row->id_receive) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>

                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer ">

                                <input style="float:right;" type="submit" value="simpan" class="btn btn-secondary">
                            </div>
                            </form>
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


<script>
    $(document).ready(function() {
        $("#part_nm").select2({
            placeholder: "Please Select",
            allowClear: true,
            theme: 'bootstrap4'
        });

    });
</script>
<!--<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()({
            theme: 'bootstrap4'

        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>-->

<script type="text/javascript">
    <?php
    echo $a;
    echo $b;
    echo $c; ?>

    function changeValue(id) {
        document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('part_nm').value = part_nm[id].part_nm;
        document.getElementById('id_barang').value = id_barang[id].id_barang;
    };
</script>


<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>