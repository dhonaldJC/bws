    <div class="page-title">
      <div class="title_left">
        <h3>Profile</h3>
      </div>
    </div>
		      <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile <small></small></h2>
                    <?php foreach($pegawai->result_array() as $user)?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" alt="Avatar" title="Change the avatar">
                          <!-- Loading state -->
                          <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->
                      </div>

                      <h2><br><?php echo $user['nama'];?></h2>
                      <h4>(
                        <?php if($user['hak_akses']  ==  '1'){ echo "USER";}?>
                        <?php if($user['hak_akses']  ==  '2'){ echo "MANAGER";}?>
                        <?php if($user['hak_akses']  ==  '3'){ echo "ADMIN";}?>
                        <?php if($user['hak_akses']  ==  '4'){ echo "EXPERT(Tenaga Ahli)";}?>  )                      
                      </h4><br>
                      <ul class="list-unstyled user_data">
                        <li>
                          <i class="fa fa-file"></i> NIK : <?php echo $user['nik'];?>
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i> Tempat Lahir : <?php echo $user['tempat_lahir'];?>
                        </li>
                        <li class="m-top-xs">
                          <i class="fa fa-calendar-o"></i> Tanggal Lahir : <?php echo $user['tanggal_lahir'];?>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                      </div>
                      <br><br>
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active">
                            <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Case & 
                              Solusi
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
                                  foreach($tacit->result_array() as $data){ ?>
                                  <tr>
                                    <td><br>
                                      <div class="col-md-12 col-sm-6 col-xs-12">
                                        <div class="x_panel fixed_height_10 ">
                                          <div class="x_title">
                                            <div class="x_content">
                                            <h2><b>
                                              <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $data['id_tacit'];?>">
                                                <?php echo $data['judul_tacit'];?>
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
                                                  <?php echo $data['masalah'];?>
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
                                  }?>
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
                                  foreach($explicit->result_array() as $data){ ?>
                                  <tr>
                                    <td><br>
                                      <div class="col-md-12 col-sm-6 col-xs-12">
                                        <div class="x_panel fixed_height_10 ">
                                          <div class="x_title">
                                            <div class="x_content">
                                            <h2>
                                              <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $data['id_explicit'];?>">
                                                <?php echo $data['judul_explicit'];?>
                                              </a>
                                            </h2>
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
                                                  <?php echo $data['keterangan'];?>
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
                                  }?>
                                </tbody>
                              </table>
                            <!-- end user document -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>		