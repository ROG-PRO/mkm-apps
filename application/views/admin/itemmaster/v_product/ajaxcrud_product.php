<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>

<div class="modal fade" id="tambahproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdataproduct">

                    <div class="form-group">
                        <label>Part No </label>
                        <input name="part_no" id="part_no" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Part name</label>
                        <input name="part_nm" id="part_nm" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Model No.</label>
                        <input name="model_no" id="model_no" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="product_price" id="product_price" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <select name="id_unit" id="id_unit" class="form-control" required>
                            <option value="">- Pilih Satuan -</option>
                            <?php
                            foreach ($unit as $row) {
                                echo "<option value='" . $row->id_unit . "'>" . $row->nm_unit . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Customer CD</label>
                        <select name="id_customer" id="id_customer" class="form-control" required>
                            <option value="">- Pilih Satuan -</option>
                            <?php
                            foreach ($customer as $row) {
                                echo "<option value='" . $row->id_customer . "'>" . $row->customer_cd . "</option>";
                            }

                            ?>

                        </select>
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
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdataproduct">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data barang dan di incluce ke dalam datatable
        var dataproduct = $('#dataproduct').DataTable({
            "processing": true,
            "ordering": false,
            "autoWidth": false,
            "responsive": true,
            "ajax": "<?= base_url("index.php/admin/itemmaster/" . $title . "/dataproduct") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatabrg  
        $('#formtambahdataproduct').on('submit', function() {
            var part_no = $('#part_no').val(); // diambil dari id part_no yang ada diform modal
            var part_nm = $('#part_nm').val(); // diambil dari id part_no yang ada diform modal
            var model_no = $('#model_no').val(); // diambil dari id part_no yang ada diform modal
            var product_price = $('#product_price').val(); // diambil dari id part_no yang ada diform modal
            var id_unit = $('#id_unit').val(); // diambil dari id part_no yang ada diform modal
            var id_customer = $('#id_customer').val(); // diambil dari id part_no yang ada diform modal
            var created_by = $('#created_by').val();
            var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 


            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/tambahproduct') ?>",
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

                    part_no: part_no,
                    part_nm: part_nm,
                    model_no: model_no,
                    product_price: product_price,
                    id_unit: id_unit,
                    id_customer: id_customer,
                    created_by: created_by,
                    created_dt: created_dt

                }, // ambil datanya dari form yang ada di variabel
                dataType: "JSON",
                success: function(data) {
                    dataproduct.ajax.reload(null, false);
                    swal({
                        type: 'success',
                        title: 'Tambah product',
                        text: 'Anda Berhasil Menambah product'
                    })
                    // bersihkan form pada modal
                    $('#tambahproduct').modal('hide');
                    // tutup modal

                    $('#part_no').val('');
                    $('#part_nm').val('');
                    $('#model_no').val('');
                    $('#product_price').val('');
                    $('#id_unit').val('');
                    $('#id_customer').val('');
                    $('#created_by').val('');
                    $('#created_dt').val('');

                }
            })
            return false;
        });


        // fungsi untuk edit data
        //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
        $('#dataproduct').on('click', '.ubah-product', function() {
            // ambil element id pada saat klik ubah
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "<?= base_url('index.php/admin/itemmaster/product/formedit') ?>",
                beforeSend: function() {
                    /*swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })*/
                },
                data: {
                    id: id
                },
                success: function(data) {
                    swal.close();
                    $('#editproduct').modal('show');
                    $('#formdataproduct').html(data);

                    // proses untuk mengubah data
                    $('#formubahdataproduct').on('submit', function() {

                        var e_part_no = $('#e_part_no').val(); // diambil dari id part_no yang ada diform modal
                        var e_part_nm = $('#e_part_nm').val();
                        var e_model_no = $('#e_model_no').val();
                        var e_product_price = $('#e_product_price').val();
                        var e_id_unit = $('#e_id_unit').val();
                        var e_id_customer = $('#e_id_customer').val();
                        var update_by = $('#update_by').val();
                        var update_dt = $('#update_dt').val();
                        var id = $('#id_product').val();
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('index.php/admin/itemmaster/product/ubahproduct') ?>",
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
                                e_part_no: e_part_no,
                                e_part_nm: e_part_nm,
                                e_model_no: e_model_no,
                                e_product_price: e_product_price,
                                e_id_unit: e_id_unit,
                                e_id_customer: e_id_customer,
                                update_by: update_by,
                                update_dt: update_dt,
                                id: id
                            }, // ambil datanya dari form yang ada di variabel

                            success: function(data) {
                                dataproduct.ajax.reload(null, false);
                                swal({
                                    type: 'success',
                                    title: 'Update Data',
                                    text: 'Anda Berhasil Mengubah Data '
                                })
                                // bersihkan form pada modal
                                $('#editproduct').modal('hide');
                                // tutup modal

                            }
                        })
                        return false;
                    });
                }
            });
        });
        // fungsi untuk hapus data
        //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
        $('#dataproduct').on('click', '.hapus-product', function() {
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
                        url: "<?= base_url('index.php/admin/itemmaster/' . $title . '/hapusproduct') ?>",
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
                            dataproduct.ajax.reload(null, false)
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