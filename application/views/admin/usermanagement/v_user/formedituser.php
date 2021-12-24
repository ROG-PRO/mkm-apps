<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri3 = $this->uri->segment(3);
?>



<form id="formubahdata<?= $uri3 ?>" method="post" class="form-horizontal">

  <div class="form-group">
    <label>NIK</label>
    <input name="e_username" id="e_username" value="<?= $dataperuser['username'] ?>" type="text" class="form-control">
    <input type="text" name="user_id" id="user_id" value="<?= $dataperuser['user_id'] ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="e_password" id="e_password" value="<?= $dataperuser['password'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="e_fullname" id="e_fullname" value="<?= $dataperuser['fullname'] ?>" type="text" class="form-control">
  </div>



  <div class="form-group">
    <label>Role</label>
    <select name="e_roleid" id="e_roleid" class="form-control" required>
      <option value="">- Pilih Section -</option>

      <?php
      foreach ($role as $row) {
        echo "<option value='$row->roleid'";
        echo $dataperuser['role_id'] == $row->roleid ? 'selected' : '';
        echo ">$row->role</option>";
      }
      ?>


    </select>
  </div>

  <div class="form-group">
    <input name="update_by" id="update_by" type="text" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="update_dt" id="update_dt" type="text" class="form-control" value="<?php echo $today; ?>">
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>