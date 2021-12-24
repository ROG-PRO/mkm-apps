<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");

?>


<form id="formubahdata<?= $title ?>" method="post">


  <div class="form-group">
    <label>Process Name</label>
    <input name="e_process_nm" id="e_process_nm" value="<?= $dataperprocess['process_nm'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_process" id="id_process" value="<?= $dataperprocess['id_process'] ?>">
  </div>
  <!--<div class="form-group">
    <label>Cost</label>
    <input name="e_cost_process" id="e_cost_process" value="<?= $dataperprocess['cost_process'] ?>" type="text" class="form-control">

  </div>-->


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