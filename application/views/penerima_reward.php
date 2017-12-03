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
                    <h2>Penerima Reward</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="example1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><center>No</th>
                          <th><center>Nama</th>
                          <th><center>Photo</th>
                          <th><center>Bidang Kerja</th>
                          <th><center>Reward</th>
                          <th><center>Keterangan</th>
                          <th><center>Tanggal Reward</th>                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $no   = 1;
                      foreach ($reward->result_array() as $data)  {
                      ?>
                        <tr>
                          <td width="10px"><center>
                            <?php echo $no;?>
                          </td>
                          <td>
                            <?php echo $data['nama'];?>
                          </td>
                          <td width="100px">
                            <img src="<?php echo base_url('photo');?>/<?php echo $data['userfile'];?>" width="100px"/>
                          </td>
                          <td>
                            <?php echo $data['nama_bdkerja'];?>
                          </td>
                          <td>
                            <?php echo $data['reward'];?>
                          </td>
                          <td>
                            <?php echo $data['keterangan_reward'];?>
                          </td>
                          <td>
                            <?php echo $data['tgl_reward'];?>
                          </td>
                        </tr>
                      <?php
                      $no++;
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->