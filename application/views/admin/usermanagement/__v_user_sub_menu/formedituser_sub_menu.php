<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
$uri3 = $this->uri->segment(3);
?>



<form id="formubahdata<?= $uri3 ?>" method="post" class="form-horizontal">


  <div class="form-group">
    <label>menu_id</label>
    <select name="e_menu_id" id="e_menu_id" class="form-control" required>
      <option value="">- Pilih Section -</option>

      <?php
      foreach ($role as $row) {
        echo "<option value='$row->roleid'";
        echo $dataperuser_sub_menu['menu_id'] == $row->roleid ? 'selected' : '';
        echo ">$row->roleid  $row->role</option>";
      }
      ?>


    </select>
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="id" id="id" value="<?= $dataperuser_sub_menu['id'] ?>">
    <input name="e_title" id="e_title" value="<?= $dataperuser_sub_menu['title'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Url</label>
    <input name="e_url" id="e_url" value="<?= $dataperuser_sub_menu['url'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>controller</label>
    <input name="e_controller" id="e_controller" value="<?= $dataperuser_sub_menu['controller'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Icon</label>
    <input name="e_icon" id="e_icon" value="<?= $dataperuser_sub_menu['icon'] ?>" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Is active</label>
    <input name="e_is_active" id="e_is_active" value="<?= $dataperuser_sub_menu['is_active'] ?>" type="text" class="form-control">
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