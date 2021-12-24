<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");

?>



<form id="formubahdata<?= $title ?>" method="post">

  <div class="form-group">
    <label>Nama kategori</label>
    <input name="e_nm_kategori" id="e_nm_kategori" value="<?= $dataperkategori['nm_kategori'] ?>" type="text" class="form-control">
    <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $dataperkategori['id_kategori'] ?>">
  </div>
  <div class="form-group">
    <label>Nama kategori</label>
    <input name="e_deskripsi" id="e_deskripsi" value="<?= $dataperkategori['deskripsi'] ?>" type="text" class="form-control">

  </div>


  <div class="form-group">
    <input name="update_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="update_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary">Update <?php echo $title ?></button>
  </div>
</form>



<form id="formcreatequotation" method="post">

  <div class="form-group">
    <label>Nama <?= $title ?></label>
    <input name="e_nm_kategori" id="e_nm_kategori" value="<?= $title ?>" type="text" class="form-control">
    <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $dataperinquiry['id_inquiry'] ?>">
  </div>
  <div class="form-group">
    <label>Nama kategori</label>
    <input name="e_deskripsi" id="e_deskripsi" value="<?= $dataperinquiry['id_inquiry'] ?>" type="text" class="form-control">

  </div>


  <div class="form-group">
    <input name="update_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  </div>
  <div class="form-group">
    <input name="update_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary">Update <?php echo $title ?></button>
  </div>
</form>