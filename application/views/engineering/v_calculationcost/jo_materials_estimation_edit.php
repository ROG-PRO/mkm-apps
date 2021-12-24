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
$uri8 = $this->uri->segment('8');

// $tot_tools_amount = $tools_amount;
// $tot_rm_amount = $rm_amount;
// $tot_process_amount = $process_amount;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h2 class="m-0 text-dark">Estimation Cost <h2>


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



                            <h6 class="m-0 font-weight-bold " style="padding:0px">Detail estimation
                                <?php if ($detailInq['inq_incld_mtl'] == 1) { ?>

                                    <a href="<?= base_url('engineering/estimationcost/jo_incld_mtl_estimation/' . $uri5 . '/' . $uri6 . '') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('engineering/estimationcost/jo_materials_estimation/' . $uri5 . '/' . $uri6 . '') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>

                                <?php } ?>

                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>

                        <br />

                        <div class="col-12">



                            <!-- ./row -->
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <br />

                                    <!--- detail material start ----->
                                    <div class="card card-warning">
                                        <div class="card-header py-2">
                                            <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="fas fa-pencil-alt"></i> Edit Detail Material </h6>
                                        </div>
                                        <form action="<?php echo site_url('engineering/estimationcost/jo_edit_material') ?>" method="post" class="form-horizontal">
                                            <div class="card-body">
                                                <div class="form-row">


                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                            <div class="col-sm-4">
                                                                <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">

                                                            </div>


                                                        </div>
                                                        <div class=" form-group row">
                                                            <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Raw Material </label>
                                                            <div class="col-sm-5">
                                                                <select name="id_brg" id="id_barang" class="form-control part_no" style="width: 100%;" onchange='changeValue(this.value)'>
                                                                    <option selected="selected"></option>

                                                                    <?php

                                                                    $con = mysqli_connect("localhost", "root", "mySQL", "mkm_test");
                                                                    $query = "SELECT *  from barang ";
                                                                    $result = mysqli_query($con, $query);
                                                                    // $a          = "var part_no = new Array();\n;";
                                                                    $y          = "var price = new Array();\n;";
                                                                    $z          = "var id_barang = new Array();\n;";

                                                                    while ($d = mysqli_fetch_array($result)) {
                                                                        echo "<option value='" . $d['id_barang'] . "'";
                                                                        echo $detailmaterialsedit['id_barang'] == $d['id_barang'] ? 'selected' : '';
                                                                        echo ">" . $d['part_no'] . "</option>";
                                                                        // echo '<option name="id_barang" value="' . $row['id_barang'] . '" >' . $row['part_no'] . '</option>';
                                                                        // $a .= "part_no['" . $row['id_barang'] . "'] = {part_no:'" . addslashes($row['part_no']) . "'};\n";
                                                                        $y .= "price['" . $d['id_barang'] . "'] = {price:'" . addslashes($d['price']) . "'};\n";
                                                                        $z .= "id_barang['" . $d['id_barang'] . "'] = {id_barang:'" . addslashes($d['id_barang']) . "'};\n";
                                                                    }
                                                                    ?>


                                                                </select>
                                                                <input type="hidden" class="form-control" name="update_dt" id="" value="<?php echo date("YmdHis"); ?>">
                                                                <input type="hidden" class="form-control" name="update_by" id="" value="<?php echo $user ?>">
                                                                <input type="hidden" class="" name="" id="part_no">
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <select name="id_shape" id="id_shape" class="form-control " style="width: 100%;">
                                                                    <option selected="selected">Pilih Jenis</option>
                                                                    <option value="0" <?php if ($detailmaterialsedit['id_shape'] == 0) {
                                                                                            echo 'selected';
                                                                                        } ?>>Round Bar</option>
                                                                    <option Value="1" <?php if ($detailmaterialsedit['id_shape'] == 1) {
                                                                                            echo 'selected';
                                                                                        } ?>>Block</option>
                                                                </select>

                                                                <input type="hidden" name="prod_type" value="<?= $uri7 ?>">
                                                                <input type="hidden" name="part_no" value="<?= $uri8 ?>">
                                                                <input type="hidden" name="id_rm" value="<?= $uri4 ?>">
                                                                <input type="hidden" name="inq_incld_mtl" value="<?= $detailInq['inq_incld_mtl'] ?>">
                                                            </div>

                                                        </div>
                                                        <!-- menu block -->
                                                        <div class="form-group row" id="div_size">
                                                            <label id="lbl_size" for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Size</label>

                                                            <div class="col-sm-3" id="div_long">
                                                                <input style="margin:1px; border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="long_" placeholder="Panjang" value="<?= $detailmaterialsedit['rm_long'] ?>" name="long">
                                                            </div>

                                                            <div class="col-sm-3" id="div_lebar">
                                                                <input style="margin:1px;border: 1px solid grey-light;" type="text" name="width" class="form-control form-control-sm" id="lebar_" placeholder="Lebar / Diamter" value="<?= $detailmaterialsedit['rm_width'] ?>">
                                                            </div>


                                                            <div class="col-sm-3" id="div_tinggi">
                                                                <input style="margin:1px;border: 1px solid grey-light;" type="text" name="height" class="form-control form-control-sm" id="tinggi_" placeholder="Tebal" value="<?= $detailmaterialsedit['rm_height'] ?>">
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Inquiry Number </label>
                                                            <div class="col-sm-7">
                                                                <input style="border: 1px solid grey-light; " value="<?= $detailmaterialsedit['id_inquiry'] ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                                <input style="border: 1px solid grey-light; " value="<?= $detailmaterialsedit['id_inquiry_detail'] ?>" type="hidden" name="id_inquiry_detail" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-3 col-form-label" name="price" id="" style="text-align:right;">Price</label>
                                                            <div class="col-sm-7">
                                                                <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="price" name="price" value="<?= $detailmaterialsedit['price_kg'] ?>" placeholder="Price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer ">

                                                <button style="float:right;width:100px;" type="submit" value="Update" class="btn  btn-success btn-sm">Update</button>

                                            </div>
                                        </form>
                                    </div>

                                    <!--- process end --->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<!-- end modal edit -->


<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    function editConfirm(url) {
        $('#btn-edit').attr('href', url);
        $('#editModal').modal();
    }
</script>

<script>
    $(document).ready(function() {
        $(".part_nm").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });

        $(".part_no").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });
        $(".type_machine").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });
        $(".nm_process").select2({
            placeholder: "Please Select",
            allowClear: false,
            theme: 'bootstrap4'
        });

    });
</script>


<SCRIPT>
    $(document).ready(function() {
        total();
        // $('.qty').change(function() {
        //     total();
        // });
        $('.amount').change(function() {
            total();
        });
    });

    function total() {
        var sum = 0;
        $('#penjualan > tbody  > tr').each(function() {
            //var qty = $(this).find('.qty').val();
            var amount = $('.amount').val();
            //var amount = (qty*price)
            //var tot = (amount)
            sum += amount;
            $(this).find('.amount').text('' + amount);
        });
        $('.total').text(sum);
    }
</SCRIPT>

<script type="text/javascript">
    $(document).ready(function() {

        var total = $(".amount").val();
        sum += total;

    });
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script src="<?= base_url('assets/jquery/jquery-1.10.2.min.js') ?>"></script>

<script type='text/javascript'>
    $(window).load(function() {
        $("#id_shape").change(function() {
            console.log($("#id_shape option:selected").val());
            if ($("#id_shape option:selected").val() == '1') {

                $('#div_tinggi').prop('hidden', false);
                $('#tinggi').prop('hidden', false);


            } else {

                $('#div_tinggi').prop('hidden', true);
                $('#tinggi').prop('hidden', true);

            }
        });
    });
</script>

<!-- script untuk menampilkan price dari raw material -->
<script type="text/javascript">
    <?php
    // echo $a;
    echo $y;
    echo $z;
    ?>

    function changeValue(id) {
        // document.getElementById('part_no').value = part_no[id].part_no;
        document.getElementById('price').value = price[id].price;
        document.getElementById('id_barang').value = id_barang[id].id_barang;

    };
</script>