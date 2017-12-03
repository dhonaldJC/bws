      <div class="page-title">    
        <div class="title_left">
          <h3>Data Pegawai</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Input Data Pegawai</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/submit_data_pegawai" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    No Induk Pegawai <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nik" class="form-control col-md-7 col-xs-12">
                    <?php echo form_error('nik'); ?>                                       
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Nama <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nama" class="form-control col-md-7 col-xs-12">
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    Jenis Kelamin
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jenis_kelamin" value="Laki-Laki" class="minimal" /> Laki-Laki
                        </label>
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jenis_kelamin" value="Perempuan" class="minimal" /> Perempuan
                        </label>
                    </div>
                    <?php echo form_error('jenis_kelamin'); ?>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    Tempat Lahir</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tempat_lahir" class="date-picker form-control col-md-7 col-xs-12" required="required">
                  </div>
                  <?php echo form_error('tempat_lahir'); ?>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    Tanggal Lahir</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tanggal lahir" class="date-picker form-control col-md-7 col-xs-12" required="required">
                  </div>
                  <?php echo form_error('tanggal_lahir'); ?>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    Bidang Kerja
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">                  
                    <select name="id_bdkerja" class="form-control">
                      <option value="" disabled selected>Pilih Bidang Kerja</option>
                    <?php foreach ($bidang_kerja->result_array() as $bk) {?>
                      <option value="<?php echo $bk['id_bdkerja'];?>"><?php echo $bk['nama_bdkerja'];?></option>
                    <?php } ?>
                    </select>
                  <?php echo form_error('id_bdkerja'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    Hak Akses</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="hak_akses" class="form-control">
                      <option value="" disabled selected>Pilih Hak Akses</option>
                      <option value="1">USER</option>
                      <option value="2">MANAGER</option>
                      <option value="3">ADMIN</option>
                      <option value="4">EXPERT(Tenaga Ahli)</option>
                    </select>
                    <?php echo form_error('hak_akses'); ?>
                  </div>
                </div>                
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
                  <br><br><br><br><br>
                  <br><br><br><br><br>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>