<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri2 = $this->uri->segment(2);
?>



<form id="formubahdata<?= $uri2 ?>" method="post">

  <div class="form-group">
    <label><?= $uri2 ?> Name</label>
    <input name="e_nm_brand" id="e_nm_brand" value="<?= $dataperbrand['nm_brand'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_brand" id="id_brand" value="<?= $dataperbrand['id_brand'] ?>">
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