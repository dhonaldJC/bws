      <div class="page-title">
        <div class="title_left">
          <h3>Data Kasus</h3>
        </div>
      </div>
<?php foreach($kode_kasus->result_array() as $rows)?>
<?php
  $no = @$rows['urut'] + 1;
  if(strlen($no) == '1'){
    $kd_solusi = "S00".$no;
  }
    elseif(strlen($no) == '2'){
      $kd_solusi = "S0".$no;
    }
      elseif(strlen($no) == '3'){
        $kd_solusi = "S".$no;
      }
?> 
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>asset/jquery.dataTables.js"></script>
<script>
var $jj = jQuery.noConflict();
$jj(document).ready(function() {
    var max_fields      = 10; // Batas jumlah baris form
    var wrapper         = $jj(".tambah"); //Pembungkus baris form yang baru (ditambahkan)
    var add_button      = $jj(".tmbh");  // ID tombol untuk menambahkan baris form
    var x = 1;

    $jj(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++; 
            $jj(wrapper).append(
              '<div>'+
                '<div class="form-group col-md-10">'+
                  '<label>Gejala '+ x +'</label>'+
                    '<input type="hidden" name="inp['+ x +'][id_solusi]id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>'+
                    '<select name="inp['+ x +'][id_gejala]" class="form-control select2" style="width: 100%;">'+
                      <?php foreach($gejala->result_array() as $g){?>
                        '<option value="<?php echo $g['id_gejala'];?>"><?php echo $g['nama_gejala'];?></option>'+
                      <?php } ?>
                    '</select>'+
                '</div>'+
                '<br/><button class="form-group col-md-1 btn btn-danger hapus"><i class="fa fa-close"></i></button><div style="clear:both"></div>'+
              '</div>'
            ); 
            //muncul ketika button tambah diklik
        }
    });
    
    $jj(wrapper).on("click",".hapus", function(e){  //Hapus 1 baris form
      e.preventDefault(); 
      $jj(this).parent('div').remove(); x--;
    })
});
</script>     
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Input Data Kasus</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="demo-form"  action="<?php echo base_url();?>sys/submit_kasus" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group col-md-3">
                  <label class="col-md-2col-xs-12">
                    Kode Solusi
                  </label>
                    <input type="text" name="id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>
                    <input type="hidden" name="urut" value="<?php echo $no;?>" class="form-control">
                </div>
                <div class="form-group col-md-10">
                  <label>
                    Gejala 1
                  </label>
                    <input type="hidden" name="inp[0][id_solusi]id_solusi" value="<?php echo $kd_solusi;?>" class="form-control" readonly>
                    <select name="inp[0][id_gejala]" class="form-control select2" style="width: 100%;">
                      <?php foreach($gejala->result_array() as $g){?>
                        <option value="<?php echo $g['id_gejala'];?>">
                          <?php echo $g['nama_gejala'];?>
                        </option>
                      <?php } ?>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="tambah"></div>
                <div class="form-group col-md-8">
                  <button class="btn btn-xs btn-primary tmbh"><i class="fa fa-plus"></i> Tambah Gejala</button>
                </div>
                <div class="form-group col-md-6">
                  <label>
                    Nama Kasus
                  </label>
                    <input type="text" name="nama_solusi" class="form-control">
                    <?php echo form_error('nama_solusi'); ?>
                </div>
                <div class="form-group col-md-10">
                  <label>
                    Solusi
                  </label>
                    <textarea id="editor1" name="solusi_masalah" rows="10" cols="80"></textarea>
                    <?php echo form_error('solusi_masalah'); ?>
                </div>
                <div class="form-group col-md-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>

          <div class="x_panel">
            <div class="x_title">
              <h2>List Data Kasus</h2>
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
                    <th width="50px"><center>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no   = 1;
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
                    <td width="70px"><center>
                      <a href="<?php echo base_url('sys/edit_solusi');?>/<?php echo $data['id_solusi'];?>">
                        <button class="btn btn-info btn-xs">
                          <i class="fa fa-edit"></i>
                        </button>
                      </a>
                      <a onClick="return confirmSubmit()" href="<?php echo base_url('sys/hapus_solusi');?>/<?php echo $data['id_solusi'];?>">
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