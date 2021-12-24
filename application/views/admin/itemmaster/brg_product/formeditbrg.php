<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>



<form id="formubahdatabrg" method="post">
  <div class="form-group">
    <label>Part_no</label>
    <input name="part_no" id="e_part_no" value="<?= $dataperbrg['part_no'] ?>" type="text" class="form-control">
    <input type="hidden" name="id" id="id_brg" value="<?= $dataperbrg['id_barang'] ?>">
  </div>
  <div class="form-group">
    <label>Part name</label>
    <input name="part_nm" id="e_part_nm" value="<?= $dataperbrg['part_nm'] ?>" type="text" class="form-control">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Section</label>
      <select name="id_section" id="e_id_section" class="form-control" required>
        <option value="">- Pilih Section -</option>

        <?php
        foreach ($section as $row) {
          echo "<option value='$row->id_section'";
          echo $dataperbrg['id_section'] == $row->id_section ? 'selected' : '';
          echo ">$row->section_cd</option>";
        }
        ?>


      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Harga</label>
      <input name="price" id="e_price" value="<?= $dataperbrg['price'] ?>" type="text" class="form-control">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Brand</label>
      <select name="id_brand" id="e_id_brand" class="form-control" required>
        <option value="">-- Pilih brand --</option>

        <?php
        foreach ($brand as $row) {
          echo "<option value='$row->id_brand'";
          echo $dataperbrg['id_brand'] == $row->id_brand ? 'selected' : '';
          echo ">$row->nm_brand</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Kategori</label>
      <select name="id_kategori" id="e_id_kategori" class="form-control" required>
        <option value="">- Pilih Kategori -</option>

        <?php
        foreach ($kategori as $row) {
          echo "<option value='$row->id_kategori'";
          echo $dataperbrg['id_kategori'] == $row->id_kategori ? 'selected' : '';
          echo ">$row->nm_kategori</option>";
        }
        ?>

      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Min Stok</label>
      <input name="min_stok" id="e_min_stok" value="<?= $dataperbrg['min_stok'] ?>" type="number" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label>Unit</label>
      <select name="id_unit" id="e_id_unit" class="form-control" required>
        <option value="">- Pilih Satuan -</option>

        <?php
        foreach ($unit as $row) {
          echo "<option value='$row->id_unit'";
          echo $dataperbrg['id_unit'] == $row->id_unit ? 'selected' : '';
          echo ">$row->nm_unit</option>";
        }
        ?>

      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Status</label>
      <select name="id_status" id="e_id_status" class="form-control" required>
        <option value="">- Pilih Status -</option>

        <?php
        foreach ($status as $row) {
          echo "<option value='$row->id_status'";
          echo $dataperbrg['id_status'] == $row->id_status ? 'selected' : '';
          echo ">$row->nm_status</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label>Lokasi</label>
      <select name="id_lok" id="e_id_lok" class="form-control" required>
        <option value="">- Pilih Lokasi -</option>

        <?php
        foreach ($lokasi as $row) {
          echo "<option value='$row->id_lok'";
          echo $dataperbrg['id_lok'] == $row->id_lok ? 'selected' : '';
          echo ">$row->cd_lok</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <input name="created_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="created_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>