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
                    <h1 class="m-0 text-dark">Inquiry Detail
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



                    <div class="card card-success card-outline">
                        <!--<div class="card-header">
                                <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Estimation Cost List</h3>
                                
                            </div>-->
                        <div class="card-body">
                            <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i> upload csv</button></h1><br /> -->
                            <A href="<?= base_url('marketing/inquiry/inquiry_detail/' . $uri4 . '') ?>" class="btn btn-danger btn-sm" style="float:right;"> X</A>
                            <?php foreach ($detailinquiry as $row) {
                                if ($row->eng_approve == 1) { ?>
                                    <button class="btn btn-success btn-sm" id="tambah-data" disabled><i class="fa fa-plus-circle" aria-hidden="true"></i> Add item</button>
                                    <button class=" btn btn-success btn-sm" disabled><i class="fas fa-window-close"></i> Cancel Inquiry </Button>
                                <?php } else { ?>
                                    <button class="btn btn-success btn-sm" id="tambah-data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add item</button>
                                    <a onclick="return confirm('Yakin mau hapus inquiry')" href="<?= base_url('marketing/inquiry/hapusinquiry/' . $row->id_inquiry . '') ?>" class="btn btn-danger btn-sm" id=""><i class="fas fa-trash-alt    "></i> Delete Inquiry</a>
                                    <!-- <A onclick="return confirm('Yakin mau cancel Inquiry')" href="<?= base_url('marketing/inquiry/cancelinquiry/' . $uri4 . '') ?>" class="btn btn-danger btn-sm" style="float: right;"><i class="fas fa-window-close"></i> Cancel Inquiry </A> -->
                                    <!-- <button class='btn btn-danger btn-sm cancel-inquiry' id='id' data-toggle='modal' data-id="<?= $uri4 ?>"><i class='fas fa-trash-alt'></i></button> -->
                            <?php }
                            } ?>
                            <HR>
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
                            <!-- <button class='btn btn-primary btn-sm create-quotation' data-toggle='modal'  data-target="#modal-quo "><i class='fas fa-edit'></i> Create Quotation
                            </button>
                            <a href="<?= base_url('marketing/inquiry/print_quotation/' . $uri4 . '') ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print Quotation</a> 
                            <a class="btn btn-danger btn-sm" href="<?= base_url('marketing/inquiry') ?>" style="text-decoration:none;color:white;"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                            <hr> -->

                            <div class="callout callout-warning" style="background-color:bisque ;">
                                <table class="table table-sm table-responsive" style="margin:1px; font-size:13px; " width="80%" border="0">
                                    <?php
                                    if (isset($detailinquiry)) {
                                        foreach ($detailinquiry as $row) {

                                            if ($row->information_by == 'Telp') {
                                                $label = 'Telp No.';
                                                $label2 = 'Contact Name';
                                                $value = $row->no_telp;
                                                $value2 = $row->nm_contact;
                                            } else if ($row->information_by == 'Email') {
                                                $label = 'Email';
                                                $label2 = 'From';
                                                $value = $row->email;
                                                $value2 = $row->email_from;
                                            } else {
                                                $label = 'Reference';
                                                $label2 = '';
                                                $value = $row->nm_reff;
                                                $value2 = '';
                                            }

                                    ?>
                                            <!--<tr>
                                                <td><b>Prod type</b></td>
                                                <td width="3%" >:</td>
                                                <td>
                                                    <form action="<?= base_url('engineering/estimationcost/update_typeprod') ?>" method="post">
                                                        <select name="type_prod" style="height:28px;width:140px;" class="">
                                                            <option value="" selected disabled>Please select</option>
                                                            <option value="MP" <?php if ($row->type_prod == "MP") {
                                                                                    echo 'selected';
                                                                                } ?>>Mass Pro</option>
                                                            <option value="JO" <?php if ($row->type_prod == "JO") {
                                                                                    echo 'selected';
                                                                                } ?>>Job Order</option>
                                                            <option value="FAB" <?php if ($row->type_prod == "FAB") {
                                                                                    echo 'selected';
                                                                                } ?>>Fabrication</option>
                                                        </select>
                                                        <button class="" style="height: 27px;border: 1px solid #6D6D6D; " type="submit">Update</button>
                                                        <input type="hidden" name="id_inquiry" value="<?= $row->id_inquiry ?>"></td>
                                                    </form>
                                                </tr> -->
                                            <tr>
                                                <td width="10%"><b>Inquiry No</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?php echo $uri4 ?></td>
                                                <td width="10%"><b>Customer code</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->customer_cd2 ?></td>
                                                <td width="10%"><b><?= $label ?></b></td>
                                                <td width="3%">:</td>
                                                <td><?= $value ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created date</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_dt ?></td>
                                                <td width="10%"><b>Customer desc</b></td>
                                                <td>:</td>
                                                <td><?= $row->customer_nm ?></td>
                                                <td width="10%"><b><?= $label2 ?></b></td>
                                                <td>:</td>
                                                <td><?= $value2 ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"><b>Created by</b></td>
                                                <td width="3%">:</td>
                                                <td width="20%"><?= $row->inquiry_created_by ?></td>
                                                <td width="10%"><b>Information by</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->information_by ?></td>
                                                <td width="10%"><b>Prod type</b></td>
                                                <td width="3%">:</td>
                                                <td><?= $row->type_prod ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </table>





                            </div>



                            <div class="table-responsive">

                                <table class="table table-sm table-bordered " id="table-data" border=" 0">
                                    <thead>
                                        <tr>
                                            <!-- <th style="text-align: center;">No</th> -->
                                            <th rowspan="2">Id Inquiry</th>
                                            <th rowspan="2">Part No</th>
                                            <th rowspan="2">Incld_mtl</th>
                                            <th colspan="4" align="center">Drawing</th>

                                            <th rowspan="2">Part name</th>
                                            <th rowspan="2">Unit</th>
                                            <th rowspan="2">Jumlah</th>

                                            <th rowspan="2">Status (1-3)</th>
                                            <th rowspan="2">Note</th>
                                            <!-- <th rowspan="2" width="10%" style="text-align: center;">Edit status</th> -->
                                            <th rowspan="2" width="8%" style="text-align: center;">Delete</th>

                                        </tr>
                                        <tr>
                                            <!-- <th style="text-align: center;">No</th> -->


                                            <th> rev0</th>
                                            <th> rev1</th>
                                            <th> rev2</th>
                                            <th> rev3</th>




                                        </tr>
                                    </thead>

                                    <?php foreach ($detailinquiry as $row) {
                                        if ($row->eng_approve == 0) { ?>

                                            <tbody id="table-body">
                                                <?php

                                                foreach ($detailpartinquiry2 as $row) {


                                                    echo
                                                    "<tr data-id='$row->id_inquiry_detail'>
                                                <td>
                                                    <span class='span-id_inquiry caption' data-id='$row->id_inquiry_detail'>$row->id_inquiry</span> 
                                                    <input type='text' class='field-id_inquiry form-control editor' value='$row->id_inquiry' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_part_no caption' data-id='$row->id_inquiry_detail'>$row->inq_part_no</span> 
                                                    <input type='text' class='field-inq_part_no form-control editor' value='$row->inq_part_no' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_incld_mtl caption' data-id='$row->id_inquiry_detail'>$row->inq_incld_mtl</span> 
                                                    <input type='text' class='field-inq_incld_mtl form-control editor' value='$row->inq_incld_mtl' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                
                                                <td>
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->inq_drawing</span> 
                                                    <input type='text' class='field-inq_drawing form-control editor' value='$row->inq_drawing' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->inq_drawing_rev1</span> 
                                                    <input type='text' class='field-inq_drawing_rev1 form-control editor' value='$row->inq_drawing_rev1' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->inq_drawing_rev2</span> 
                                                    <input type='text' class='field-inq_drawing_rev2 form-control editor' value='$row->inq_drawing_rev2' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_drawings caption' data-id='$row->id_inquiry_detail'>$row->inq_drawing_rev3</span> 
                                                    <input type='text' class='field-inq_drawing_rev3 form-control editor' value='$row->inq_drawing_rev3' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_part_nm caption' data-id='$row->id_inquiry_detail'>$row->inq_part_nm</span> 
                                                    <input type='text' class='field-inq_part_nm form-control editor' value='$row->inq_part_nm' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_nm_unit caption' data-id='$row->id_inquiry_detail'>$row->inq_nm_unit</span> 
                                                    <input type='text' class='field-inq_nm_unit form-control editor' value='$row->inq_nm_unit' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_qty caption' data-id='$row->id_inquiry_detail'>$row->inq_qty</span> 
                                                    <input type='text' class='field-inq_qty form-control editor' value='$row->inq_qty' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                
                                                <td>
                                                    <span class='span-inq_dtl_sts2 caption' data-id='$row->id_inquiry_detail'>$row->inq_dtl_sts2</span> 
                                                    <input type='text' class='field-inq_dtl_sts2 form-control editor' value='$row->inq_dtl_sts2' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                <td>
                                                    <span class='span-inq_dtl_note caption' data-id='$row->id_inquiry_detail'>$row->inq_dtl_note</span> 
                                                    <input type='text' class='field-inq_dtl_note form-control editor' value='$row->inq_dtl_note' data-id='$row->id_inquiry_detail' />
                                                </td>
                                                
                                                

                                                <td align='center'>
                                                    <button class='btn btn-xs btn-danger btn-sm btn-kecil hapus-inquiry_part' data-id='$row->id_inquiry_detail'><i class='far fa-trash-alt'></i></button>
                                                </td>
                                             </tr>";
                                                }


                                                ?>


                                            </tbody>

                                        <?php } else { ?>
                                            <tbody>

                                                <?php
                                                $no = 1;
                                                foreach ($detailpartinquiry2 as $row) :
                                                ?>
                                                    <tr>
                                                        <!-- <td align="center"><?= $no++ ?></td> -->
                                                        <td><?= $row->id_inquiry ?></td>
                                                        <td><?= $row->inq_part_no ?></td>
                                                        <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing ?> </a></td>
                                                        <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev1 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev1 ?> </a></td>
                                                        <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev2 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev2 ?> </a></td>
                                                        <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev3 . '') ?>" target='_blank'><i class='fas fa-search-plus'></i> <?= $row->inq_drawing_rev3 ?> </a></td>
                                                        <td><?= $row->inq_part_nm ?></td>
                                                        <td><?= $row->inq_nm_unit ?></td>
                                                        <td><?= $row->inq_qty ?></td>
                                                        <td><?= $row->inq_dtl_sts2 ?></td>
                                                        <td><?= $row->inq_dtl_note ?></td>
                                                        <!--  <td align="right"><?= number_format($row->cost_tool, 0, ',', '.'); ?></td>
                                                        <td align="right"><?= number_format($row->cost_mtl, 0, ',', '.'); ?></td>
                                                        <td align="right"><?= number_format($row->cost_process, 0, ',', '.'); ?></td>
                                                        <td align="right" style="padding-right: 17px;"><?= number_format(($row->cost_tool + $row->cost_mtl + $row->cost_process), 0, ',', '.'); ?></td> -->
                                                        <td align="center"><button class='btn btn-xs btn-danger btn-kecil btn-sm hapus-inquiry_part' data-id='$row->id_inquiry_detail' disabled><i class='far fa-trash-alt'></i></button></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>

                                    <?php }
                                    } ?>
                                </table>

                            </div>
                            <small style="float: right;">Status : 1. Cancel &nbsp; 2. Continue &nbsp; 3. Rejected</small>
                            <small style="float: left;">Include Material : 0. No &nbsp; 1. Yes &nbsp;</small>
                            <br />
                            <hr>

                            <!-- <div class="row">
                                <div class="col-md-6">

                                    <form action="<?= base_url('marketing/inquiry/cancelinquiry') ?>" method="post">
                                        <label class="">Inquiry Note</label>
                                        <textarea class="form-control" type="text" name="inquiry_note"></textarea>
                                        <input class="form-control" name="id_inquiry" type="text" value='<?= $uri4 ?>'>
                                        <button onclick="return confirm('Yakin mau cancel Inquiry')" class="btn btn-danger" style="margin-top:10px;float:right" type="submit">Cancel inquiry</button>
                                    </form>
                                </div>
                                <div class="col-md-6">



                                </div>

                            </div> -->





                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>



<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "post",
            cache: false,
            dataType: "json"
        })


        $(document).on("click", "td", function() {
            $(this).find("span[class~='caption']").hide();
            $(this).find("input[class~='editor']").fadeIn().focus();
            $(this).find("select[class~='editor']").fadeIn().focus();
        });


        $("#tambah-data").click(function() {
            $.ajax({
                url: "<?php echo base_url('marketing/inquiry/add_inquiry_detail'); ?>",
                success: function(a) {

                    var ele = "";
                    ele += "<tr data-id='" + a.id + "'>";
                    ele += "<td><span class='span-id_inquiry caption' value='<?= $uri4 ?>' data-id='" + a.id + "'></span> <input type='text' class='field-id_inquiry form-control editor'  value='<?= $uri4 ?>' data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_part_no caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_part_no form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_incld_mtl caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_incld_mtl form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_drawing caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_drawing form-control editor' data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_drawing_rev1 caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_drawing_rev1 form-control editor' data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_drawing_rev2 caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_drawing_rev2 form-control editor' data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_drawing_rev3 caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_drawing_rev3 form-control editor' data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_part_nm caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_part_nm form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_nm_unit caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_nm_unit form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_qty caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_qty form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_dtl_note caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_dtl_note form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td><span class='span-inq_dtl_sts2 caption' data-id='" + a.id + "'></span> <input type='text' class='field-inq_dtl_sts2 form-control editor'  data-id='" + a.id + "' /></td>";
                    ele += "<td align='center'><button class='btn btn-xs btn-danger btn-sm hapus-inquiry_part' data-id='" + a.id + "'><i class='far fa-trash-alt'></i></button></td>";
                    ele += "<td align='center'><button class='btn btn-xs btn-info btn-sm hapus-inquiry_part' data-id='" + a.id + "'><i class='far fa-pencil-alt'></i></button></td>";
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
                if (target.is(".field-id_inquiry")) {
                    data.modul = "id_inquiry";
                } else if (target.is(".field-inq_part_no")) {
                    data.modul = "inq_part_no";
                } else if (target.is(".field-inq_incld_mtl")) {
                    data.modul = "inq_incld_mtl";
                } else if (target.is(".field-inq_drawing")) {
                    data.modul = "inq_drawing";
                } else if (target.is(".field-inq_drawing_rev1")) {
                    data.modul = "inq_drawing_rev1";
                } else if (target.is(".field-inq_drawing_rev2")) {
                    data.modul = "inq_drawing_rev2";
                } else if (target.is(".field-inq_drawing_rev3")) {
                    data.modul = "inq_drawing_rev3";
                } else if (target.is(".field-inq_part_nm")) {
                    data.modul = "inq_part_nm";
                } else if (target.is(".field-inq_nm_unit")) {
                    data.modul = "inq_nm_unit";
                } else if (target.is(".field-inq_qty")) {
                    data.modul = "inq_qty";
                } else if (target.is(".field-inq_dtl_note")) {
                    data.modul = "inq_dtl_note";
                } else if (target.is(".field-inq_dtl_sts2")) {
                    data.modul = "inq_dtl_sts2";
                }

                $.ajax({
                    data: data,
                    url: "<?php echo base_url('marketing/inquiry/update_inquiry_detail'); ?>",
                    success: function(a) {
                        target.hide();
                        target.siblings("span[class~='caption']").html(value).fadeIn();
                    }
                })
            }
        });

        $(document).on("click", ".hapus-inquiry_part", function() {
            var id = $(this).attr("data-id");
            swal({
                title: "Hapus inquiry_part",
                text: "Yakin akan menghapus inquiry_part " + id,
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                closeOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('index.php/marketing/inquiry/delete_inquiry_detail') ?>",
                        method: "post",

                        data: {
                            id: id
                        },
                        success: function() {
                            $("tr[data-id='" + id + "']").fadeOut("fast", function() {
                                $(this).remove();
                            });
                        }
                    })

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