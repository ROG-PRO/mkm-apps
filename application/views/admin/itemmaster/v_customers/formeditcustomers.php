<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");

?>



<form id="formubahdata<?= $title ?>" method="post">

  <!-- <div class="form-group">
    <label>Cus</label>
    <input name="customer_cd" id="customer_cd" value="<?= $datapercustomers['customer_cd'] ?>" type="text" class="form-control">
    
  </div> -->
  <div class="form-group">
    <label>Customer code</label>
    <input name="ecustomer_cd" id="ecustomer_cd" type="text" value="<?= $datapercustomers['customer_cd'] ?>" class="form-control">
    <input type="hidden" name="id_customer" id="id_customer" value="<?= $datapercustomers['id_customer'] ?>">
  </div>
  <div class="form-group">
    <label>Customer code 2</label>
    <input name="ecustomer_cd2" id="ecustomer_cd2" type="text" value="<?= $datapercustomers['customer_cd2'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Customer Name</label>
    <input name="ecustomer_nm" id="ecustomer_nm" type="text" value="<?= $datapercustomers['customer_nm'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Contact Person</label>
    <input name="ecustomer_contact" id="ecustomer_contact" type="text" value="<?= $datapercustomers['customer_contact'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Customer Address</label>
    <input name="ecustomer_address" id="ecustomer_address" type="text" value="<?= $datapercustomers['customer_address'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Telp No.</label>
    <input name="eno_telp" id="eno_telp" type="text" value="<?= $datapercustomers['no_telp'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Fax No.</label>
    <input name="eno_fax" id="eno_fax" type="text" value="<?= $datapercustomers['no_fax'] ?>" class="form-control">
  </div>


  <div class="form-group">
    <input name="update_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="update_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update <?php echo $title ?></button>
  </div>
</form>