    <div class="page-title">
      <div class="title_left">
        <h3>Edit Solusi</h3>
      </div>
    </div>
    <?php foreach($solusi->result_array() as $data)?>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <form action="<?php echo base_url();?>sys/update_solusi" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                  <label>Masalah</label>
                  <input type="text" name="nama_solusi" value="<?php echo $data['nama_solusi'];?>" class="form-control">
                  <input type="hidden" name="r_id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
                  <input type="hidden" name="r_nama_solusi" value="<?php echo $data['nama_solusi'];?>" class="form-control">
                  <input type="hidden" name="r_solusi_masalah" value="<?php echo $data['solusi_masalah'];?>" class="form-control">
                  <?php echo form_error('nama_solusi'); ?>
                </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_10 ">
                  <div class="x_title">
                    <h2><b>Gejala</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered table-striped">
                      <?php foreach($gejala_masalah->result_array() as $gm){
                        if($gm['id_solusi']==$data['id_solusi']) {?>
                        <tr>
                          <td width="10px">
                            <?php echo $gm['id_gejala'];?>
                          </td>
                          <td>
                            <?php echo $gm['nama_gejala'];?>
                          </td>
                          <td width="10px">
                            <form action="<?php echo base_url();?>sys/delete_gejala" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_gejala" value="<?php echo $gm['id_gejala'];?>" class="form-control" readonly>
                              <input type="hidden" name="id_solusi" value="<?php echo $gm['id_solusi'];?>" class="form-control" readonly>
                              <button type="submit" class="btn  btn-danger btn-sm"><i class="fa fa-close"></i></button>
                            </form>
                          </td>
                        </tr>
                      <?php }} ?>
                        <tr>
                          <form action="<?php echo base_url();?>sys/tambah_gejala" method="post" enctype="multipart/form-data">
                            <td colspan='2'>
                              <input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
                              <select name="id_gejala" class="form-control" style="width: 100%;">
                                <?php foreach($gejala->result_array() as $g){?>
                                  <option value="<?php echo $g['id_gejala'];?>">
                                    <?php echo $g['nama_gejala'];?>
                                  </option>
                                <?php } ?>
                              </select>
                            </td>
                            <td width="10px"><button type="submit" class="btn  btn-info btn-sm"><i class="fa fa-plus"></i></button></td>
                          </form>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_10 ">
                  <div class="x_title">
                    <h2><b>Solusi</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php foreach($revisi->result_array() as $re)
                    if($re['id_solusi']==$data['id_solusi']){?>
                      <div class="x_panel">
                        <div class="x_content">
                          <?php echo $data['solusi_masalah'];?>                 
                          <br/>
                        </div>
                      </div>
                    <?php } ?>
                    <textarea id="editor1" name="solusi_masalah" rows="10" cols="80"><?php echo @$re['revisi'];?></textarea>
                    <?php echo form_error('solusi_masalah'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div>
                  <button type="submit" class="btn btn-success">Update Kasus</button>
                </div>
                <form action="<?php echo base_url();?>sys/batal_revisi_pengguna" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>" class="form-control" readonly>
                  <button type="submit" class="btn btn-danger">Batal</button>
                </form>
              </div>
            </form>
          </div>
        </div>
      </div>

  <script type="text/javascript"  src="<?php echo base_url();?>asset/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
  <script type="text/javascript">
    var $j = jQuery.noConflict();
    $j(document).ready(function() 
      {
        $j("font.timeago").timeago();
        $j("font.timeago1").timeago();
      });
  </script>