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
                <h4 class="modal-title">Add </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdata<?= $title ?>">



                    <div class="form-group">
                        <label>Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control" required>
                            <option value="">- Pilih Role -</option>
                            <?php
                            foreach ($role as $row) {
                                echo "<option value='" . $row->roleid . "'>" . $row->roleid . " | " . $row->role . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input name="url" id="url" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>icon</label>
                        <input name="icon" id="icon" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Controller</label>
                        <input name="controller" id="controller" type="text" class="form-control">
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


<!-- Modal untuk edit data section -->
<div class="modal fade" id="edit<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
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
        // ini adalah fungsi untuk mengambil data brand dan di incluce ke dalam datatable
        var data<?= $title ?> = $('#data<?= $title ?>').DataTable({
            "processing": true,
            "autoWidth": false,
            "ordering": false,
            "responsive": true,
            // "scrollx": true,
            "ajax": "<?= base_url("index.php/admin/usermanagement/" . $title . "/data" . $title . "") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdata<?= $title ?>').on('submit', function() {

            var menu_id = $('#menu_id').val(); // diambil dari id part_nm yanag ada di form modal 
            var title = $('#title').val(); // diambil dari id part_nm yanag ada di form modal 
            var url = $('#url').val(); // diambil dari id part_nm yanag ada di form modal 
            var controller = $('#controller').val(); // diambil dari id part_nm yanag ada di form modal 
            var icon = $('#icon').val(); // diambil dari id part_nm yanag ada di form modal 
            var is_active = $('#is_active').val(); // diambil dari id part_nm yanag ada di form modal 
            var created_by = $('#created_by').val(); // diambil dari id alamat yanag ada di form modal 
            var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/usermanagement/' . $title . '/tambah' . $title . '') ?>",
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

                    menu_id: menu_id,
                    title: title,
                    url: url,
                    controller: controller,
                    icon: icon,
                    is_active: is_active,
                    created_by: created_by,
                    created_dt: created_dt

                }, // ambil datanya dari form yang ada di variabel
                dataType: "JSON",
                success: function(data) {
                    data<?= $title ?>.ajax.reload(null, false);
                    $(document).ajaxStop(function() {
                        setInterval(function() {
                            location.reload();
                        }, 500);
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'Add data was successful'
                    });
                    // bersihkan form pada modal
                    $('#tambah<?= $title ?>').modal('hide');
                    // tutup modal

                    $('#menu_id').val('');
                    $('#title').val('');
                    $('#url').val('');
                    $('#controller').val('');
                    $('#icon').val('');
                    $('#is_active').val('');
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
                url: "<?= base_url('index.php/admin/usermanagement/' . $title . '/formedit') ?>",
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
                        // var e_username = $('#e_username').val(); // diambil dari id part_nm yanag ada di form modal 
                        // var e_password = $('#e_password').val(); // diambil dari id part_nm yanag ada di form modal 
                        // var e_fullname = $('#e_fullname').val(); // diambil dari id part_nm yanag ada di form modal 
                        // var e_menu_id = $('#e_menu_id').val(); // diambil dari id part_nm yanag ada di form modal 
                        var e_controller = $('#e_controller').val(); // diambil dari id part_nm yanag ada di form modal 
                        // var update_by = $('#update_by').val(); // diambil dari id alamat yanag ada di form modal 
                        // var update_dt = $('#update_dt').val(); // diambil dari id alamat yanag ada di form modal 
                        var id = $('#usm_id').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/admin/usermanagement/' . $title . '/ubah' . $title . '') ?>",
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
                                // e_username: e_username,
                                // e_password: e_password,
                                // e_fullname: e_fullname,
                                // e_menu_id: e_menu_id,
                                e_controller: e_controller,
                                // update_by: update_by,
                                // update_dt: update_dt,
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
        $('#data<?= $title ?>').on('click', '.hapus-<?= $title ?>', function() {
            var id = $(this).data('id');
            swal({
                title: 'Confirmation',
                text: "The selected data will be deleted, Continue ! ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('index.php/admin/usermanagement/' . $title . '/hapus' . $title . '') ?>",
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
                                title: 'ID No. ' + id + ' Deleted'
                            });

                            data<?= $title ?>.ajax.reload(null, false)
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