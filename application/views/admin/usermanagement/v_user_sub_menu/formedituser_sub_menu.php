<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri3 = $this->uri->segment(3);
?>



<form id="formubahdata<?= $uri3 ?>" method="post" class="form-horizontal">

  <!-- <div class="form-group">
    <label>NIK</label>
    <input name="e_username" id="e_username" value="<?= $dataperuser_sub_menu['username'] ?>" type="text" class="form-control">
    <input type="text" name="user_id" id="user_id" value="<?= $dataperuser_sub_menu['user_id'] ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="e_password" id="e_password" value="<?= $dataperuser_sub_menu['password'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="e_fullname" id="e_fullname" value="<?= $dataperuser_sub_menu['fullname'] ?>" type="text" class="form-control">
  </div> -->


  <input name="usm_id" id="usm_id" value="<?= $dataperuser_sub_menu['id'] ?>" type="text" class="form-control">

  <div class="form-group">
    <label>Menu_id</label>
    <select name="e_menu_id" id="e_menu_id" class="form-control" required>
      <option value="">- Pilih Section -</option>

      <?php
      foreach ($role as $row) {
        echo "<option value='$row->roleid'";
        echo $dataperuser_sub_menu['menu_id'] == $row->roleid ? 'selected' : '';
        echo ">$row->roleid | $row->role</option>";
      }
      ?>


    </select>
  </div>
  <div class="form-group">
    <label>Title</label>
    <input name="e_controller" id="e_controller" value="<?= $dataperuser_sub_menu['controller'] ?>" type="text" class="form-control">
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>