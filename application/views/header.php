<?php error_reporting(0); ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title;?></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>asset/LOGO.png" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>asset/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url();?>asset/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url();?>asset/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url();?>asset/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url();?>asset/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>asset/css/custom.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url();?>asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
      function confirmSubmit(){
        var agree=confirm("Apakah anda yakin ingin melanjutkan aksi ini?");
        if (agree)
          return true ;
        else
          return false ;
      }
    </script>


  </head>

  <body class="nav-md">
   <div class="container body">
    <?php foreach($pengguna->result_array() as $user)?>
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>" class="site_title">
              <i class="fa">BNI</i> 
              <span><b>Work Solution</b></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $user['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><?php if($user['hak_akses']=='1'){ echo "Login as : USER";}?></h3>
                <h3><?php if($user['hak_akses']=='2'){ echo "Login as : MANAGER";}?></h3>
                <h3><?php if($user['hak_akses']=='3'){ echo "Login as : ADMIN";}?></h3>
                <h3><?php if($user['hak_akses']=='4'){ echo "Login as : EXPERT(Tenaga Ahli)";}?></h3>

                <?php if($user['hak_akses']=='1'){?></h3> <!-- As User -->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-folder"></i> Data Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/data_masalah_solusi');?>"><i class="fa fa-gear"></i> Data Case & Solusi</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url('sys/data_dokumen');?>"><i class="fa fa-file"></i> Data Dokumen</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url('sys/problem_solving');?>"><i class="fa fa-gears"></i> Solve The Problem</a>
                  </li>
                  <li><a><i class="fa fa-child"></i> My Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a><i class="fa fa-gear"></i> Case & Solusi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>"> View Case & Solusi</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_masalah_solusi');?>"> Input Case & Solusi</a>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file"></i> Data Dokumen <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/view_dokumen'); ?>"> View Data Dokumen</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_dokumen'); ?>"> Input Data Dokumen</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>                  
                  <li>
                      <a href="<?php echo base_url('sys/posting_disukai');?>"><i class="fa fa-thumbs-up"></i> Posting disukai</a>
                  </li>
                  <li><a href="<?php echo base_url('sys/daftar_pegawai');?>"><i class="fa fa-users"></i> Data Pegawai</a>
                  </li>                  
                  <li><a><i class="fa fa-trophy"></i> Reward <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/penerima_reward'); ?>"> Penerima Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/my_reward');?>">My Reward</a>
                      </li>
                    </ul>
                  </li>                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <?php } ?>

                <?php if($user['hak_akses']=='2'){?></h3> <!-- As Manager -->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-folder"></i> Data Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/data_masalah_solusi');?>"><i class="fa fa-gear"></i> Data Case & Solusi</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url('sys/data_dokumen');?>"><i class="fa fa-file"></i> Data Dokumen</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url('sys/problem_solving');?>"><i class="fa fa-gears"></i> Solve The Problem</a>
                  </li>
                  <li><a><i class="fa fa-child"></i> My Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a><i class="fa fa-gear"></i> Case & Solusi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>"> View Case & Solusi</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_masalah_solusi');?>"> Input Case & Solusi</a>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file"></i> Data Dokumen <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/view_dokumen'); ?>"> View Data Dokumen</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_dokumen'); ?>"> Input Data Dokumen</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url('sys/posting_disukai');?>"><i class="fa fa-thumbs-up"></i> Posting disukai</a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/daftar_pegawai');?>"> Daftar Pegawai <i class="label pull-right fa fa-list"></i></a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/input_pegawai');?>"> Input Pegawai <i class="label pull-right fa fa-upload"></i></a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-trophy"></i> Reward <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/penerima_reward'); ?>"> Penerima Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/kandidat_reward'); ?>"> Kandidat Penerima Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/my_reward');?>">My Reward</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <?php } ?>

                <?php if($user['hak_akses']=='3'){?></h3> <!-- As Admin -->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-folder"></i> Data Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/data_masalah_solusi');?>"><i class="fa fa-gear"></i> Data Case & Solusi</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url('sys/data_dokumen');?>"><i class="fa fa-file"></i> Data Dokumen</a>
                      </li>
                    </ul>
                  </li>
                  <li><a>
                        <i class="fa fa-gears"></i> 
                          Solve The Problem <small class="label pull-right badge bg-green"></small>
                      </a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/problem_solving');?>"><i class="fa fa-gears"></i> Solve The Problem</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/data_bagian_kerja'); ?>"> Data Bidang Kerja</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-child"></i> My Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a><i class="fa fa-gear"></i> Case & Solusi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>"> View Case & Solusi</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_masalah_solusi');?>"> Input Case & Solusi</a>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file"></i> Data Dokumen <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/view_dokumen'); ?>"> View Data Dokumen</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_dokumen'); ?>"> Input Data Dokumen</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>                  
                  <li>
                      <a href="<?php echo base_url('sys/posting_disukai');?>"><i class="fa fa-thumbs-up"></i> Posting disukai</a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/daftar_pegawai');?>"> Daftar Pegawai <i class="label pull-right fa fa-list"></i></a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/input_pegawai');?>"> Input Pegawai <i class="label pull-right fa fa-upload"></i></a>
                      </li>
                    </ul>
                  </li>
                  <li>
                      <a><i class="fa fa-check-square-o"></i> 
                        Knowledge Validation <small class="label pull-right badge bg-green" id="validasi"></small>
                      </a>
                      <ul class="nav child_menu">
                        <li>
                          <a href="<?php echo base_url('sys/validasi_masalah_solusi');?>"> 
                            Case & Solusi <small class="label pull-right badge bg-green" id="validasi_t"></small>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('sys/validasi_dokumen');?>"> 
                            Dokumen <small class="label pull-right badge bg-green" id="validasi_e"></small>
                          </a>
                        </li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-trophy"></i> Reward <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/penerima_reward'); ?>"> Penerima Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/my_reward');?>">My Reward</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <?php } ?>

                <?php if($user['hak_akses']=='4'){?></h3> <!-- As Ahli(Expert) -->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-folder"></i> Data Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/data_masalah_solusi');?>"><i class="fa fa-gear"></i> Data Case & Solusi</a>
                      </li>
                      <li>
                          <a href="<?php echo base_url('sys/data_dokumen');?>"><i class="fa fa-file"></i> Data Dokumen</a>
                      </li>
                    </ul>
                  </li>
                  <li><a>
                        <i class="fa fa-gears"></i> 
                          Solve The Problem <small class="label pull-right badge bg-green" id="revisi"></small>
                      </a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo base_url('sys/problem_solving');?>"><i class="fa fa-gears"></i> Solve The Problem</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/data_bagian_kerja'); ?>"> Data Bidang Kerja</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/data_gejala'); ?>"> Data Gejala</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/data_kasus'); ?>"> Data Kasus</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/revise'); ?>"> 
                          Data Revise <small class="label pull-right badge bg-green" id="revisi1"></small>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-child"></i> My Knowledge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a><i class="fa fa-gear"></i> Case & Solusi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>"> View Case & Solusi</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_masalah_solusi');?>"> Input Case & Solusi</a>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file"></i> Data Dokumen <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('sys/view_dokumen'); ?>"> View Data Dokumen</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('sys/input_dokumen'); ?>"> Input Data Dokumen</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url('sys/posting_disukai');?>"><i class="fa fa-thumbs-up"></i> Posting disukai</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('sys/daftar_pegawai');?>"><i class="fa fa-users"></i> Data Pegawai</a>
                  </li>
                  <li>
                    <a><i class="fa fa-check-square-o"></i> 
                      Knowledge Validation <small class="label pull-right badge bg-green" id="validasi"></small>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/validasi_masalah_solusi');?>"> 
                          Case & Solusi <small class="label pull-right badge bg-green" id="validasi_t"></small>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/validasi_dokumen');?>"> 
                          Dokumen <small class="label pull-right badge bg-green" id="validasi_e"></small>
                        </a>
                       </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-trophy"></i> Reward <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo base_url('sys/penerima_reward'); ?>"> Penerima Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/kandidat_reward');?>">Kandidat Reward</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('sys/my_reward');?>">My Reward</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
                  
            </div>
            <!-- /sidebar menu -->
            <?php } ?>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>photo/<?php echo $user['userfile'];?>" alt=""><?php echo $user['nama'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('sys/profil');?>">Profile</a>
                    </li>
                    <li><a href="<?php echo base_url('sys/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="#" id="notif" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green" id="notifikasi"></span>
                  </a>
    <script src="<?php echo base_url();?>asset/jquery.min.js" type="text/javascript"></script>
    <script>
      function cek(){
        $.ajax({
          url:  "<?php echo base_url('sys/cek_notif'); ?>",
          chace:false,
          success: function(msg){
            $('#notifikasi').html(msg);
          }
        });
        var waktu = setTimeout("cek()",2000);
      }

        $(document).ready(function(){
          cek();
          $('#notif').click(function(){
            $.ajax({
              url:  "<?php echo base_url('sys/update_notif'); ?>",
            });
          });
        });
    </script>
    <script>
      function validasi(){
        $.ajax({
          url: "<?php echo base_url('sys/cek_validasi'); ?>",
          cache: false,
          success: function(msg){
            $("#validasi").html(msg);
          }
        });
        var waktu = setTimeout("validasi()",2000);
      }

        $(document).ready(function(){
          validasi();
        });
    </script>
    <script>
      function validasi_t(){
        $.ajax({
          url: "<?php echo base_url('sys/cek_validasi_t'); ?>",
          cache: false,
          success: function(msg){
            $("#validasi_t").html(msg);
            }
        });
        var waktu = setTimeout("validasi_t()",2000);
      }

        $(document).ready(function(){
          validasi_t();
        });
    </script>
    <script>
      function validasi_e(){
        $.ajax({
          url: "<?php echo base_url('sys/cek_validasi_e'); ?>",
          cache: false,
          success: function(msg){
            $("#validasi_e").html(msg);
          }
        });
        var waktu = setTimeout("validasi_e()",2000);
      }

        $(document).ready(function(){
          validasi_e();
        });
    </script>
    <script>
      function revisi(){
        $.ajax({
          url: "<?php echo base_url('sys/cek_revisi'); ?>",
          cache: false,
          success: function(msg){
            $("#revisi").html(msg);
            $("#revisi1").html(msg);
          }
        });
        var waktu = setTimeout("revisi()",2000);
      }

      $(document).ready(function(){
        revisi();
      });
    </script>
                  <ul class="dropdown-menu list-unstyled msg_list">
                  <?php foreach($notif->result_array() as $notif){?>
                    <li>
                    <?php if($notif['kategori']=='tacit'){?>
                      <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-comments-o text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>mengomentari masalah & solusi Anda<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='explicit'){?>
                      <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-comments-o text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>mengomentari Dokumen Anda<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='like_t'){?>
                      <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-thumbs-up text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>Menyukai Posting Anda<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='like_e'){?>
                      <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-thumbs-up text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>Menyukai Posting Anda<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='v_tacit'){?>
                      <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-check-square-o text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>Masalah & Solusi divalidasi<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='v_explicit'){?>
                      <a href="<?php echo base_url('sys/view_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-check-square-o text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>Dokumen divalidasi<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    <?php if($notif['kategori']=='reward'){?>
                      <a href="<?php echo base_url('sys/my_reward');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                        <i class="fa fa-trophy text-aqua"></i> 
                          <?php echo $notif['nama'];?> <br/>Anda Mendapat Reward<br/>
                            <font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>">
                              <?php echo $notif['tgl_notif'];?>
                            </font><br/>                      
                      </a>
                    <?php } ?>
                    </li>
                  <?php } ?>                    
                    <li>
                      <div class="text-center">
                        <a href="<?php echo base_url('sys/semua_notifikasi');?>">
                          <strong>See All Notification</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">