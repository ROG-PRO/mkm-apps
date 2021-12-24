<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>

<div class="modal fade" id="tambah<?= $title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdata<?= $title ?>">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Customer code</label>
                                <input name="customer_cd" id="customer_cd" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer code 2</label>
                                <input name="customer_cd2" id="customer_cd2" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input name="customer_nm" id="customer_nm" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input name="customer_contact" id="customer_contact" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Person 2</label>
                                <input name="customer_contact2" id="customer_contact2" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Customer Address</label>
                        <textarea name="customer_address" id="customer_address" class="form-control"></textarea>
                        <!-- <input name="customer_address" id="customer_address" type="text" class="form-control"> -->
                    </div>
                    <div class="form-group">
                        <label>Telp No.</label>
                        <input name="no_telp" id="no_telp" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Fax No.</label>
                        <input name="no_fax" id="no_fax" type="text" class="form-control">
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
<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data barang dan di incluce ke dalam datatable
        var data<?= $title ?> = $('#data<?= $title ?>').DataTable({
            "processing": true,
            // "autoWidth": false,
            // "responsive": true,
            // "scrollX":true,
            "ajax": "<?= base_url("index.php/admin/itemmaster/" . $title . "/data" . $title . "") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdata
        $('#formtambahdata<?= $title ?>').on('submit', function() {
            var customer_cd = $('#customer_cd').val();
            var customer_cd2 = $('#customer_cd2').val();
            var customer_nm = $('#customer_nm').val();
            var customer_contact = $('#customer_contact').val();
            var customer_contact2 = $('#customer_contac2').val();
            var customer_address = $('#customer_address').val();
            var no_telp = $('#no_telp').val();
            var no_fax = $('#no_fax').val();
            var created_by = $('#created_by').val();
            var created_dt = $('#created_dt').val();


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/tambah' . $title . '') ?>",
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

                    customer_cd: customer_cd,
                    customer_cd2: customer_cd2,
                    customer_nm: customer_nm,
                    customer_contact: customer_contact,
                    customer_contact2: customer_contact2,
                    customer_address: customer_address,
                    no_telp: no_telp,
                    no_fax: no_fax,
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

                    $('#customer_cd').val('');
                    $('#customer_cd2').val('');
                    $('#customer_nm').val('');
                    $('#customer_contact').val('');
                    $('#customer_contact2').val('');
                    $('#customer_address').val('');
                    $('#no_telp').val('');
                    $('#no_fax').val('');
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
                url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/formedit') ?>",
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
                    $('#edit<?= $title ?>').modal('show');
                    $('#formdata<?= $title ?>').html(data);

                    // proses untuk mengubah data
                    $('#formubahdata<?= $title ?>').on('submit', function() {

                        var ecustomer_cd = $('#ecustomer_cd').val();
                        var ecustomer_cd2 = $('#ecustomer_cd2').val();
                        var ecustomer_nm = $('#ecustomer_nm').val();
                        var ecustomer_contact = $('#ecustomer_contact').val();
                        var ecustomer_contact2 = $('#ecustomer_contact2').val();
                        var ecustomer_address = $('#ecustomer_address').val();
                        var eno_telp = $('#eno_telp').val();
                        var eno_fax = $('#eno_fax').val();
                        var update_by = $('#update_by').val();
                        var update_dt = $('#update_dt').val();

                        var id = $('#id_customer').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/ubah' . $title . '') ?>",
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

                                ecustomer_cd: ecustomer_cd,
                                ecustomer_cd2: ecustomer_cd2,
                                ecustomer_nm: ecustomer_nm,
                                ecustomer_contact: ecustomer_contact,
                                ecustomer_contact2: ecustomer_contact2,
                                ecustomer_address: ecustomer_address,
                                eno_telp: eno_telp,
                                eno_fax: eno_fax,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                data<?= $title ?>.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Update Customer',
                                    text: 'Anda Berhasil Mengubah Data Customer'
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
                        url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/hapus' . $title . '') ?>",
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
                            data<?= $title ?>.ajax.reload(null, false)
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