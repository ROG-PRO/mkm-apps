<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>

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
                        <label><?= $title ?> name</label>
                        <input name="nm_brand" id="nm_brand" type="text" class="form-control">
                    </div>



                    <div class="form-group">
                        <input name="created_by" id="created_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
                    </div>
                    <div class="form-group">
                        <input name="created_dt" id="created_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--start modal input -->


<!-- Modal untuk edit data section -->
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



<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data receive dan di incluce ke dalam datatable
        var data<?= $title ?> = $('#data<?= $title ?>').DataTable({
            "processing": true,
            "autoWidth": false,
            "responsive": true,
            "ajax": "<?= base_url("index.php/purchasing/receive/datareceive") ?>",
            stateSave: true,
            "order": []
        })

        var datareceivedetail = $('#datareceivedetail').DataTable({
            "processing": true,
            "autoWidth": false,
            "responsive": true,
            "ajax": "<?= base_url("index.php/purchasing/receive/datareceivedetail") ?>",
            stateSave: true,
            "order": []
        })


        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdata<?= $title ?>').on('submit', function() {

            var nm_brand = $('#nm_brand').val(); // diambil dari id part_nm yanag ada di form modal 
            var created_by = $('#created_by').val(); // diambil dari id alamat yanag ada di form modal 
            var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/purchasing/brand/tambahbrand') ?>",
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

                    nm_brand: nm_brand,
                    created_by: created_by,
                    created_dt: created_dt

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

                    $('#nm_brand').val('');
                    $('#created_by').val('');
                    $('#created_dt').val('');

                }
            })
            return false;
        });
        // fungsi untuk edit data
        //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
        $('#data<?= $title ?>').on('click', '.ubah-<?= $title ?>', function() {
            // ambil element id pada saat klik ubah
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/brand/formedit') ?>",
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
                        var e_nm_brand = $('#e_nm_brand').val(); // diambil dari id part_nm yanag ada di form modal 
                        var update_by = $('#update_by').val(); // diambil dari id alamat yanag ada di form modal 
                        var update_dt = $('#update_dt').val(); // diambil dari id alamat yanag ada di form modal 

                        var id = $('#id_brand').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/admin/brand/ubahbrand') ?>",
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
                                e_nm_brand: e_nm_brand,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                data<?= $title ?>.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Update <?= $title ?>',
                                    text: 'Anda Berhasil Mengubah Data <?= $title ?>'
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
        //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa

        /*
                $('#datadetail<?= $title ?>').on('click', '.hapusdetail-<?= $title ?>', function() {
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
                                url: "<?= base_url('index.php/admin/receive/hapusdetailreceive') ?>",
                                method: "post",
                                /*beforeSend: function() {
                                    swal({
                                        title: 'Menunggu',
                                        html: 'Memproses data',
                                        onOpen: () => {
                                            swal.showLoading()
                                        }
                                    })
                                },*
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    swal(
                                        'Hapus',
                                        'Berhasil Terhapus',
                                        'success'
                                    )
                                    data<?= $title ?>.ajax.reload(null, false)
                                }
                            })
                        } else if (result.dismiss === swal.DismissReason.cancel) {
                            /*swal(
                                'Batal',
                                'Anda membatalkan penghapusan',
                                'error'
                            )
                        }
                    })
                });*/
    });
</script>