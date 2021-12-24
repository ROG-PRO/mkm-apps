<!--start modal input -->
<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->username;
$today = date("Y-m-d H:i:s");
?>


    <form id="__formcreatequotation" action="<?= base_url('marketing/inquiry/createquotation') ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Inquiry Number</label>
        <div class="col-sm-6">
          <input name="id_inquiry" id="id_inquiry" value="<?= $dataperinquiry['id_inquiry'] ?>" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">To </label>
        <div class="col-sm-6">
          <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="customer_contact" name="customer_contact" value="<?= $dataperinquiry['customer_contact'] ?>" placeholder="Customer contact">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">Subject </label>
        <div class="col-sm-6">
          <input style="border: 1px solid grey-light; " type="text" class="form-control form-control-sm" id="subject" name="subject" value="<?= $dataperinquiry['subject'] ?>" placeholder="subject">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="cust_reff" style="text-align:right;">Customer reff.</label>
        <div class="col-sm-6">
          <input name="cust_reff" id="cust_reff" value="<?= $dataperinquiry['cust_reff'] ?>" type="text" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="attention" style="text-align:right;">Attention</label>
        <div class="col-sm-6">
          <input name="attention" id="attention" value="<?= $dataperinquiry['attention'] ?>" type="text" class="form-control">
        </div>
      </div>
    
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="attention" style="text-align:right;">Quantity</label>
        <div class="col-sm-6">
          <input name="qty" id="qty" value="<?= $dataperinquiry['qty'] ?>" type="text" class="form-control">
        </div>
      </div>
    </div>

    <div class="form-group col-md-6">
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="job" style="text-align:right;">Job</label>
        <div class="col-sm-6">
          <input name="job" id="job" value="<?= $dataperinquiry['job'] ?>" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="validity_price" style="text-align:right;">validity_price</label>
        <div class="col-sm-6">
          <input name="validity_price" id="validity_price" value="<?= $dataperinquiry['validity_price'] ?>" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="" style="text-align:right;">excluded</label>
        <div class="col-sm-6">
          <input name="excluded" id="excluded" value="<?= $dataperinquiry['excluded'] ?>" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="payment_term" style="text-align:right;">payment_term</label>
        <div class="col-sm-6">
          <input name="payment_term" id="payment_term" value="<?= $dataperinquiry['payment_term'] ?>" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" name="working_schedule" style="text-align:right;">working_schedule</label>
        <div class="col-sm-6">
          <input name="working_schedule" id="working_schedule" value="<?= $dataperinquiry['working_schedule'] ?>" type="text" class="form-control">
        </div>
      </div>
    </div>

  </div>
  
    <input name="update_by" id="update_by" type="hidden" class="form-control" value="<?php echo $user; ?>">
  
    <input name="update_dt" id="update_dt" type="hidden" class="form-control" value="<?php echo $today; ?>">



  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Create Quotation</button>
  </div>
</form>