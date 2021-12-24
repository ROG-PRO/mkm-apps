<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>



<form id="formubahdatamtltype" method="post">

  <div class="form-group">
    <label>Mtltype Cede</label>
    <input name="e_mtl_type_cd" id="e_mtl_type_cd" value="<?= $datapermtltype['mtl_type_cd'] ?>" type="text" class="form-control">
    <input type="text" name="mtl_type_id" id="mtl_type_id" value="<?= $datapermtltype['mtl_type_id'] ?>">
  </div>
  <div class="form-group">
    <label>Part name</label>
    <input name="e_mtl_type_desc" id="e_mtl_type_desc" value="<?= $datapermtltype['mtl_type_desc'] ?>" type="text" class="form-control">
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
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>