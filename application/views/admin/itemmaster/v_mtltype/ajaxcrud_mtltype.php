<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>

<div class="modal fade" id="tambahmtltype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdatamtltype">

                    <div class="form-group">
                        <label>Mtl type Code</label>
                        <input name="mtl_type_cd" id="mtl_type_cd" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mtltype name</label>
                        <input name="mtl_type_desc" id="mtl_type_desc" type="text" class="form-control">
                    </div>



                    <div class="form-group">
                        <input name="created_by" id="created_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
                    </div>
                    <div class="form-group">
                        <input name="created_dt" id="created_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--start modal input -->


<!-- Modal untuk edit data mtltype -->
<div class="modal fade" id="editmtltype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatamtltype">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data barang dan di incluce ke dalam datatable
        var datamtltype = $('#datamtltype').DataTable({
            "processing": true,
            "autoWidth": false,
            "responsive": true,

            "ajax": "<?= base_url("index.php/admin/itemmaster/mtltype/datamtltype") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdatamtltype').on('submit', function() {
            var mtl_type_cd = $('#mtl_type_cd').val(); // diambil dari id part_no yang ada diform modal
            var mtl_type_desc = $('#mtl_type_desc').val(); // diambil dari id part_nm yanag ada di form modal 
            var created_by = $('#created_by').val(); // diambil dari id alamat yanag ada di form modal 
            var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/itemmaster/mtltype/tambahmtltype') ?>",
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
                    mtl_type_cd: mtl_type_cd,
                    mtl_type_desc: mtl_type_desc,
                    created_by: created_by,
                    created_dt: created_dt

                }, // ambil datanya dari form yang ada di variabel
                dataType: "JSON",
                success: function(data) {
                    datamtltype.ajax.reload(null, false);
                    swal({
                        type: 'success',
                        title: 'Tambah mtltype',
                        text: 'Anda Berhasil Menambah mtltype'
                    })
                    // bersihkan form pada modal
                    $('#tambahmtltype').modal('hide');
                    // tutup modal
                    $('#mtl_type_cd').val('');
                    $('#mtl_type_desc').val('');
                    $('#created_by').val('');
                    $('#created_dt').val('');

                }
            })
            return false;
        });
        // fungsi untuk edit data
        //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
        $('#datamtltype').on('click', '.ubah-mtltype', function() {
            // ambil element id pada saat klik ubah
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/itemmaster/mtltype/formedit') ?>",
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
                    $('#editmtltype').modal('show');
                    $('#formdatamtltype').html(data);

                    // proses untuk mengubah data
                    $('#formubahdatamtltype').on('submit', function() {
                        var e_mtl_type_cd = $('#e_mtl_type_cd').val(); // diambil dari id part_no yang ada diform modal
                        var e_mtl_type_desc = $('#e_mtl_type_desc').val(); // diambil dari id part_nm yanag ada di form modal 
                        var update_by = $('#update_by').val(); // diambil dari id alamat yanag ada di form modal 
                        var update_dt = $('#update_dt').val(); // diambil dari id alamat yanag ada di form modal 

                        var id = $('#mtl_type_id').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('admin/mtltype/itemmaster/ubahmtltype') ?>",
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
                                e_mtl_type_cd: e_mtl_type_cd,
                                e_mtl_type_desc: e_mtl_type_desc,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                datamtltype.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Update Barang',
                                    text: 'Anda Berhasil Mengubah Data Barang'
                                })
                                // bersihkan form pada modal
                                $('#editmtltype').modal('hide');
                            }
                        })
                        return false;
                    });
                }
            });
        });
        // fungsi untuk hapus data
        //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
        $('#datamtltype').on('click', '.hapus-mtltype', function() {
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
                        url: "<?= base_url('index.php/admin/itemmaster/mtltype/hapusmtltype') ?>",
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
                            swal(
                                'Hapus',
                                'Berhasil Terhapus',
                                'success'
                            )
                            datamtltype.ajax.reload(null, false)
                        }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    /*swal(
                        'Batal',
                        'Anda membatalkan penghapusan',
                        'error'
                    )*/
                }
            })
        });

    });
</script>