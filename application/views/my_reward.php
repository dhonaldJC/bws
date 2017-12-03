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
                    <h2>My Reward<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30" $().DataTable();>
                    </p>
                    <table id="example1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><center>No</th>
                          <th><center>Reward</th>
                          <th><center>Keterangan Reward</th>
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
<!-- jQuery -->    
    <script src="<?php echo base_url();?>asset/jquery.min.js"></script>
    <script src="<?php echo base_url();?>asset/jquery.timeago.js" type="text/javascript"></script>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery("font.timeago").timeago();
      });
    </script>