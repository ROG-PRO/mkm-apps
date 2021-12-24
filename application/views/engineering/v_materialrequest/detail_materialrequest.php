<style type="text/css">
    td {
        cursor: pointer;
    }

    .editor {
        display: none;
    }
</style>
<?php

date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");


$uri1 = $this->uri->segment('1');
$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');

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
                    <h1 class="m-0 text-dark">MR Detail
                    </div><!-- /.col -->
                    <div class="container col-sm-6">
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
                        <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>

                        </div>-->
                        <div class="card-body">

                            <!--  <div class="row">
                                <div class="col-12">
                                    <h4>Detail Calculation </h4>
                                </div>
                            </div> -->

                            <style>
                                td {
                                    padding: 5px;

                                }
                            </style>

                            <a class="btn btn-danger btn-sm" href="<?= base_url('engineering/materialrequest') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                            <a href="<?= base_url('engineering/materialrequest/print_mr/' . $uri4 . '') ?>" target='_blank' class="btn btn-primary btn-sm"><i class="fas fa-print"></i> </a>
                            <!-- <button class="btn btn-primary btn-sm" id="tambah-data"><i class="fa fa-plus-circle" aria-hidden="true"></i> </button> -->
                            <hr>

                            <div class="callout callout-success" style="background-color:#D7FCE9 ;">
                                <p>MR Detail</p>
                                <table class="table table-sm table-responsive" border="0">
                                    <?php

                                    foreach ($detailmr as $row) {

                                        ?>

                                        <tr>
                                            <td width="10%"><b>SO No</b></td>
                                            <td width="3%">:</td>
                                            <td width="25%"><?php echo $uri4 ?></td>
                                            <td width="10%"><b>Date</b></td>
                                            <td width="3%">:</td>
                                            <td><?= $row->mr_dt ?></td>
                                            <td width="10%"><b>MR Issued</b></td>
                                            <td width="3%">:</td>
                                            <td><?= $row->mr_created_by ?></td>
                                        </tr>

                                    <?php }
                                    ?>

                                </table>




                            </div>
                            <p><span class="badge badge-info" style="font-size: 17px;">Data Detail Raw material & Tools</span>
                            </p>
                            <div class="table-responsive">

                                <table class="table table-sm table-bordered" id="table-data" border=" 0">
                                    <thead>
                                        <tr>
                                            <th>SO No</th>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Supplier</th>
                                            <th>SOA</th>
                                            <th>Kode Jenis Mtl</th>
                                            <th width="8%" style="text-align: center;"><button style="float:;" class="btn btn-primary btn-sm" id="tambah-data"><i class="fa fa-plus-circle" aria-hidden="true"></i> </button></th>

                                        </tr>
                                    </thead>

                                    <!-- <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($detailpartmr as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++ ?></td>
                                                <td><?= $row->mr_item ?></td>
                                                <td><?= $row->mr_qty ?></td>
                                                <td><?= $row->mr_supplier ?></td>
                                                <td><?= $row->mr_soa ?></td>
                                                <td><?= $row->mtl_type_cd ?></td>
                                                <td align="center"><button class='btn btn-xs btn-danger btn-sm hapus-mr_part' data-id='$row->mr_detail_id' ><i class='far fa-trash-alt'></i></button></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody> -->

                                    <tbody id="table-body">
                                        <?php

                                        foreach ($detailpartmr as $row) {
                                            echo
                                            "<tr data-id='$row->mr_detail_id'> 

                                            <td>
                                            <span class='span-so_number caption' data-id='$row->mr_detail_id'>$row->so_number</span> 
                                            <input type='text' class='field-so_number form-control editor' value='$row->so_number' data-id='$row->mr_detail_id' />
                                            </td>
                                            <td>
                                            <span class='span-mr_item caption' data-id='$row->mr_detail_id'>$row->mr_item</span> 
                                            <input type='text' class='field-mr_item form-control editor' value='$row->mr_item' data-id='$row->mr_detail_id' />
                                            </td>
                                            <td>
                                            <span class='span-mr_qty caption' data-id='$row->mr_detail_id'>$row->mr_qty</span> 
                                            <input type='text' class='field-mr_qty form-control editor' value='$row->mr_qty' data-id='$row->mr_detail_id' />
                                            </td>
                                            <td>
                                            <span class='span-mr_supplier caption' data-id='$row->mr_detail_id'>$row->mr_supplier </span> 
                                            <input type='text' class='field-mr_supplier form-control editor' value='$row->mr_supplier' data-id='$row->mr_detail_id' />
                                            </td>
                                            <td>
                                            <span class='span-mr_soa caption' data-id='$row->mr_detail_id'>$row->mr_soa</span> 
                                            <input type='text' class='field-mr_soa form-control editor' value='$row->mr_soa' data-id='$row->mr_detail_id' />
                                            </td>
                                            <td>
                                            <span class='span-mtl_type_cd caption' data-id='$row->mr_detail_id'>$row->mtl_type_cd</span> 
                                            <input type='text' class='field-mtl_type_cd form-control editor' value='$row->mtl_type_cd' data-id='$row->mr_detail_id' />
                                            </td>

                                            <td align='center'>
                                            <button class='btn btn-xs btn-danger btn-sm hapus-mr_part' data-id='$row->mr_detail_id'><i class='far fa-trash-alt'></i></button>
                                            </td>
                                            </tr>";
                                        }


                                        ?>


                                    </tbody>

                                </table>

                            </div>

                            <p><span class="badge badge-info" style="font-size: 17px;">Data Others</span></p>
                            <div class="table-responsive">

                                <table class="table table-sm table-bordered" id="table-data" border=" 0">
                                    <thead>
                                        <tr>
                                            <th>SO No</th>
                                            <th>mr_descDetail</th>
                                            <th>mr_descPurpose</th>
                                            <th>mr_descRemark</th>
                                            <!-- <th>SOA</th>
                                                <th>Kode Jenis Mtl</th> -->
                                                <th width="8%" style="text-align: center;"><button style="float:;" class="btn btn-primary btn-sm" id="tambah-desc"><i class="fa fa-plus-circle" aria-hidden="true"></i> </button></th>

                                            </tr>
                                        </thead>

                                    <!-- <tbody>

                                        <?php
                                        $no = 1;
                                        foreach ($detailpartmr as $row) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++ ?></td>
                                                <td><?= $row->mr_item ?></td>
                                                <td><?= $row->mr_qty ?></td>
                                                <td><?= $row->mr_supplier ?></td>
                                                <td><?= $row->mr_soa ?></td>
                                                <td><?= $row->mtl_type_cd ?></td>
                                                <td align="center"><button class='btn btn-xs btn-danger btn-sm hapus-mr_part' data-id='$row->mr_detail_id' ><i class='far fa-trash-alt'></i></button></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody> -->

                                    <tbody id="table-bodyDesc">
                                        <?php

                                        foreach ($mrDesc as $row) {
                                            echo
                                            "<tr data-id='$row->mr_descID'> 

                                            <td>
                                            <span class='span-mr_descSO caption' data-id='$row->mr_descID'>$row->mr_descSO</span> 
                                            <input type='text' class='field-mr_descSO form-control editor' value='$row->mr_descSO' data-id='$row->mr_descID' />
                                            </td>
                                            <td>
                                            <span class='span-mr_descDetail caption' data-id='$row->mr_descID'>$row->mr_descDetail</span> 
                                            <input type='text' class='field-mr_descDetail form-control editor' value='$row->mr_descDetail' data-id='$row->mr_descID' />
                                            </td>
                                            <td>
                                            <span class='span-mr_descPurpose caption' data-id='$row->mr_descID'>$row->mr_descPurpose</span> 
                                            <input type='text' class='field-mr_descPurpose form-control editor' value='$row->mr_descPurpose' data-id='$row->mr_descID' />
                                            </td>
                                            <td>
                                            <span class='span-mr_descRemark caption' data-id='$row->mr_descID'>$row->mr_descRemark </span> 
                                            <input type='text' class='field-mr_descRemark form-control editor' value='$row->mr_descRemark' data-id='$row->mr_descID' />
                                            </td>


                                            <td align='center'>
                                            <button class='btn btn-xs btn-danger btn-sm hapus-mr_desc' data-id='$row->mr_descID'><i class='far fa-trash-alt'></i></button>
                                            </td>
                                            </tr>";
                                        }


                                        ?>


                                    </tbody>

                                </table>

                            </div>



                        </div>
                    </div>
                </div>
            </section>
        </div>



        <script type="text/javascript">
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }

            $(function() {

                $.ajaxSetup({
                    type: "post",
                    cache: false,
                    dataType: "json"
                })


                $(document).on("click", "td", function() {
                    $(this).find("span[class~='caption']").hide();
                    $(this).find("input[class~='editor']").fadeIn().focus();
                });


                $("#tambah-data").click(function() {
                    $.ajax({
                        url: "<?php echo base_url('engineering/materialrequest/add_mr_detail'); ?>",
                        success: function(a) {

                            var ele = "";
                            ele += "<tr data-id='" + a.id + "'>";
                            ele += "<td><span class='span-so_number caption'  Value='<?= $uri4 ?>' data-id='" + a.id + "'></span> <input type='text' class='field-so_number form-control editor' Value='<?= $uri4 ?>' data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_item caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_item form-control editor'  data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_qty caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_qty form-control editor'  data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_supplier caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_supplier form-control editor' data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_soa caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_soa form-control editor' data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mtl_type_cd caption' data-id='" + a.id + "'></span> <input type='text' class='field-mtl_type_cd form-control editor' data-id='" + a.id + "' /></td>";
                            ele += "<td align='center'><button class='btn btn-xs btn-danger btn-sm hapus-mr_part' data-id='" + a.id + "'><i class='far fa-trash-alt'></i></button></td>";
                            ele += "</tr>";

                            var element = $(ele);
                            element.hide();
                            element.prependTo("#table-body").fadeIn(1500);
                        }
                    });
                });

                $(document).on("keydown", ".editor", function(e) {
                    if (e.keyCode == 13) {
                        var target = $(e.target);
                        var value = target.val();
                        var id = target.attr("data-id");
                        var data = {
                            id: id,
                            value: value
                        };
                        if (target.is(".field-so_number")) {
                            data.modul = "so_number";
                        } else if (target.is(".field-mr_item")) {
                            data.modul = "mr_item";
                        } else if (target.is(".field-mr_qty")) {
                            data.modul = "mr_qty";
                        } else if (target.is(".field-mr_supplier")) {
                            data.modul = "mr_supplier";
                        } else if (target.is(".field-mr_soa")) {
                            data.modul = "mr_soa";
                        } else if (target.is(".field-mtl_type_cd")) {
                            data.modul = "mtl_type_cd";
                        }

                        $.ajax({
                            data: data,
                            url: "<?php echo base_url('engineering/materialrequest/update_mr_detail'); ?>",
                            success: function(a) {
                                target.hide();
                                target.siblings("span[class~='caption']").html(value).fadeIn();
                            }
                        })
                    }
                });

                $(document).on("click", ".hapus-mr_part", function() {
                    var id = $(this).attr("data-id");
                    swal({
                        title: "Hapus MR ID " + id,
                        text: "Yakin akan menghapus ini?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Delete",
                        closeOnConfirm: true,
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "<?php echo base_url('engineering/materialrequest/delete_mr_detail'); ?>",
                                method: "post",
                                data: {
                                    id: id
                                },
                                success: function() {
                                    $("tr[data-id='" + id + "']").fadeOut("fast", function() {
                                        $(this).remove();
                                    });
                                }
                            });
                        } else if (result.dismiss === swal.DismissReason.cancel) {
                            swal(
                                'Batal',
                                'Anda membatalkan penghapusan',
                                'error'
                                )

                        }
                    });

                });
            });
        </script>


        <!-- edit other -->
        <script type="text/javascript">
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }

            $(function() {

                $.ajaxSetup({
                    type: "post",
                    cache: false,
                    dataType: "json"
                })


                $(document).on("click", "td", function() {
                    $(this).find("span[class~='caption']").hide();
                    $(this).find("input[class~='editor']").fadeIn().focus();
                });


                $("#tambah-desc").click(function() {
                    $.ajax({
                        url: "<?php echo base_url('engineering/materialrequest/add_mr_desc'); ?>",
                        success: function(a) {

                            var ele = "";
                            ele += "<tr data-id='" + a.id + "'>";
                            ele += "<td><span class='span-mr_descSO caption'  Value='<?= $uri4 ?>' data-id='" + a.id + "'></span> <input type='text' class='field-mr_descSO form-control editor' Value='<?= $uri4 ?>' data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_descDetail caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_descDetail form-control editor'  data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_descPurpose caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_descPurpose form-control editor'  data-id='" + a.id + "' /></td>";
                            ele += "<td><span class='span-mr_descRemark caption' data-id='" + a.id + "'></span> <input type='text' class='field-mr_descRemark form-control editor' data-id='" + a.id + "' /></td>";
                       
                            ele += "<td align='center'><button class='btn btn-xs btn-danger btn-sm hapus-mr_desc' data-id='" + a.id + "'><i class='far fa-trash-alt'></i></button></td>";
                            ele += "</tr>";

                            var element = $(ele);
                            element.hide();
                            element.prependTo("#table-bodyDesc").fadeIn(1500);
                        }
                    });
                });

                $(document).on("keydown", ".editor", function(e) {
                    if (e.keyCode == 13) {
                        var target = $(e.target);
                        var value = target.val();
                        var id = target.attr("data-id");
                        var data = {
                            id: id,
                            value: value
                        };
                        if (target.is(".field-mr_descSO")) {
                            data.modul = "mr_descSO";
                        } else if (target.is(".field-mr_descDetail")) {
                            data.modul = "mr_descDetail";
                        } else if (target.is(".field-mr_descPurpose")) {
                            data.modul = "mr_descPurpose";
                        } else if (target.is(".field-mr_descRemark")) {
                            data.modul = "mr_descRemark";
                        }

                        $.ajax({
                            data: data,
                            url: "<?php echo base_url('engineering/materialrequest/update_mr_desc'); ?>",
                            success: function(a) {
                                target.hide();
                                target.siblings("span[class~='caption']").html(value).fadeIn();
                            }
                        })
                    }
                });

                $(document).on("click", ".hapus-mr_desc", function() {
                    var id = $(this).attr("data-id");
                    swal({
                        title: "Hapus MR ID " + id,
                        text: "Yakin akan menghapus ini?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Delete",
                        closeOnConfirm: true,
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "<?php echo base_url('engineering/materialrequest/delete_mr_desc'); ?>",
                                method: "post",
                                data: {
                                    id: id
                                },
                                success: function() {
                                    $("tr[data-id='" + id + "']").fadeOut("fast", function() {
                                        $(this).remove();
                                    });
                                }
                            });
                        } else if (result.dismiss === swal.DismissReason.cancel) {
                            swal(
                                'Batal',
                                'Anda membatalkan penghapusan',
                                'error'
                                )

                        }
                    });

                });
            });
        </script>