<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri3 = $this->uri->segment(3);
?>



<form id="formubahdata<?= $uri3 ?>" method="post" class="form-horizontal">

  <div class="form-group">
    <label>User Access Menu</label>
    <input name="e_role_id" id="e_role_id" value="<?= $dataperuser_access_menu['role_id'] ?>" type="text" class="form-control">
    <input type="text" name="uam_id" id="uam_id" value="<?= $dataperuser_access_menu['id'] ?>">
  </div>
  <div class="form-group">
    <label>Menu ID</label>
    <input name="e_menu_id" id="e_menu_id" value="<?= $dataperuser_access_menu['menu_id'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Sequence No</label>
    <input name="e_seq_no" id="e_seq_no" value="<?= $dataperuser_access_menu['seq_no'] ?>" type="text" class="form-control">
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>