    <div class="page-title">
      <div class="title_left">
        <h3>
          <?php 
          if(empty($_POST['search'])){
            redirect(base_url('sys/index'), 'refresh');
          }
                echo "Searching for .. ".$keyword  = $_POST['search'];
          ?>          
        </h3>
      </div>
    </div>
    <?php foreach($pengguna->result_array() as $user)?>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                  Case & Solusi
                  </a>
                </li>
                <li role="presentation" class="">
                  <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                  Document
                  </a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                  <!-- start recent activity case & Solusi -->
                    <table id="example2" class="table">
                      <thead>
                        <tr>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($tacit->result_array() as $data){ 
                          $judul  = $data['judul_tacit'];
                          $text   = $data['masalah'];

                            $keyword          = $_POST['search'];
                            $pattern          = preg_replace('/\s|\t|\r|\n/', '|', $keyword);
                            $search_judul     = preg_replace("/$pattern/i", '<b>\0</b>', $judul);
                            $search_masalah   = preg_replace("/$pattern/i", '<b>\0</b>', $text);
                            
                            if($search_judul != $judul || $search_masalah != $text){
                        ?>
                        <tr>
                          <td><br>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                              <div class="x_panel fixed_height_10 ">
                                <div class="x_title">
                                  <div class="x_content">
                                  <h2><b>
                                    <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>">
                                      <?php echo $search_judul;?>
                                    </a>
                                  </h2></b>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <a style="font-size:12px;color:gray" href="<?php echo base_url('sys/pengguna');?>/<?php echo $data['id_pengguna'];?>"> 
                                        <i class="fa fa-user"></i> 
                                        <?php echo $data['nama'];?>
                                      </a>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a style="font-size:12px;color:gray">
                                        <i class="fa fa-clock-o"></i> 
                                        <font class='timeago' title="<?php echo $data['tgl_post'];?>">
                                          <?php echo $data['tgl_post'];?>
                                        </font>
                                      </a>
                                    </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="x_content">
                                    <br>
                                      <div class="timeline-body">
                                        <?php echo $search_masalah;?>
                                      </div>
                                    <br>
                                    </div>
                                    <div class="clearfix"></div>
                                      <h3 class="timeline-header"></h3>
                                      <div class="timeline-footer">
                                        <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>" class="btn btn-round btn-success btn-xs">
                                          VIEW SOLUSI
                                        </a>
                                        <span style="float:right">
                                          <i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
                                          <i class="fa fa-comments-o"></i> <?php echo $data['komentar'];?> komentar
                                        </span>
                                      </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        }}?>
                      </tbody>
                    </table>
                  <!-- end recent activity case & Solusi -->

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                  <!-- start user document -->
                    <table id="example3" class="table">
                      <thead>
                        <tr>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($explicit->result_array() as $data){ 
                          $judul  = $data['judul_explicit'];
                          $text   = $data['keterangan'];

                            $keyword        = $_POST['search'];
                            $pattern          = preg_replace('/\s|\t|\r|\n/', '|', $keyword);
                            $search_judul     = preg_replace("/$pattern/i", '<b>\0</b>', $judul);
                            $keterangan       = preg_replace("/$pattern/i", '<b>\0</b>', $text);
                            
                            if($search_judul != $judul || $keterangan != $text){
                        ?>
                        <tr>
                          <td><br>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                              <div class="x_panel fixed_height_10 ">
                                <div class="x_title">
                                  <div class="x_content">
                                  <h2><b>
                                    <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $data['id_explicit'];?>">
                                      <?php echo $search_judul;?>
                                    </a>
                                  </h2></b>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <a style="font-size:12px;color:gray" href="<?php echo base_url('sys/pengguna');?>/<?php echo $data['id_pengguna'];?>"> 
                                        <i class="fa fa-user"></i> 
                                        <?php echo $data['nama'];?>
                                      </a>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a style="font-size:12px;color:gray">
                                        <i class="fa fa-clock-o"></i> 
                                        <font class='timeago' title="<?php echo $data['tgl_post'];?>">
                                          <?php echo $data['tgl_post'];?>
                                        </font>
                                      </a>
                                    </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="x_content">
                                    <br>
                                      <div class="timeline-body">
                                        <?php echo $keterangan;?>
                                      </div>
                                    <br>
                                    </div>
                                    <div class="clearfix"></div>
                                      <h3 class="timeline-header"></h3>
                                      <div class="timeline-footer">
                                        <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $data['id_explicit'];?>" class="btn btn-round btn-success btn-xs">
                                          SELENGKAPNYA
                                        </a>
                                        <span style="float:right">
                                          <i class="fa fa-thumbs-o-up"></i> <?php echo $data['like'];?> menyukai &nbsp;&nbsp;&nbsp;
                                          <i class="fa fa-comments-o"></i> <?php echo $data['komentar'];?> komentar
                                        </span>
                                      </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        }}?>
                      </tbody>
                    </table>
                  <!-- end user document -->
                </div>
              </div>  
            </div>
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