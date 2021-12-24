<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri2 = $this->uri->segment(2);
?>



<form id="formubahdataproduct" method="post">

  <div class="form-group">
    <label>Part No </label>
    <input name="e_part_no" id="e_part_no" type="text" value="<?= $dataperproduct['part_no'] ?>" class="form-control">
    <input name="id_product" id="id_product" type="hidden" value="<?= $dataperproduct['id_product'] ?>" class="form-control">
  </div>

  <div class="form-group">
    <label>Part name</label>
    <input name="e_part_nm" id="e_part_nm" type="text" value="<?= $dataperproduct['part_nm'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Model No.</label>
    <input name="e_model_no" id="e_model_no" type="text" value="<?= $dataperproduct['model_no'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input name="e_product_price" id="e_product_price" type="text" value="<?= $dataperproduct['product_price'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Unit</label>
    <select name="e_id_unit" id="e_id_unit" class="form-control" required>
      <option value="">- Pilih Satuan -</option>
      <?php
      foreach ($unit as $row) {
        echo "<option value='$row->id_unit'";
        echo $dataperproduct['id_unit'] == $row->id_unit ? 'selected' : '';
        echo ">$row->nm_unit</option>";
      }
      ?>

    </select>
  </div>
  <div class="form-group">
    <label>Customer CD</label>
    <select name="e_id_customer" id="e_id_customer" class="form-control" required>
      <option value="">- Pilih customer -</option>
      <?php
      foreach ($customer as $row) {
        echo "<option value='$row->id_customer'";
        echo $dataperproduct['id_customer'] == $row->id_customer ? 'selected' : '';
        echo ">$row->customer_cd</option>";
      }
      ?>

    </select>
  </div>
  <div class="form-group">
    <input name="update_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="update_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>