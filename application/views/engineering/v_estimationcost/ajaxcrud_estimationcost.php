<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("y-m-d H:i:s");
$cd = date("ymdHis");
$inquiry_cd = 'INQ-' . $cd;
?>
<!--new inquiry modal-->
<div class="modal fade" id="tambah<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdata<?= $title ?>">

                    <div class="form-group">
                        <label>Inquery CD</label>
                        <input name="id_inquiry" id="id_inquiry" type="text" value="<?= $inquiry_cd ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Part No</label>
                        <input name="part_no" id="part_no" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Part Name</label>
                        <input name="part_nm" id="part_nm" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Customer Cede</label>
                        <input name="cust_cd" id="cust_cd" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <input name="inquiry_created_by" id="inquiry_created_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
                    </div>
                    <div class="form-group">
                        <input name="inquiry_created_dt" id="inquiry_created_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
                    </div>
                    <div class="form-group">
                        <label>Drawing Name</label>
                        <input name="drawing" id="drawing" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Deskription</label>
                        <input name="inquiry_note" id="inquiry_note" type="text" class="form-control">
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




<!-- Modal untuk insertcsv data -->
<div class="modal fade" id="insertcsv<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert csv <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart($action); ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="pocustomer" accept="text/csv">
                    <label class="custom-file-label" for="exampleInputFile">*.csv file only</label>
                </div>

                <?php echo form_close(); ?>

            </div>
            <div class="modal-footer">
                <button style="margin-top:10px;float:right;" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button style="margin-top:10px;float:right;" class="btn btn-success " type="submit" name="import">Import</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data barang dan di incluce ke dalam datatable
        var data<?= $title ?> = $('#data<?= $title ?>').DataTable({
            "processing": true,
            /*"paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,*/
            "scrollX": true,
            "autoWidth": false,
            "responsive": false,
            "ajax": "<?= base_url("index.php/engineering/" . $title . "/data" . $title . "") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdata<?= $title ?>').on('submit', function() {
            var id_inquiry = $('#id_inquiry').val(); // diambil dari id part_no yang ada diform modal
            var part_no = $('#part_no').val(); // diambil dari id part_no yang ada diform modal
            var part_nm = $('#part_nm').val(); // diambil dari id part_no yang ada diform modal
            var cust_cd = $('#cust_cd').val(); // diambil dari id alamat yanag ada di form modal 
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
                data: {

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



        // fungsi untuk edit data

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
                text: "Anda ingin menghapus ",
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
                        url: "<?= base_url('index.php/engineering/' . $title . '/hapus' . $title . '') ?>",
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


                                data<?= $title?>.ajax.reload(null, false)
                            }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan penghapusan',
                        'error'
                    )
                }
            })
        });

    });
</script>