    <div class="page-title">
      <div class="title_left">
        <h3>Edit Profile</h3>
      </div>
    </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Edit Profile</h2>
                <?php foreach($pegawai->result_array() as $row)?>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/update_password" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    No Induk Pegawai <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna'];?>" class="form-control col-md-7 col-xs-12">
                    <input type="text" name="nik" value="<?php echo $row['nik'];?>" class="form-control col-md-7 col-xs-12" readonly>
                    <?php echo form_error('nik'); ?>                                       
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="control-label col-md-3">
                    Password Baru
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Masukkan Password Baru" required="required">
                    <?php echo form_error('password'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password1" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Konfirmasi Password Baru 
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password1" data-validate-linked="password" class="form-control col-md-7 col-xs-12" placeholder="Masukkan Konfirmasi Password Baru" required="required">
                  <?php echo form_error('password1'); ?>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
                  <br><br><br><br><br><br>
                  <br><br><br><br><br><br>
                  <br><br><br><br><br>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>