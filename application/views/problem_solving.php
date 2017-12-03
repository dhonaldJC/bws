<?php foreach($pengguna->result_array() as $user)?>
    <div class="page-title">
    </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="form-group">                
                    <form action="<?php echo base_url();?>sys/cari_solusi" method="post" enctype="multipart/form-data" data-parsley-validate>
                      <div class="x_title">
                        <center>
                          <h3>Gejala - Gejala Permasalahan Bank<small></small></h3>
                        </center>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="example7" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Bagian Kerja</th>
                              <th>Gejala</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no=0;
                            foreach($gejala->result_array() as $g) {?>
                              <tr>
                                <td width="10px">
                                  <input type="checkbox" class="js-switch" name="inp[<?php echo $no;?>][id_gejala]" value="<?php echo $g['id_gejala'];?>" class="checkbox">
                                </td>
                                <td width="200px"><center>
                                  <?php echo $g['nama_bdkerja'];?>
                                </td>
                                <td>
                                  <?php echo $g['nama_gejala'];?>
                                </td>
                              </tr>
                            <?php 
                            $no++;
                            }
                            ?>
                          </tbody>
                        </table>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary"> Get Solution !! </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->