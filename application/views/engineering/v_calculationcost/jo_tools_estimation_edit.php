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

$tot_tools_amount = $tools_amount;
// $tot_rm_amount = $rm_amount;
// $tot_process_amount = $process_amount;

?>
<br />
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


                                <a href="<?= base_url('engineering/estimationcost/jo_tools_estimation/' . $uri5 . '/' . $uri6 . '/' . $uri7 . '/' . $uri8 . '') ?>" style="float: right;" class="btn btn-danger btn-sm"> X</a>
                            </h6>
                        </div>

                        <style>
                            td {
                                padding: 5px;

                            }
                        </style>

                        <br />

                        <div class="col-12">

                            <style>
                                fieldset {
                                    border: 1px solid #DDDDDD;
                                    display: inline-block;
                                    font-size: 12px;
                                    padding: 1em 2em;
                                    width: 100%;
                                }

                                legend {
                                    background: #BFD48C;
                                    color: #FFFFFF;
                                    margin-top: 15px;
                                    margin-bottom: 5px;
                                    padding: 1px 10px;
                                    width: fit-content;
                                    font-size: 14px;
                                }
                            </style>


                            <div class="col-12">




                                <!-- ./row -->
                                <div class="row">
                                    <div class="col-12 col-sm-12">




                                        <!-- === detail tools start == -->
                                        <div class="card card-warning">
                                            <div class="card-header py-2">
                                                <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="fas fa-pencil-alt"></i> Edit Detail Tools</h6>
                                            </div>
                                            <form action="<?php echo site_url('engineering/estimationcost/jo_edit_tools') ?>" method="post" class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-row">


                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Tanggal</label>
                                                                <div class="col-sm-6">
                                                                    <input style="border: 1px solid grey-light; " disabled type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Tanggal" value="<?php echo date("Y-m-d H:i:s");  ?>">
                                                                </div>
                                                            </div>
                                                            <div class=" form-group row">
                                                                <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Tool Code</label>
                                                                <div class="col-sm-8">
                                                                    <select name="id_barang" id="id_barang" class="form-control partnm" style="width: 100%;" onchange='changeValue(this.value)'>
                                                                        <option selected="selected"></option>
                                                                        <?php
                                                                        // foreach ($tools as $row) {
                                                                        //     echo '<option name="id_barang" value="' . $row->id_barang . '">' . $row->part_no . '</option>';
                                                                        // }
                                                                        $con = mysqli_connect("localhost", "root", "mySQL", "mkm_test");
                                                                        $query = "SELECT *  from barang where id_kategori in('199','200')";
                                                                        $result = mysqli_query($con, $query);
                                                                        $x          = "var price = new Array();\n;";
                                                                        $y          = "var part_nm = new Array();\n;";
                                                                        $z          = "var id_barang = new Array();\n;";

                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                            // echo '<option  value="' . $row['id_barang'] . '">' . $row['part_no'] . '</option>';
                                                                            echo "<option value='" . $row['id_barang'] . "'";
                                                                            echo $row['id_barang'] ==  $detailtoolsedit['id_barang'] ? 'selected' : '';
                                                                            echo ">" . $row['part_no'] . "</option>";
                                                                            $x .= "price['" . $row['id_barang'] . "'] = {price:'" . addslashes($row['price']) . "'};\n";
                                                                            $y .= "part_nm['" . $row['id_barang'] . "'] = {part_nm:'" . addslashes($row['part_nm']) . "'};\n";
                                                                            $z .= "id_barang['" . $row['id_barang'] . "'] = {id_barang:'" . addslashes($row['id_barang']) . "'};\n";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type="hidden" class="form-control" name="update_dt" id="" value="<?php echo date("YmdHis"); ?>">
                                                                    <input type="hidden" class="form-control" name="update_by" id="" value="<?php echo $user ?>">
                                                                    <input type="hidden" name="prod_type" value="<?= $uri7 ?>">
                                                                    <input type="hidden" name="part_no" value="<?= $uri8 ?>">
                                                                    <input type="hidden" name="id_inquiry" value="<?= $uri5 ?>">
                                                                    <input type="hidden" name="id_inquiry_detail" value="<?= $uri6 ?>">
                                                                    <input type="hidden" name="id_tool" value="<?= $uri4 ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Cost</label>
                                                                <div class="col-sm-6">
                                                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" value="<?= $detailtoolsedit['tool_price'] ?>" name="price" id="price" placeholder="Price">
                                                                </div>
                                                            </div>

                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry Number</label>
                                                                <div class="col-sm-6">
                                                                    <input style="border: 1px solid grey-light; " value="<?= $detailtoolsedit['id_inquiry'] ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Tool Name</label>
                                                                <div class="col-sm-6">
                                                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" name="part_nm" id="part_nm" value="<?= $detailtoolsedit['tool_nm'] ?>" placeholder="Tool name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4 col-form-label" name="tool_qty" style="text-align:right;">Life time</label>
                                                                <div class="col-sm-4">
                                                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="qty" name="tool_qty" value="<?= $detailtoolsedit['tool_qty'] ?>" placeholder="Quantity">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    pcs / tools
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-footer ">

                                                    <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Update</button>
                                                </div>
                                            </form>
                                        </div>



                                        <!--- tool end --->


                                    </div>
                                </div>
                            </div>
    </section>
</div>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<script>
    $(document).ready(function() {
        $(".partnm").select2({
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

<script type="text/javascript">
    <?php
    echo $x;
    echo $y;
    echo $z; ?>

    function changeValue(id) {
        document.getElementById('price').value = price[id].price;
        document.getElementById('part_nm').value = part_nm[id].part_nm;
        document.getElementById('id_barang').value = id_barang[id].id_barang;
    };
</script>