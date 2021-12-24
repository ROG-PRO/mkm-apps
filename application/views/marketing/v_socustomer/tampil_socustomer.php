<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Log Book SOq
                        <!--| <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                        <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i></button></h1>-->

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
                <div class="col-12">


                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> <?= $title ?> list</h3>
                            <!-- <button style="float:right;" class="btn btn-outline-success btn-sm" data-toggle="collapse" data-target="#collapse<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i> New</button> -->

                        </div>

                        <div class="card-body">

                            <div id="collapse<?= $title ?>" class="panel-collapse collapse">
                                <div class="card card-secondary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-edit    "></i> Form Input Sales Order</h3>
                                    </div>
                                    <!--<form method="post" action="proseslogin.php">-->
                                    <form action="<?= base_url('marketing/socustomer/proses1') ?>" method="post" class="form-horizontal">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Input Data Sales Order</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="soInquiry" class="col-sm-2 control-label" style="text-align:right;">Pilih Inquiry</label>
                                                                <div class="col-sm-4">
                                                                    <select name="soInquiry" id="soCustomer" class="form-control">
                                                                        <option value="">-- Pilih Nomor Inquiry --</option>
                                                                        <?php foreach ($datainquiry as $inquiry) : ?>
                                                                            <option value="<?= $inquiry->id_inquiry ?>"><?= $inquiry->id_inquiry ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <label for="soPono" class="col-sm-2 control-label" style="text-align:right;">Nomor PO</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="soPono" class="form-control" id="soPono" placeholder="Nomor PO">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="soProject" class="col-sm-2 control-label" style="text-align:right;">Nama Project</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="soProject" class="form-control" id="soProject" placeholder="Nama Project">
                                                                </div>
                                                                <label for="soDelivery" class="col-sm-2 control-label" style="text-align:right;">Tanggal Delivery</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="soDelivery" class="form-control" id="soDelivery">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="soProcess" class="col-sm-2 control-label" style="text-align:right;">Jenis Proses</label>
                                                                <div class="col-sm-4">
                                                                    <select name="soProcess" id="soProcess" class="form-control">
                                                                        <option value="">-- Pilih proses --</option>
                                                                        <option value="M">Machining</option>
                                                                        <option value="F">Fabrication</option>
                                                                    </select>
                                                                </div>
                                                                <label for="soProduction" class="col-sm-2 control-label" style="text-align:right;">Jenis Produksi</label>
                                                                <div class="col-sm-4">
                                                                    <select name="soProduction" id="soProduction" class="form-control">
                                                                        <option value="">-- Pilih proses --</option>
                                                                        <option value="MP">Mass Pro</option>
                                                                        <option value="JO">Job Order</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Input Data Part Sales Order</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover" id="crud_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item Code</th>
                                                                            <th>Item Name</th>
                                                                            <th>Model No.</th>
                                                                            <th>Qty</th>
                                                                            <th>Unit</th>
                                                                            <th>Note</th>
                                                                            <th width="4%" align="center"> <button type="button" id="add" class="btn btn-primary btn-sm ">+</button></th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control" type="text" name="item_cd[]"></td>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control" type="text" name="item_nm[]"></td>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control" type="text" name="model_no[]"></td>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control " type="text" name="qty[]"></td>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control" type="text" name="unit[]"></td>
                                                                            <td><input style="font-size:12px;height:30px;" class="form-control" type="text" name="note[]"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="card-footer">
                                                <button style="float:right;" type="submit" name="" id="" class="btn btn-info">Next</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-sm" align="" id="data<?= $title ?>">
                                <thead class="thead-grey" align="left">
                                    <tr>
                                        <th>No</th>
                                        <th>Detail</th>
                                        <th>SO No</th>
                                        <th>SO Date</th>
                                        <th>Customer Name</th>
                                        <th>PO No.</th>
                                        <th>Project Name</th>
                                        <th>Delivery Date</th>
                                        <th>Is Approve</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($dataso as $row) : ?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td>
                                                <a href="<?= site_url('marketing/socustomer/d/' . strtolower($row->so_no)) ?>" class="btn btn-info btn-xs" data-id="<?= $row->so_no ?>"><i class="fa fa-search"></i></a>
                                            </td>
                                            <td><?= $row->so_no ?></td>
                                            <td><?= $row->so_date ?></td>
                                            <td><?= $row->customer_nm ?></td>
                                            <td><?= $row->so_pono ?></td>
                                            <td><?= $row->so_project ?></td>
                                            <td><?= $row->so_deliverydate ?></td>
                                            <td class="text-center">
                                                <?php if ($row->so_approved == "0") { ?>
                                                    <span class="badge bg-danger">Not Yet</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-success">Yes</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $n++;
                                    endforeach; ?>
                                </tbody>
                            </table>
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

<?php if ($this->session->flashdata('success') == TRUE) : ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $this->session->flashdata('success'); ?>'
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
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_cd[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='item_nm[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='model_no[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='qty[]' ></td>"
            html_code += "<td><input style='font-size:12px;height:30px;' class='form-control' type='text' name='unit[]' ></td>"
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

        $("#data<?= $title ?>").DataTable();

    });
</script>