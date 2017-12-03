
      <div class="page-title">    
        <div class="title_left">
          <h3>Dokumen</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Input Dokumen</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form action="<?php echo base_url();?>sys/submit_dokumen" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Judul Dokumen <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="judul_explicit" class="form-control col-md-7 col-xs-12">
                    <?php echo form_error('judul_explicit'); ?>                                       
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Keterangan<span class="required"></span>
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <textarea id="editor1" name="keterangan" rows="10" cols="80"></textarea>
                    <?php echo form_error('keterangan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    Lampiran (pdf, doc, docx, xls, xlsx, ppt, dan pptx)</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">                  
                    <input type="file" name="userfile" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>