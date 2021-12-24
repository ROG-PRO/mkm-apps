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

// $tot_tools_amount = $tools_amount;
// $tot_rm_amount = $rm_amount;
// $tot_process_amount = $process_amount;

?>




<!--- detail material start ----->
<!-- <div class="card card-success"> -->
<!-- <div class="card-header py-2">
        <h6 class="m-0 font-weight-bold " style="padding:0px;">Detail Material </h6>
    </div> -->

<div class="card-body">

    <form action="<?php echo site_url('engineering/estimationcost/jo_tambah_material') ?>" method="post" class="form-horizontal">
        <div class="form-row">
            <div class="form-group col-md-10">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Drawing</label>
                    <div class="col-sm-6">
                        <p>
                            <a onclick="window.open('<?= base_url('drawing/' . $detailInq['inq_drawing'] . '') ?> ','tes','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=870,height=700')" href="#" target="">rev_00</a> |
                            <a onclick="window.open('<?= base_url('drawing/' . $detailInq['inq_drawing_rev1'] . '') ?> ','tes','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=870,height=700')" href="#" target="">rev_01</a> |
                            <a onclick="window.open('<?= base_url('drawing/' . $detailInq['inq_drawing_rev2'] . '') ?> ','tes','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=870,height=700')" href="#" target="">rev_02</a> |
                            <a onclick="window.open('<?= base_url('drawing/' . $detailInq['inq_drawing_rev3'] . '') ?> ','tes','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=870,height=700')" href="#" target="">rev_03</a>
                        </p>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                    <div class="col-sm-6">
                        <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                        <input type="hidden" name="id_inquiry_detail" value="<?= $uri5 ?>">
                        <input type="hidden" name="inq_incld_mtl" value="<?= $detailInq['inq_incld_mtl'] ?>">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Inquiry Number</label>
                    <div class="col-sm-6">
                        <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Raw Material</label>
                    <div class="col-sm-4">
                        <select name="id_brg" id="id_barang" class="form-control  part_no" style="width: 100%;" onchange='changeValue(this.value)'>
                            <option selected="selected"></option>

                            <?php

                            $con = mysqli_connect("localhost", "root", "Mkm@3210_", "mkm_test");
                            $query = "SELECT *  from barang ";
                            $result = mysqli_query($con, $query);

                            $y          = "var price = new Array();\n;";
                            $z          = "var id_barang = new Array();\n;";

                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="id_barang" value="' . $row['id_barang'] . '">' . $row['part_no'] . '</option>';

                                $y .= "price['" . $row['id_barang'] . "'] = {price:'" . addslashes($row['price']) . "'};\n";
                                $z .= "id_barang['" . $row['id_barang'] . "'] = {id_barang:'" . addslashes($row['id_barang']) . "'};\n";
                            }
                            ?>


                        </select>
                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                        <input type="hidden" class="" name="" id="part_no">
                    </div>

                    <div class="col-sm-4">
                        <input style="border: 1px solid grey-light; " type="text" class="form-control " id="price" name="price" placeholder="Price">
                    </div>



                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label" name="" id="" style="text-align:right;">Material Type</label>
                    <div class="col-sm-4">
                        <select name="id_shape" id="id_shape" class="form-control " style="width: 100%;">
                            <option selected="selected">Pilih Jenis</option>
                            <option value="0">Round Bar</option>
                            <option Value="1">Block</option>
                        </select>
                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                        <input type="hidden" name="prod_type" value="<?= $uri6 ?>">
                        <input type="hidden" name="part_no" value="<?= $uri7 ?>">
                        <input type="hidden" name="id_inquiry_detail" value="<?= $uri5 ?>">
                    </div>
                </div>
                <!-- menu block -->
                <div class="form-group row" id="div_size">
                    <label id="lbl_size" for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Size</label>

                    <div class="col-sm-3" id="div_long">
                        <input style="margin:1px; border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="long" placeholder="Panjang" value="" name="long">
                    </div>

                    <div class="col-sm-3" id="div_lebar">
                        <input style="margin:1px;border: 1px solid grey-light;" type="text" name="width" class="form-control form-control-sm" id="lebar" placeholder="Lebar / Diamter" value="">
                    </div>


                    <div class="col-sm-3" id="div_tinggi" hidden>
                        <input style="margin:1px;border: 1px solid grey-light;" type="text" name="height" class="form-control form-control-sm" id="tinggi" placeholder="Tebal" value="" hidden>
                    </div>
                </div>

            </div>


        </div>




        <div class="card-footer ">
            <?php echo $detailInq['eng_approve'] == 1 ?
                '<button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm" disabled> Save</button>'
                :
                '<button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Save</button>';
            ?>
        </div>
    </form>



    <div class="table-responsive">

        <?php
        $data = $this->session->flashdata('sukses');
        if ($data != "") { ?>
            <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
        <?php } ?>

        <?php
        $data2 = $this->session->flashdata('error');
        if ($data2 != "") { ?>
            <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
        <?php } ?>

        <table class="table table-sm table-bordered " id="table penjualan" border=" 0">
            <thead>
                <tr>
                    <th style="vertical-align: middle;" rowspan="2">No</th>
                    <th style="vertical-align: middle;" rowspan="2">Inq. Part No</th>
                    <th style="vertical-align: middle;" rowspan="2">Bentuk</th>
                    <th style="vertical-align: middle;" rowspan="2">Material</th>

                    <th style="text-align: center;" align="center" colspan="3">Size</th>

                    <th style="vertical-align: middle;" rowspan="2">bobot</th>
                    <!-- <th style="vertical-align: middle;" rowspan="2">x</th> -->
                    <th style="vertical-align: middle;" rowspan="2">satuan</th>
                    <!-- <th style="vertical-align: middle;" rowspan="2">Qty</th> -->
                    <th style="vertical-align: middle;" rowspan="2">Price / kg</th>
                    <th style="vertical-align: middle;text-align: right;" rowspan="2">Tot. Amount</th>
                    <th style="vertical-align: middle;" rowspan="2">Action</th>

                </tr>

                <tr>

                    <th>Panjang</th>
                    <th>Lebar/Dia.</th>
                    <th>Tinggi</th>
                    <!-- <th>tot</th> -->

                </tr>

            </thead>
            <tfoot>
                <tr>
                    <td colspan="10" align="right">
                        <label>Grand Total</label>
                    </td>
                    <td align="right">
                        <?= number_format($mtl_amount, 0, ',', '.') ?>
                        <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                    </td>
                    <td></td>

                </tr>
            </tfoot>
            <tbody>

                <?php
                $no = 1;
                foreach ($detailmaterials as $row) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->inq_part_no; ?></td>
                        <td align="center"><?php
                                            if ($row->id_shape == 1) {
                                                echo '<i class="far fa-square"></i>';
                                            } else {
                                                echo '<i class="fas fa-circle"></i>';
                                            }   ?>

                        </td>
                        <td><?= $row->part_no; ?></td>

                        <td><?= $row->rm_long; ?></td>
                        <td><?= $row->rm_width; ?></td>
                        <td><?= $row->rm_height; ?></td>
                        <?php


                        $a = $row->rm_long;
                        $b = $row->rm_width;
                        $c = $row->rm_height;
                        if ($row->rm_height > '0') {
                            $tot = round($a * $b * $c * 7.85 / 1000000, 2);
                            $x = substr($tot, -1);
                            if ($x < 5) {
                                $bobot = round($tot + 0.1, 1);
                            } else {
                                $bobot = round($tot, 1);
                            }
                        } else {
                            $tot = round(3.14 * pow(($a / 2), 2) * $b * 7.85 / 1000000, 2);
                            $x = substr($tot, -1);
                            if ($x < 5) {
                                $bobot = round($tot + 0.1, 1);
                            } else {
                                $bobot = round($tot, 1);
                            }
                        }

                        // $value = 2.3333333333;
                        // $value = round ( $value, 2, PHP_ROUND_HALF_UP);
                        $hrg = $row->price_kg;
                        $tot_amount = $bobot * $hrg;

                        ?>
                        <!-- <td><?= $tot ?></td> -->
                        <td>
                            <?= $bobot ?>

                        </td>
                        <!-- <td><?= $x ?></td> -->
                        <td><?= $row->nm_unit; ?></td>
                        <!-- <td><?= $row->rm_qty; ?></td> -->
                        <td><?= number_format($row->price_kg, 0, ',', '.') ?>

                        </td>
                        <!--  <td width="120"><h4><span id="amount" class="amount">Rp. 0</span></h4></td> -->

                        <td width="120" align="right"><?= number_format($tot_amount, 0, ',', '.') ?>
                        </td>


                        <td width="60" align="center">

                            <a href="<?= base_url('engineering/estimationcost/jo_materials_estimation_edit/' . $row->id_rm . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/jo_delete_rm/' . $row->id_rm . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>')" href="#!" class=""><i style="color: red" class="fas fa-trash-alt"></i></a>
                        </td>


                    </tr>

                <?php endforeach ?>
            </tbody>



        </table>


        <!-- </div> -->
    </div>
</div>
<!--- process end --->








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