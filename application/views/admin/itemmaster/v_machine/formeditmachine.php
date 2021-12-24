<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");

?>



<form id="formubahdata<?= $title ?>" method="post">

  <div class="form-group">
    <label>Machine Type</label>
    <input name="e_type_machine" id="e_type_machine" value="<?= $datapermachine['type_machine'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_machine" id="id_machine" value="<?= $datapermachine['id_machine'] ?>">
  </div>
  <div class="form-group">
    <label>Machine Cost</label>
    <input name="e_cost_machine" id="e_cost_machine" value="<?= $datapermachine['cost_machine'] ?>" type="text" class="form-control">

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