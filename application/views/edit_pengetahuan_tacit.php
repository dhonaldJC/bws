      <div class="page-title">    
        <div class="title_left">
          <h3>Edit Case & Solusi</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Edit Case & Solusi</h2>
                <?php foreach($tacit->result_array() as $row)?>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/update_masalah_solusi" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Judul Case
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="id_tacit" value="<?php echo $row['id_tacit'];?>" class="form-control col-md-7 col-xs-12">
                    <input type="text" name="judul_tacit" value="<?php echo $row['judul_tacit'];?>" class="form-control col-md-7 col-xs-12">
                    <?php echo form_error('judul_tacit'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Case 
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <textarea id="editor1" name="masalah" rows="10" cols="80"><?php echo $row['masalah'];?></textarea>
                    <?php echo form_error('masalah'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Solusi
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <textarea id="editor2" name="solusi" rows="10" cols="80"><?php echo $row['solusi'];?></textarea>
                  </div>
                  <?php echo form_error('solusi'); ?>
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