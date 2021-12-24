<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("y-m-d H:i:s");
$cd = date("ymdHis");
//$inquiry_cd = 'INQ-' . $cd;
?>

<!--new inquiry modal-->
<div class="modal fade" id="tambah<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

            <div class="card card-success card-outline">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold " style="padding:0px">Detail part</h6>
                            </div>
                    <div class="card-body">

                        <form id="formtambahdata<?= $title ?>">
                            <div class="form-group col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;">Inquery CD</label>
                                    <div class="col-sm-6">
                                        <input name="id_inquiry" id="id_inquiry" type="text" value="<?= $inquiry_cd ?>" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;">Part No</label>
                                    <div class="col-sm-6">
                                        <input name="part_no" id="part_no" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;">Part Name</label>
                                    <div class="col-sm-6">
                                        <input name="part_nm" id="part_nm" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;"> Customer Code</label>
                                    <div class="col-sm-6">
                                        <select name="cust_cd" id="cust_cd" class="form-control form-control-sm" required>
                                            <option value="">- Customer CD -</option>
                                            <?php
                                            foreach ($customer as $row) {
                                                echo "<option value='" . $row->customer_cd . "'>" . $row->customer_cd . "</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input name="inquiry_created_by" id="inquiry_created_by" type="hidden" class="form-control form-control" value="<?php echo $user; ?>">
                                </div>
                                <div class="form-group row">
                                    <input name="inquiry_created_dt" id="inquiry_created_dt" type="hidden" class="form-control form-control" value="<?php echo $today; ?>">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;">Drawing Name</label>
                                    <div class="col-sm-6">
                                        <input name="drawing" id="drawing" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="text-align:right;">Description</label>
                                    <div class="col-sm-6">
                                        <textarea name="inquiry_note" id="inquiry_note" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!--start modal input -->


<!-- Modal untuk edit data <?= $title ?> -->
<div class="modal fade" id="edit<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdata<?= $title ?>">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk create quotation -->
<div class="modal fade" id="create-quotation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdata_createquotation">

                </div>
            </div>
        </div>

    </div>
</div>
</div>



<script>
    $(document).ready(function() {
        var dataaddquotation = $('#dataaddquotation').DataTable({
            "processing": true,
            /*"paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,*/
            "autoWidth": false,
            "responsive": true,
            "ajax": "<?= base_url("index.php/marketing/quotation/dataaddquotation") ?>",
            stateSave: true,
            "order": []
        })
        

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdata<?= $title ?>').on('submit', function() {
            var id_inquiry = $('#id_inquiry').val();
            var part_no = $('#part_no').val();
            var part_nm = $('#part_nm').val();
            var cust_cd = $('#cust_cd').val();
            var inquiry_created_dt = $('#inquiry_created_dt').val();
            var inquiry_created_by = $('#inquiry_created_by').val();
            var drawing = $('#drawing').val();
            //var status = $('#created_dt').val();
            var inquiry_note = $('#inquiry_note').val();


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/marketing/' . $title . '/tambah' . $title . '') ?>",
                beforeSend: function() {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                data:  { 

                    id_inquiry: id_inquiry,
                    part_no: part_no,
                    part_nm: part_nm,
                    cust_cd: cust_cd,
                    inquiry_created_dt: inquiry_created_dt,
                    inquiry_created_by: inquiry_created_by,
                    drawing: drawing,
                    inquiry_note: inquiry_note

                }, // ambil datanya dari form yang ada di variabel
                dataType: "JSON",
                success: function(data) {
                    data<?= $title ?>.ajax.reload(null, false);
                    swal({
                        type: 'success',
                        title: 'Tambah <?= $title ?>',
                        text: 'Anda Berhasil Menambah <?= $title ?>'
                    })
                    // bersihkan form pada modal
                    $('#tambah<?= $title ?>').modal('hide');
                    // tutup modal

                    $('#id_inquiry').val('');
                    $('#part_no').val('');
                    $('#part_nm').val('');
                    $('#cust_cd').val('');
                    $('#inquiry_created_dt').val('');
                    $('#inquiry_created_by').val('');
                    $('#drawing').val('');
                    $('#inquiry_note').val('');

                }
            })
            return false;
        });


        // fungsi untuk creat quotation
        //pilih selector dari table id inquiry dengan class .create-quotation
        $('#data<?= $title ?>').on('click', '.create-quotation', function() {
            // ambil element id pada saat klik ubah
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/marketing/quotation/formcreatequotation') ?>",
                beforeSend: function() {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                data: {
                    id: id
                },
                success: function(data) {
                    swal.close();
                    $('#create-quotation').modal('show');
                    $('#formdata_createquotation').html(data);

                    // proses untuk mengubah data
                    $('#formcreatequotation').on('submit', function() {
                        var customer_contact = $('#customer_contact').val();
                        var subject = $('#subject').val();
                        var cust_reff = $('#cust_reff').val();
                        var attention = $('#attention').val();
                        var job = $('#job').val();
                        var validity_price = $('#validity_price').val();
                        var excluded = $('#excluded').val();
                        var payment_term = $('#payment_term').val();
                        var working_schedule = $('#working_schedule').val();
                        var update_by = $('#update_by').val();
                        var update_dt = $('#update_dt').val();
                        var id = $('#id_inquiry').val();

                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/marketing/inquiry/createquotation') ?>",
                            beforeSend: function() {
                                swal({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            data: {

                                customer_contact: customer_contact,
                                subject: subject,
                                cust_reff: cust_reff,
                                attention: attention,
                                job: job,
                                validity_price: validity_price,
                                excluded: excluded,
                                payment_term: payment_term,
                                working_schedule: working_schedule,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                data<?= $title ?>.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Updated',
                                    text: 'Anda Berhasil Mengubah Data Barang'
                                })
                                // bersihkan form pada modal
                                $('#create-quotation').modal('hide');
                            }
                        })
                        return false;
                    });
                }
            });
        });

        // fungsi untuk edit data
        //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
        $('#data<?= $title ?>').on('click', '.ubah-<?= $title ?>', function() {
            // ambil element id pada saat klik ubah
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/' . $title . '/formedit') ?>",
                /*beforeSend: function() {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },*/
                data: {
                    id: id
                },
                success: function(data) {
                    swal.close();
                    $('#edit<?= $title ?>').modal('show');
                    $('#formdata<?= $title ?>').html(data);

                    // proses untuk mengubah data
                    $('#formubahdata<?= $title ?>').on('submit', function() {

                        var e_nm_kategori = $('#e_nm_kategori').val(); // diambil dari id part_nm yanag ada di form modal 
                        var e_deskripsi = $('#e_deskripsi').val(); // diambil dari id part_nm yanag ada di form modal 
                        var update_by = $('#update_by').val(); // diambil dari id alamat yanag ada di form modal 
                        var update_dt = $('#update_dt').val(); // diambil dari id alamat yanag ada di form modal 

                        var id = $('#id_kategori').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/admin/' . $title . '/ubah' . $title . '') ?>",
                            /*beforeSend: function() {
                                swal({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },*/
                            data: {

                                e_nm_kategori: e_nm_kategori,
                                e_deskripsi: e_deskripsi,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                data<?= $title ?>.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Update Barang',
                                    text: 'Anda Berhasil Mengubah Data Barang'
                                })
                                // bersihkan form pada modal
                                $('#edit<?= $title ?>').modal('hide');
                            }
                        })
                        return false;
                    });
                }
            });
        });


        // fungsi untuk hapus data
        //pilih selector dari table id data__ dengan class .hapus-__
        $('#data<?= $title ?>').on('click', '.hapus-<?= $title ?>', function() {
            var id = $(this).data('id');
            swal({
                title: 'Konfirmasi',
                text: "Anda harus menghapus inquiry no. di modul estimation cost terlebih dahulu !! ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('index.php/marketing/' . $title . '/hapus' . $title . '') ?>",
                        method: "post",
                        /*beforeSend: function() {
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },*/
                        data: {
                            id: id
                        },
                        success: function(data) {
                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'success',
                                    title: 'Delete success'
                                });


                                datainquiry.ajax.reload(null, false)
                            }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'error',
                        title: 'Anda membatalkan penghapusan'
                    });


                }
            })
        });

    });
</script>