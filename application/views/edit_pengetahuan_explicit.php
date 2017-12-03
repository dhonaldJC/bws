      <div class="page-title">    
        <div class="title_left">
          <h3>Edit Dokumen</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Edit Dokumen</h2>
                <?php foreach($explicit->result_array() as $row)?>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/update_masalah_solusi" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Judul Dokumen
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="id_explicit" value="<?php echo $row['id_explicit'];?>" class="form-control col-md-7 col-xs-12">
                    <input type="text" name="judul_explicit" value="<?php echo $row['judul_explicit'];?>" class="form-control col-md-7 col-xs-12">
                    <?php echo form_error('judul_explicit'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Keterangan
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <textarea id="editor1" name="keterangan" rows="10" cols="80"><?php echo $row['keterangan'];?></textarea>
                    <?php echo form_error('keterangan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Lampiran (pdf, doc, docx, xls, xlsx, ppt, dan pptx)
                  </label>
                    <?php echo $row['userfile'];?>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <input type="file" name="userfile">
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