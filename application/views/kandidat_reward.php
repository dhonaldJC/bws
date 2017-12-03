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
                    <h2>Kandidat Penerima Reward</h2>
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
                          <th><center>NIK</th>
                          <th><center>Photo</th>
                          <th><center>Bidang Kerja</th>
                          <th><center>Poin</th>
                          <th><center>Reward</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $no   = 1;
                      foreach ($kandidat->result_array() as $data)  {
                      ?>
                        <tr>
                          <td width="10px"><center>
                            <?php echo $no;?>
                          </td>
                          <td>
                            <?php echo $data['nama'];?>
                          </td>
                          <td>
                            <?php echo $data['nik'];?>
                          </td>                          
                          <td width="100px">
                            <img src="<?php echo base_url('photo');?>/<?php echo $data['userfile'];?>" width="100px"/>
                          </td>
                          <td>
                            <?php echo $data['nama_bdkerja'];?>
                          </td>
                          <td><center>  
                            <?php echo $data['poin'];?> Poin
                          </td>
                          <td width="100px"><center>
                            <a onClick="return confirmSubmit()" href="<?php echo base_url('sys/input_reward');?>/<?php echo $data['id_pengguna'];?>">
                              <button class="btn btn-round btn-info btn-sm">
                                <i class="fa fa-gift"></i> REWARD
                              </button>
                            </a>
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