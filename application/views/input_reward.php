      <div class="page-title">    
        <div class="title_left">
          <h3>Reward</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tambah Reward Pengguna</h2>
              <?php foreach($data_pengguna->result_array() as $row)?>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/tambah_reward" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Nama Pengguna <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna'];?>"/>
                    <input type="text" value="<?php echo $row['nama'];?> (<?php echo $row['nik'];?>)" class="form-control" readonly>
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Reward <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="reward" class="form-control" placeholder="Masukkan Reward" required>
                    <?php echo form_error('reward'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Keterangan Reward <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="keterangan_reward"  rows="5" cols="80" required></textarea>
                    <?php echo form_error('keterangan_reward'); ?>
                  </div>
                </div>                                
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">SAVE</button>
                  </div>
                  <br><br><br><br><br>
                  <br><br><br>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>