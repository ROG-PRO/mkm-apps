<?php
$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Estimation Cost
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
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $user = $this->session->userdata('user_logged')->fullname;
    $today = date("Y-m-d H:i:s");

    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <!--<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i> upload csv</button></h1><br />-->

                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-calculator" aria-hidden="true"></i> Estimation Cost List</h3>

                        </div>
                        <div class="card-body">


                            <table class="table table-striped table-bordered table-sm" align="" id="data<?= $title ?>">
                                <thead class="thead-grey" align="left">
                                    <tr>
                                        <th width="3%" style="text-align: center;">No.</th>
                                        <th width="5%" style="text-align: center;">Detail</th>
                                        <th><i class="fas fa-key "></i> Inquiry No.</th>
                                        <th>Inq. Status</th>
                                        <th>Inq. Note</th>
                                        <th>Prod Type</th>
                                        <!-- <th><i class="fas fa-paperclip"></i> Drawing</th> -->
                                        <!-- <th width="8%">Tools cost</th>-->
                                        <th>Progress</th>
                                        <!--<th>Process Cost</th> -->
                                        <!-- <th>Packing Cost</th>
                                        <th>Transportation Cost</th>
                                        <th>Total Cost</th> -->
                                        <th>Status</th>
                                        <!--<th>Create date</th>-->
                                        <th>Description</th>
                                        <th>Calculate by</th>
                                        <th>Calculate dt</th>
                                        <!-- <th>Action</th> -->
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

<script>
    $(document).ready(function() {
        var count = 1;
        $('#add').click(function() {
            count = count + 1;
            var
                html_code = "<tr id='row" + count + "'>";
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='pocustomer_no[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' id='customer_cd' name='customer_cd[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='customer_nm[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_cd[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_nm[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='model_no[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='qty[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='nm_unit[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' value='<?= $user ?>' name='created_by[]' ></td>"
            html_code += "<td><input class='form-control' type='hidden' name='created_dt[]' ></td>"
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
        $("#nm_unit").select2({
            placeholder: "Please Select",
            //allowClear: true,
            theme: 'bootstrap4'
        });

    });
</script>