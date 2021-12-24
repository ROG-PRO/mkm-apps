<!-- script untuk mencegah collapse tertutup ketika refresh -->
<script>
    $(function() {
        // store a reference to the collapse div so that 
        // we don't have to keep looking it up in the dom
        const collapseExample = $("#collapsewithoutInquiry");

        // register a callback function to the collapse div that
        // will be called every time the collapse is opened.
        collapseExample.on("shown.bs.collapse", function() {
            // since we know that that this function is called on
            // open, we'll set the localStorage value to "show" 
            localStorage.setItem("collapsewithoutInquiry", "show");
        });

        // register a callback function to the collapse div that
        // will be called every time the collapse is closed.
        collapseExample.on("hidden.bs.collapse", function() {
            // since we know that that this function is called on
            // open, we'll set the localStorage value to "hide" 
            localStorage.setItem("collapsewithoutInquiry", "hide");
        });

        // Since this function runs on page load (meaning only once), we can
        // check the value of localStorage from here and then call the
        // bootstrap collapse methods ourselves:

        // Check the value of the localStorage item
        const showExampleCollapse = localStorage.getItem("collapsewithoutInquiry");

        // Manipulate the collapse based on the value of the localStorage item.
        // Note that the value is determined by lines 36 or 44. If you change those,
        // then make sure to check that the comparison on the next line is still valid.
        if (showExampleCollapse === "show") {
            collapseExample.collapse("show");
        } else {
            collapseExample.collapse("hide");
        }
    });
</script>
<!-- end -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Issued PPB </li>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item active">Issued PPB</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $user = $this->session->userdata('user_logged')->username;
    $today = date("Y-m-d ");

    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- <div id="collapse<?= $title ?>" class="panel-collapse collapse"> -->
                    <div class="card card-success card-outline">
                        <div class="card-header py-2">

                            <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="fas fa-list"></i> PPB List</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-header py-2">
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#collapsewithInquiry"><i class="far fa-edit"></i> Issued PPB with MR reference</button>
                                            <!-- <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="far fa-edit"></i> Input Data PO</h6> -->
                                        </div>
                                        <div id="collapsewithInquiry" class="panel-collapse collapse">
                                            <!-- <form action="<?= base_url('marketing/pocustomer/input') ?>" method="post" class="form-horizontal"> -->
                                            <form action="<?= base_url('planner/issuedppb/input') ?>" method="post" class="form-horizontal">
                                                <div class="card-body">
                                                    
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" style="text-align:right;" class="col-sm-2 col-form-label">MR Number</label>
                                                        <div class="col-sm-3">

                                                            <select name="mr_no" id="mr_no" class="form-control select2" required style="width: 100%;" onchange='changeValue(this.value)'>
                                                                <option selected="selected">Please select</option>
                                                                <?php

                                                                $a          = "var mr_no = new Array();\n;";
                                                                $b          = "var so_number = new Array();\n;";
                                                                // $c          = "var type_process = new Array();\n;";

                                                                foreach ($sono as $row) {
                                                                    echo '<option name="mr_no" value="' . $row->mr_no . '">' . $row->mr_no . '</option>';
                                                                    $a .= "mr_no['" . $row->mr_no . "'] = {mr_no:'" . addslashes($row->mr_no) . "'};\n";
                                                                    $b .= "so_number['" . $row->mr_no . "'] = {so_number:'" . addslashes($row->so_number) . "'};\n";
                                                                    // $c .= "type_process['" . $row->id_inquiry . "'] = {type_process:'" . addslashes($row->type_process) . "'};\n";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="so_number" class="col-sm-2 col-form-label" style="text-align:right;">SO number</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="so_number" class="form-control" id="so_number" placeholder="So Number" required>
                                                        </div>
                                                    </div>
                                                        <!--<label for="poDelivery" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal Delivery</label>
                                                        <div class="col-sm-3">
                                                            <input type="date" name="poDelivery" class="form-control" id="poDelivery" required>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="card-footer">
                                                    <button style="float:right;margin: 0;" type="submit" name="" id="" class="btn btn-success ">Next <i class="fas fa-angle-double-right"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>



                                    <div class="card card-default">
                                        <div class="card-header py-2">
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#collapsewithoutInquiry"><i class="far fa-edit"></i> Issued PPB without SO reference </button>
                                            <!-- <h6 class="m-0 font-weight-bold " style="padding:0px"><i class="far fa-edit"></i> Input Data PO</h6> -->
                                        </div>
                                        <div id="collapsewithoutInquiry" class="panel-collapse collapse">
                                            <!-- <form action="<?= base_url('planner/pocustomer/addpodetail') ?>" method="post" class="form-horizontal"> -->
                                            <form action="<?= base_url('planner/issuedppb/addppbdetail') ?>" method="post" class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="callout callout-success" style="background: #DAF5DC;padding: 0px">
                                                        <div class="card-body">


                                                            <div class="form-row">

                                                                <div>
                                                                    <input type="hidden" class="form-control" name="pod_createdby" id="pod_createdby" value="<?php echo $user ?>">
                                                                    <label></label>
                                                                    <input type="hidden" class="form-control" name="pod_created" id="pod_created" value="<?php echo $today ?>">
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="id_inquiry">Part no</label>
                                                                    <!-- <input type="text" class="form-control " name="pod_itemcode" id="pod_itemcode" value="" placeholder="Part no" required> -->
                                                                    <select name="pod_itemcode" id="part_no" class="form-control select2" style="width: 100%;" onchange='changeValue(this.value)'>
                                                                        <option selected="selected">Please select</option>
                                                                        <?php

                                                                        $z          = "var part_no = new Array();\n;";
                                                                        $y          = "var part_nm = new Array();\n;";
                                                                        $x         = "var nm_unit = new Array();\n;";
                                                                        $w          = "var product_price = new Array();\n;";



                                                                        foreach ($product as $row) {
                                                                            echo '<option name="part_no" value="' . $row->part_no . '">' . $row->part_no . '</option>';
                                                                            $z .= "part_no['" . $row->part_no . "'] = {part_no:'" . addslashes($row->part_no) . "'};\n";
                                                                            $y .= "part_nm['" . $row->part_no . "'] = {part_nm:'" . addslashes($row->part_nm) . "'};\n";
                                                                            $x .= "nm_unit['" . $row->part_no . "'] = {nm_unit:'" . addslashes($row->nm_unit) . "'};\n";
                                                                            $w .= "product_price['" . $row->part_no . "'] = {product_price:'" . addslashes($row->product_price) . "'};\n";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="id_inquiry">Part name</label>
                                                                    <input type="text" class="form-control " name="pod_itemname" id="part_nm" placeholder="Part name" required>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="Quantity">Price</label>
                                                                    <input type="text" class="form-control" name="pod_price" id="product_price" required placeholder="Price">
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <label for="Quantity">Unit</label>
                                                                    <input type="text" class="form-control" name="pod_unit" id="nm_unit" required placeholder="Unit">
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <label for="Quantity">Quantity</label>
                                                                    <input type="text" class="form-control" name="pod_qty" id="qty" required placeholder="Quantity">
                                                                </div>
                                                                <!-- <div class="form-group col-md-2">
                                                                    <label for="Quantity">Unit</label>
                                                                    <select name="pod_unit" id="pod_unit" class="form-control " required>
                                                                        <option value="">- Pilih Satuan -</option>
                                                                        <?php
                                                                        foreach ($unit as $row) {
                                                                            echo "<option value='" . $row->nm_unit . "'>" . $row->nm_unit . "</option>";
                                                                        }

                                                                        ?>

                                                                    </select>
                                                                </div> -->
                                                                <!-- <div class="form-group col-md-2">
                                                                        <label for="poDelivery">Delivery Date</label>
                                                                        <input type="date" name="poDelivery" class="form-control" id="poDelivery" required>
                                                                    </div>  -->

                                                                <div class="form-group col-md-1">
                                                                    <label for="">&nbsp;</label>
                                                                    <button type="submit" class="form-control btn btn-primary btn-sm "> <i class="fas fa-plus-circle"></i> Add </button>
                                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="card card-default card-outline">
                                        <!-- <div class="card-header py-2">
                                            <h6 class="m-0 font-weight-bold ">
                                                <!-- <button style="float: right;margin-right: 5px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload  "></i>  .csv</button> -->
                                                <!-- <a href="<?= base_url('marketing/inquiry/templete_inquiry') ?>" style="float: right;" class="btn btn-secondary ">
                                                    <font style="color:#4A4343"><i class="fas fa-download  "></i> Templete</font>
                                                </a>
                                                <?php echo form_open_multipart($action); ?>
                                                <input style="float: right;margin-right: 5px;" type="file" name="inquiry" accept="text/csv" class="btn btn-secondary btn-sm">
                                                <input style="float: right;margin-right: 5px;" type="submit" Value="Import" name="import" class="btn btn-secondary">
                                                <?php echo form_close(); ?> --
                                                Detail part
                                            </h6>
                                        </div> -->
                                        <div class="card-body">
                                            <form action="<?= base_url('marketing/pocustomer/addpo_noinquiry') ?>" method="post" class="form-horizontal">
                                                <div class="form-row">

                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" style="text-align:right;" class="col-sm-4 col-form-label">Cust. CD</label>
                                                                    <div class="col-sm-4">

                                                                        <select name="po_custcode" id="customer_cd" class="form-control select2" style="width: 100%;" onchange='changeValue(this.value)'>
                                                                            <option selected="selected">Please select</option>
                                                                            <?php

                                                                            $d          = "var customer_cd = new Array();\n;";
                                                                            $e          = "var customer_nm = new Array();\n;";
                                                                            $f          = "var customer_cd2 = new Array();\n;";

                                                                            foreach ($customer as $row) {
                                                                                echo '<option name="customer_cd" value="' . $row->customer_cd . '">' . $row->customer_cd . '</option>';
                                                                                $d .= "customer_cd['" . $row->customer_cd . "'] = {customer_cd:'" . addslashes($row->customer_cd) . "'};\n";
                                                                                $e .= "customer_nm['" . $row->customer_cd . "'] = {customer_nm:'" . addslashes($row->customer_nm) . "'};\n";
                                                                                $f .= "customer_cd2['" . $row->customer_cd . "'] = {customer_cd2:'" . addslashes($row->customer_cd2) . "'};\n";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- <div class="col-sm-4">
                                                                        <input disabled type="text" class="form-control control-sm" id="customer_cd2" name="cust_cd2" placeholder="Customer cd" value="">
                                                                    </div> -->
                                                                </div>
                                                                <!-- <div class="form-group row">
                                                                    <label for="inputEmail3" style="text-align:right;" class="col-sm-4 col-form-label">Customer</label>
                                                                    <div class="col-sm-8">
                                                                        <input disabled type="text" class="form-control control-sm" id="customer_nm" name="cust_nm" placeholder="Customer Name" value="">
                                                                    </div>
                                                                </div> -->
                                                                <div class=" form-group row">
                                                                    <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">PO No.(by Cust.)</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="po_pono" name="po_pono" placeholder="Po Number">
                                                                    </div>
                                                                </div>

                                                                <div class=" form-group row">
                                                                    <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Project Name</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="po_project" name="po_project" placeholder="Project Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Informasion by</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="information_by" id="information_by" class="form-control" required="required">
                                                                            <option value="" disabled selected>Please select</option>
                                                                            <option value="Telp">Telp</option>
                                                                            <option value="Email">Email</option>
                                                                            <option value="Reff">Ref</option>
                                                                        </select>
                                                                    </div>


                                                                    <div class="col-sm-4" id="div_from" hidden>
                                                                        <input type="text" class="form-control" id="from" placeholder="from" name="email_from" value="" hidden>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" id="nm_contact" placeholder="Contact name" name="nm_contact" value="" hidden>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row" id="div_email" hidden>
                                                                    <label for="inputEmail3" id="lbl_email" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Email</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="email" placeholder="email" name="email" value="" hidden>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row" id="div_telp">
                                                                    <label for="inputEmail3" id="lbl_no_telp" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Telp</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="no_telp" placeholder="No Telp" name="no_telp" value="" hidden>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" id="lbl_reff" class="col-sm-4 col-form-label" style="text-align:right;" hidden>Reference</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="nm_reff" placeholder="Reference" name="nm_reff" value="" hidden>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                            <div>
                                                                <input type="hidden" class="" name="receive_cd" id="receive_cd" value="<?php echo date("YmdHis"); ?>">
                                                                <input type="hidden" class="" name="created_by" id="created_by" value="<?php echo $user ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">

                                                                <!-- <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Created by</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" value="<?= $user ?>" placeholder="Supplier">
                                                                    </div>
                                                                </div> -->
                                                                <div class="form-group row">
                                                                    <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Delivery Date</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="date" value="<?= $today ?>" class="form-control" name="po_delivdate" id="poDelivery" placeholder="Date">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Process Type</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="po_jproses" id="po_jproses" class="form-control" required="required">
                                                                            <option value="" disabled selected>Please select</option>
                                                                            <option value="M">Machining</option>
                                                                            <option value="F">Fabrication</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-4 col-form-label" style="text-align:right;">Production Type</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="po_jprod" id="po_jprod" class="form-control" required="required">
                                                                            <option value="" disabled selected>Please select</option>
                                                                            <option value="JO">Job Order</option>
                                                                            <option value="MP">Mass Pro</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword3" class="col-sm-4 col-form-label" style="text-align:right;">Note</label>
                                                                    <div class="col-sm-6">
                                                                        <textarea type="text" class="form-control" name="inquiry_note" id="inputPassword3" placeholder="Note"></textarea>
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
                                                                        <th>Harga</th>
                                                                        <th>created by</th>
                                                                        <th>created dt</th>
                                                                        <th>Action</th>

                                                                    </tr>
                                                                </thead>

                                                                <tbody>

                                                                    <?php
                                                                    if (isset($podetail)) {
                                                                        $no = 1;
                                                                        foreach ($podetail as $row) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?= $no++; ?></td>
                                                                                <td><?= $row['pod_itemcode']; ?></td>
                                                                                <td><?= $row['pod_itemname'] ?></td>
                                                                                <td><?= $row['pod_unit'] ?></td>
                                                                                <td><?= $row['pod_qty']; ?></td>
                                                                                <!-- <td><?= $row['pod_qty']; ?></td> -->
                                                                                <td><?= $row['pod_price']; ?></td>
                                                                                <!-- <td><a href="<?= base_url('drawing/' . $row['inq_drawing'] . ' ') ?>"><?= $row['inq_drawing']; ?></a></td> -->
                                                                                <td><?= $row['pod_createdby']; ?></td>
                                                                                <td><?= $row['pod_created']; ?></td>

                                                                                <td width="4%" align="center">

                                                                                    <a onclick="deleteConfirm(' <?php echo site_url('marketing/pocustomer/hapuspodetail/' . $row['pod_id']) ?>')" href="#!" class=""><i class="fas fa-trash"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                    <?php }
                                                                    } ?>

                                                                </tbody>
                                                            </table>

                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                        <div class="card-footer">
                                            <button style="float:right;margin: 0;" type="submit" name="" id="" class="btn btn-success btn-sm"> Save </button>
                                        </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-sm" align="" id="data<?= $title ?>">
                        <thead class="thead-grey" align="left">
                            <tr>
                                <th>No</th>
                                <th width="5%" align="center">Detail</th>
                                <th>PPB No.</th>
                                <th>Section</th>
                                <th>Request by</th>
                                <th>Request date</th>
                                <th>Doc. Number</th>
                                <th>SO Number</th>
                                <th>Customer</th>
                                <th>PO. Number</th>
                                <th>Status Approval</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
    </section>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-logout" class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('success') == TRUE) : ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Input berhasil!'
            })
        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function() {
        var count = 1;
        $('#add').click(function() {
            count = count + 1;
            var
                html_code = "<tr id='row" + count + "'>";
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='pocustomer_no[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='id_inquiry[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' id='customer_cd' name='customer_cd[]' ></td>"
            //html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='customer_nm[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_cd[]' ></td>"
            //html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_nm[]' ></td>"
            //html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='model_no[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='qty[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='nm_unit[]' ></td>"
            //html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' value='<?= $user ?>' name='created_by[]' ></td>"
            //html_code += "<td><input class='form-control' type='hidden' name='created_dt[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='note[]' ></td>"
            html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-sm remove'>X</button></td>";
            html_code += "</tr>";
            $('#crud_table').append(html_code);
        });

        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });


    });
</script>



<script>
    $(document).ready(function() {
        $("#part_no").select2({
            placeholder: "Please Select",
            //allowClear: true,
            theme: 'bootstrap4'
        });

    });
</script>

<script type="text/javascript">
    <?php

    echo $a;
    echo $b;
  
    ?>

    function changeValue(id) {
        document.getElementById('mr_no').value = mr_no[id].mr_no;
        document.getElementById('so_number').value = so_number[id].so_number;
     
    };
</script>



<script src="<?= base_url('assets/jquery/jquery-1.10.2.min.js') ?>"></script>



<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>