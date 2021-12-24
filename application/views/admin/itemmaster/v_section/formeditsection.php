<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>



<form id="formubahdatasection" method="post">

  <div class="form-group">
    <label>Section Cede</label>
    <input name="section_cd" id="e_section_cd" value="<?= $datapersection['section_cd'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_section" id="id_section" value="<?= $datapersection['id_section'] ?>">
  </div>
  <div class="form-group">
    <label>Part name</label>
    <input name="section_nm" id="e_section_nm" value="<?= $datapersection['section_nm'] ?>" type="text" class="form-control">
  </div>




  <div class="form-group">
    <input name="created_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="created_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>