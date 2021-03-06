<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');

$tot_tools_amount = $tools_amount;
$tot_rm_amount = $rm_amount;
$tot_process_amount = $process_amount;

?>

<div class="col-10">



    <!-- ./row -->
    <div class="row">
        <div class="col-12 col-sm-12">



            <!-- Detail tools -->
            <div class="card card-secondary">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold " style="padding:0px">Detail Tools</h6>
                </div>
                <form action="<?php echo site_url('engineering/estimationcost/mp_tambah_tools') ?>" method="post" class="form-horizontal">
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
                                    <label for="inputPassword3" class="col-sm-3 col-form-label" style="text-align:right;">Tool Name</label>
                                    <div class="col-sm-8">
                                        <select name="id_barang" id="part_nm" class="form-control part_nm" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php



                                            foreach ($tools as $row) {
                                                echo '<option name="id_barang" value="' . $row->id_barang . '">' . $row->part_no . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="created_dt" id="created_dt" value="<?php echo date("YmdHis"); ?>">
                                        <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo $user ?>">
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
                                    <label for="" class="col-sm-4 col-form-label" name="tool_qty" style="text-align:right;">Life time</label>
                                    <div class="col-sm-4">
                                        <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="qty" name="tool_qty" placeholder="Quantity"> 
                                    </div>
                                    <div class="col-sm-4">
                                        pcs / tools
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer ">

                        <button style="float:right;width:100px;" type="submit" value="Save" class="btn  btn-secondary btn-sm"> save</button>
                    </div>
                </form>
            </div>

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
                            <td align="right" >
                                <?= $tot_tools_amount ?>
                                <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
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
                                <td><?= $row->part_nm; ?></td>
                                <td><?= $row->nm_unit; ?></td>
                                <td><?= $row->tool_qty; ?></td>
                                <td align="right"><?= $row->price; ?></td>
                                <td align="right" width="120"><?= $row->tot_amount; ?></td>
                                <td width="60" align="center">

                                    <a onclick="deleteConfirm(' <?php echo site_url('engineering/estimationcost/mp_delete_tool/' . $row->id_tool . '/' . $row->id_inquiry) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>

                <!-- <table class="table table-sm table-bordered " width="100%">


                    <tr>
                        <td align="right" style=" padding-right:10px;background-color:#DBDBDB">
                            <b>Grand Total</b>
                        </td>

                        <td width="180" style=" padding-left:10px;">
                            <?= $tot_tools_amount ?>
                        </td>
                    </tr>

                </table> -->

            </div>

            <!--- tool end --->


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
                    <span aria-hidden="true">??</span>
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
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
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

