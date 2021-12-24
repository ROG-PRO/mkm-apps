<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");

?>



<form id="formubahdata<?= $title ?>" method="post">

  <div class="form-group">
    <label>Nama unit</label>
    <input name="e_nm_unit" id="e_nm_unit" value="<?= $dataperunit['nm_unit'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_unit" id="id_unit" value="<?= $dataperunit['id_unit'] ?>">
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