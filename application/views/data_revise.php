      <div class="page-title">
        <div class="title_left">
          <h3>Data Revise</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel">
            <div class="x_title">
              <h2>List Data Revise</h2>
              <div class="clearfix"></div>
            </div>          
            <div class="x_content">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="8px"><center>No</th>
                    <th width="90px"><center>Masalah</th>
                    <th><center>Gejala</th>
                    <th><center>Solusi</th>
                    <th width="10px"><center>Riwayat</th>
                    <th width="10px"><center>Status</th>
                    <th width="50px"><center>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach($kasus->result_array() as $data){?>
                  <tr>
                    <td width="8px"><center>
                      <?php echo $no;?>
                    </td>
                    <td><center>
                      <?php echo $data['id_solusi'];?>  | <b><?php echo $data['nama_solusi'];?></b>
                    </td>
                    <td width="300px">
                      <table class="table table-bordered table-striped">
                        <tr class="bg-green">
                          <td colspan="2">
                            <b>Gejala</b>
                          </td>
                          <td>
                            <b>Bagian</b>
                          </td>
                        </tr>
                      <?php foreach($gejala_masalah->result_array() as $gm){
                        if($gm['id_solusi']==$data['id_solusi']) {?>
                        <tr>
                          <td width="10px">
                            <?php echo $gm['id_gejala'];?>
                          </td>
                          <td>
                            <?php echo $gm['nama_gejala'];?>
                          </td>
                          <td>
                            <?php echo $gm['nama_bdkerja'];?>
                          </td>
                        </tr>
                      <?php }} ?>
                      </table>
                    </td>

                    <td>
                      <?php echo $data['solusi_masalah'];?>
                      <?php foreach($revisi->result_array() as $re)
                      if($re['id_solusi']==$data['id_solusi']){?>
                      </br></br>
                          <div class="x_panel fixed_height_5 ">
                            <div class="x_title">
                              <h2><b>Dari Pengguna</b></h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <div style="text-align: overflow: hidden; margin: 5px 5px ;">
                                <?php echo $re['revisi'];?>
                              </div>
                            </div>
                          </div>
                      <?php } ?>
                    </td>
                    <td width="40px">
                      <?php foreach($riwayat->result_array() as $r)
                        if($data['id_solusi']==$r['id_solusi']){
                          echo $r['jumlah_riwayat']." kali";?><br/>
                          ( <a href="<?php echo base_url('sys/riwayat');?>/<?php echo $data['id_solusi'];?>">
                              Lihat
                            </a>)
                        <?php
                        }
                        if(@$r['id_solusi']!=$data['id_solusi']){
                          echo "Belum ada";
                        }
                      ?>
                    </td>
                    <td width="100px">
                      <?php if($data['validasi']==3){ echo "Rekomendasi Pengguna";}?>
                      <?php if($data['validasi']==1){ echo "Rekomendasi Sistem";}?>
                    </td>
                    <td width="70px"><center>
                      <a href="<?php echo base_url('sys/edit_revisi');?>/<?php echo $data['id_solusi'];?>">
                        <button class="btn btn-info btn-xs">
                          <i class="fa fa-edit"></i>
                        </button>
                      </a>
                      <a onClick="return confirmSubmit()" href="<?php echo base_url('sys/hapus_revisi');?>/<?php echo $data['id_solusi'];?>">
                        <button class="btn btn-danger btn-xs">
                          <i class="fa fa-trash"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>