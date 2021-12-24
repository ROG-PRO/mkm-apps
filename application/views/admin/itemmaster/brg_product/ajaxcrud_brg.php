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
                <h4 class="modal-title">Add Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <form id="formtambahdatabrg">
                    <div class="form-group">
                        <label>Part_no</label>
                        <input name="part_no" id="part_no" type="text" class="form-control">
                        <?= form_error('part_no', '<small class="text-danger pl-3" >', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label>Part name</label>
                        <input name="part_nm" id="part_nm" type="text" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Section</label>
                            <select name="id_section" id="id_section" class="form-control" required>
                                <option value="">- Pilih Section -</option>
                                <?php
                                foreach ($section as $row) {
                                    echo "<option value='" . $row->id_section . "'>" . $row->section_cd . "</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga</label>
                            <input name="price" id="price" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Vendor</label>
                            <select name="id_brand" id="id_brand" class="form-control" required>
                                <option value="">-- Pilih Vendor --</option>
                                <?php
                                foreach ($brand as $row) {
                                    echo "<option value='" . $row->id_brand . "'>" . $row->nm_brand . "</option>";
                                }
                                echo "</select>";
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">- Pilih Kategori -</option>
                                <?php
                                foreach ($kategori as $row) {
                                    echo "<option value='" . $row->id_kategori . "'>" . $row->nm_kategori . "</option>";
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Min Stok</label>
                            <input name="min_stok" id="min_stok" type="number" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="id_status" id="id_status" class="form-control" required>
                                <option value="">- Pilih Status -</option>
                                <?php
                                foreach ($status as $row) {
                                    echo "<option value='" . $row->id_status . "'>" . $row->nm_status . "</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Lokasi</label>
                            <select name="id_lok" id="id_lok" class="form-control" required>
                                <option value="">- Pilih Lokasi -</option>
                                <?php
                                foreach ($lokasi as $row) {
                                    echo "<option value='" . $row->id_lok . "'>" . $row->cd_lok . "</option>";
                                }
                                echo "</select>";
                                ?>
                        </div>
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


<!-- Modal untuk edit data mahasiswa -->
<div class="modal fade" id="editbrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formdatabrg">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#databrg .table-search .th-search').each(function() {
                var title = $(this).text();
                $(this).html('<i><input style="width:100%;height:27px" class="" type="text" placeholder=" ' + title + '" /></i>');
            });
            // ini adalah fungsi untuk mengambil data barang dan di incluce ke dalam datatable
            var databrg = $('#databrg').DataTable({
                "processing": true,
                "ordering": false,
                "autoWidth": false,
                "responsive": true,
                "ajax": "<?= base_url("index.php/admin/itemmaster/inventory/databrg") ?>",
                stateSave: true,
                "order": []
            });
            databrg.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // fungsi untuk menambah data  
            // pilih selector dari yang id formtambahdatabrg  
            $('#formtambahdatabrg').on('submit', function() {
                var part_no = $('#part_no').val(); // diambil dari id part_no yang ada diform modal
                var part_nm = $('#part_nm').val(); // diambil dari id part_nm yanag ada di form modal 
                var id_brand = $('#id_brand').val(); // diambil dari id alamat yanag ada di form modal 
                var id_unit = $('#id_unit').val(); // diambil dari id alamat yanag ada di form modal 
                var id_kategori = $('#id_kategori').val(); // diambil dari id alamat yanag ada di form modal 
                var id_status = $('#id_status').val(); // diambil dari id alamat yanag ada di form modal 
                var min_stok = $('#min_stok').val(); // diambil dari id alamat yanag ada di form modal 
                var created_by = $('#created_by').val(); // diambil dari id alamat yanag ada di form modal 
                var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 
                //var update_by = ''; // diambil dari id alamat yanag ada di form modal 
                //var update_dt = ''; // diambil dari id alamat yanag ada di form modal 
                var id_lok = $('#id_lok').val(); // diambil dari id alamat yanag ada di form modal 
                var price = $('#price').val(); // diambil dari id alamat yanag ada di form modal 
                var id_section = $('#id_section').val(); // diambil dari id alamat yanag ada di form modal 

                $.ajax({
                    type: "post",
                    url: "<?= base_url('index.php/admin/itemmaster/inventory/tambahbrg') ?>",
                    beforeSend: function() {
                        swal({
                            title: 'Please wait',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        part_no: part_no,
                        part_nm: part_nm,
                        id_brand: id_brand,
                        id_unit: id_unit,
                        id_kategori: id_kategori,
                        id_status: id_status,
                        min_stok: min_stok,
                        created_by: created_by,
                        created_dt: created_dt,
                        //update_by: update_by,
                        //update_dt: update_dt,
                        id_lok: id_lok,
                        price: price,
                        id_section: id_section
                    }, // ambil datanya dari form yang ada di variabel
                    dataType: "JSON",
                    success: function(data) {
                        databrg.ajax.reload(null, false);
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
                        $('#part_no').val('');
                        $('#part_nm').val('');
                        $('#id_brand').val('');
                        $('#id_unit').val('');
                        $('#id_kategori').val('');
                        $('#id_status').val('');
                        $('#min_stok').val('');
                        $('#created_by').val('');
                        $('#created_dt').val('');
                        //$('#update_by').val('');
                        //('#update_dt').val('');
                        $('#id_lok').val('');
                        $('#price').val('');
                        $('#id_section').val('');


                    }
                })
                return false;
            });
            // fungsi untuk edit data
            //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
            $('#databrg').on('click', '.ubah-brg', function() {
                // ambil element id pada saat klik ubah
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "<?= base_url('index.php/admin/itemmaster/inventory/formedit') ?>",
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
                        $('#editbrg').modal('show');
                        $('#formdatabrg').html(data);

                        // proses untuk mengubah data
                        $('#formubahdatabrg').on('submit', function() {
                            var e_part_no = $('#e_part_no').val();
                            var e_part_nm = $('#e_part_nm').val(); // diambil dari id part_nm yanag ada di form modal 
                            var e_id_brand = $('#e_id_brand').val(); // diambil dari id alamat yanag ada di form modal 
                            var e_id_unit = $('#e_id_unit').val(); // diambil dari id alamat yanag ada di form modal 
                            var e_id_kategori = $('#e_id_kategori').val(); // diambil dari id alamat yanag ada di form modal 
                            var e_id_status = $('#e_id_status').val(); // diambil dari id alamat yanag ada di form modal 
                            var e_min_stok = $('#e_min_stok').val(); // diambil dari id alamat yanag ada di form modal 
                            //var created_by = $('#created_by').val(); // diambil dari id alamat yanag ada di form modal 
                            //var created_dt = $('#created_dt').val(); // diambil dari id alamat yanag ada di form modal 
                            var update_by = $('#update_by').val(); // diambil dari id alamat yanag ada di form modal 
                            var update_dt = $('#update_dt').val(); // diambil dari id alamat yanag ada di form modal 
                            var e_id_lok = $('#e_id_lok').val();
                            var e_id_section = $('#e_id_section').val();
                            var e_price = $('#e_price').val();
                            var id = $('#id_brg').val();
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('index.php/admin/itemmaster/inventory/ubahbrg') ?>",
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
                                    e_id_brand: e_id_brand,
                                    e_id_unit: e_id_unit,
                                    e_id_kategori: e_id_kategori,
                                    e_id_status: e_id_status,
                                    e_min_stok: e_min_stok,
                                    //e_created_by: e_created_by,
                                    //e_created_dt: e_created_dt,
                                    update_by: update_by,
                                    update_dt: update_dt,
                                    e_id_lok: e_id_lok,
                                    e_price: e_price,
                                    e_id_section: e_id_section,
                                    id: id
                                }, // ambil datanya dari form yang ada di variabel

                                success: function(data) {
                                    databrg.ajax.reload(null, false);
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Update ' + e_part_no + ' success '
                                    });
                                    // bersihkan form pada modal
                                    $('#editbrg').modal('hide');
                                }
                            })
                            return false;
                        });
                    }
                });
            });
            // fungsi untuk hapus data
            //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
            $('#databrg').on('click', '.hapus-brg', function() {
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
                            url: "<?= base_url('index.php/admin/itemmaster/inventory/hapusbrg') ?>",
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


                                databrg.ajax.reload(null, false)
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