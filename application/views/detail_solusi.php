<?php
if($this->uri->segment('3')==''){
	redirect(base_url('sys/problem_solving'), 'refresh');
}
?>
<?php foreach($pengguna->result_array() as $user)?>
    <div class="page-title">
      <div class="title_left">
        <h3>Detail Case & Solusi</h3>
      </div>
    </div>
	<?php foreach($detail_solusi->result_array() as $data)?>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><b><?php echo $data['nama_solusi'];?></b>
              </h2>
              <div style="float:right">
              <?php if($data['validasi']=='3'){ 
                echo "<h2>Dalam Proses Revisi</h2>";
              } ?>
              </div>
              <div class="clearfix"></div>
            </div><br>
              <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_10 ">
                  <div class="x_title">
                    <h2><b>Gejala</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div style="text-align: overflow: hidden; margin: 10px 10px ;">
											<table class="table table-bordered table-striped">
												<?php foreach($tmp_gejala->result_array() as $gm){?>
													<tr>
														<td width="10px"><?php echo $gm['id_gejala'];?></td>
														<td><?php echo $gm['nama_gejala'];?></td>
													</tr>
												<?php } ?>
											</table>
										</div>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_10 ">
                  <div class="x_title">
                    <h2><b>Solusi</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div style="text-align: overflow: hidden; margin: 10px 10px ;">
											<?php echo $data['solusi_masalah']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php if($riwayat->num_rows()>0){?>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_10 ">
                  <div class="x_title">
                    <h2><b>Riwayat Solusi</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div style="text-align: overflow: hidden; margin: 10px 10px ;">
											<table class="table table-bordered table-striped">
												<?php foreach($riwayat->result_array() as $r){?>
												<tr>
													<td><?php echo $r['solusi_masalah']; ?></td>
												</tr>
												<?php } ?>
											</table>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>

              <div class="col-md-12 col-sm-6 col-xs-12">
                <br>
									<!-- revisi pengguna --->
									<script> 
									$(document).ready(function(){
										$("#flip").click(function(){
											$("#panel").slideDown("medium");
										});
									});
									</script>
									 
									<style> 
									#panel {
										display: none;
									}
									</style>                
									<?php 
									if($data['nama_solusi']!="Kasus belum ada di database"){
									if($data['validasi']!='3'){?>

			            <div class="x_content">
										<div class="x_panel fixed_height_100 ">
											<div id="flip" class="box-header">
												<b><h2 class="box-title">* Klik disini apabila terdapat kesalahan dalam rekomendasi solusi</h2></b>
											</div><!-- /.box-header -->
											<div id="panel" class="box-body">
											Mohon masukan revisi yang Anda berikan 
											<form action="<?php echo base_url();?>sys/revisi_solusi" method="post" enctype="multipart/form-data">
												<input type="hidden" name="id_solusi" value="<?php echo $data['id_solusi'];?>"/>
													<textarea name="revisi" class="form-control" required></textarea>
												<input type="hidden" name="id_pengguna" value="<?php echo $user['id_pengguna'];?>"/></br>
												<button type="submit" class="btn btn-primary">Revisi Solusi</button>
											</form>
											</div>
										</div>
										<?php } }?>
									<!-- .revisi pengguna --->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>