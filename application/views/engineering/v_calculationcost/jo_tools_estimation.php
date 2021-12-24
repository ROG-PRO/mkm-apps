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

<div class="col-12">



    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">



            <!-- Detail tools -->
            <!-- <div class="card card-success"> -->
            <!-- <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Tools</h6>
                </div> -->
            <div class="card-body">
                <form action="<?php echo site_url('engineering/estimationcost/jo_tambah_tools') ?>" method="post" class="form-horizontal">
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
                                        $con = mysqli_connect("localhost", "root", "Mkm@3210_", "mkm_test");
                                        $query = "SELECT *  from barang where id_kategori in('199','200')";
                                        $result = mysqli_query($con, $query);
                                        $x          = "var price = new Array();\n;";
                                        $y          = "var part_nm = new Array();\n;";
                                        $z          = "var id_barang = new Array();\n;";

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option  value="' . $row['id_barang'] . '">' . $row['part_no'] . '</option>';
                                            $x .= "price['" . $row['id_barang'] . "'] = {price:'" . addslashes($row['price']) . "'};\n";
                                            $y .= "part_nm['" . $row['id_barang'] . "'] = {part_nm:'" . addslashes($row['part_nm']) . "'};\n";
                                            $z .= "id_barang['" . $row['id_barang'] . "'] = {id_barang:'" . addslashes($row['id_barang']) . "'};\n";
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                                    <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
                                    <input type="hidden" name="prod_type" value="<?= $uri6 ?>">
                                    <input type="hidden" name="part_no" value="<?= $uri7 ?>">
                                    <input type="hidden" name="id_inquiry_detail" value="<?= $uri5 ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label" style="text-align:right;">Cost</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" name="price" id="price" placeholder="Price">
                                </div>
                            </div>

                        </div>



                        <div class="form-group col-md-6">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Inquiry Number</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " value="<?= $uri4 ?>" type="text" name="id_inquiry" class="form-control form-control-sm" id="id_inquiry" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Tool Name</label>
                                <div class="col-sm-6">
                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" name="part_nm" id="part_nm" placeholder="Tool name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label" name="tool_qty" style="text-align:right;">Life time</label>
                                <div class="col-sm-4">
                                    <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="qty" name="tool_qty" placeholder="Quantity">
                                </div>
                                <div class="col-sm-2">
                                    pcs / tools
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer ">
                        <?= $detailInq['eng_approve'] == 1 ?
                            '<button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm" disabled> Save</button>' :
                            '<button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-success btn-sm"> Save</button>';
                        ?>
                    </div>
                </form>
                <!-- </div> -->

                <div class="table-responsive">

                    <table class="table table-sm table-bordered " id="table" border=" 0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Part No</th>
                                <th>Part name</th>
                                <th>Unit</th>
                                <th>Life time</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="6" align="right">
                                    <label>Grand Total</label>
                                </td>
                                <td align="right">

                                    <?= number_format($tot_tools_amount, 0, ',', '.') ?>

                                </td>
                                <td></td>

                            </tr>
                        </tfoot>

                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($detailtools as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->part_no; ?></td>
                                    <!-- <td><?= $row->id_inquiry; ?></td> -->
                                    <td><?= $row->part_nm; ?></td>
                                    <td><?= $row->nm_unit; ?></td>
                                    <td><?= $row->tool_qty; ?></td>
                                    <td><?= $row->price; ?></td>
                                    <td width="120" align="right"><?= number_format($row->tot_amount, 0, ',', '.'); ?></td>
                                    <td width="60" align="center">
                                        <a href="<?= base_url('engineering/estimationcost/jo_tools_estimation_edit/' . $row->id_tool . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/jo_delete_tool/' . $row->id_tool . '/' . $row->id_inquiry . '/' . $row->id_inquiry_detail . '/' . $uri6 . '/' . $uri7) ?>')" href="#!" class=""><i class="fas fa-trash-alt" style="color:red;"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>


                </div>
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