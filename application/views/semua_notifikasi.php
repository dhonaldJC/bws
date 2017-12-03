    <div class="page-title">
      <div class="title_left">
        <h3>Semua Notifikasi</h3>
      </div>
    </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <table id="example2" class="table">
              <thead>
                <tr>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($notif->result_array() as $notif){?>
                <tr>
                  <td><br>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <div class="x_panel fixed_height_10 ">
                          <div class="x_content">
                            <?php if($notif['kategori']=='tacit'){?>
                              <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                                <i class="fa fa-comments-o text-aqua"></i> <?php echo $notif['nama'];?> mengomentari masalah & solusi Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='explicit'){?>
                              <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                                <i class="fa fa-comments-o text-aqua"></i> <?php echo $notif['nama'];?> mengomentari dokumen Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='like_t'){?>
                              <a href="<?php echo base_url('sys/detail_masalah_solusi');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                                <i class="fa fa-heart text-aqua"></i> <?php echo $notif['nama'];?> menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='like_e'){?>
                              <a href="<?php echo base_url('sys/detail_dokumen');?>/<?php echo $notif['id_posting'];?>" style="height:auto;">
                                <i class="fa fa-heart text-aqua"></i> <?php echo $notif['nama'];?> menyukai posting Anda<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='v_tacit'){?>
                              <a href="<?php echo base_url('sys/lihat_masalah_solusi');?>" style="height:auto;">
                                <i class="fa fa-certificate text-aqua"></i> Masalah & Solusi divalidasi<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='v_explicit'){?>
                              <a href="<?php echo base_url('sys/view_dokumen');?>" style="height:auto;">
                                <i class="fa fa-certificate text-aqua"></i> Dokumen divalidasi<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
                            <?php if($notif['kategori']=='reward'){?>
                              <a href="<?php echo base_url('sys/my_reward');?>" style="height:auto;">
                                <i class="fa fa-gift text-aqua"></i> Anda mendapatkan reward<br/><font class='timeago' style="font-size:10px" title="<?php echo $notif['tgl_notif'];?>"><?php echo $notif['tgl_notif'];?></font><br/>
                              </a>
                            <?php } ?>
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