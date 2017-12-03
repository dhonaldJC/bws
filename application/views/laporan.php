    <div class="page-title">
      <div class="title_left">
        <h3>Laporan</h3>
      </div>
    </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Jumlah Posting Pengetahuan Bulanan<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<script src="<?php echo base_url();?>asset/jquery.min.js"></script>
<style type="text/css">
${demo.css}
</style>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Grafik Jumlah Posting Pengetahuan Bulanan',
            x: -20 //center
        },
        subtitle: {
            text: 'Knowledge Management System',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Posting Tervalidasi'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Posting'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Masalah dan Solusi',
            data: [
      <?php foreach($t->result_array() as $d) if($d['bulan']=='01'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='02'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='03'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='04'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='05'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='06'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='07'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='08'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='09'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='10'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='11'){ echo $d['jml'];}?>.0,
      <?php foreach($t->result_array() as $d) if($d['bulan']=='12'){ echo $d['jml'];}?>.0
      ]
        }, {
            name: 'Dokumen',
            data: [
      <?php foreach($e->result_array() as $d) if($d['bulan']=='01'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='02'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='03'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='04'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='05'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='06'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='07'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='08'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='09'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='10'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='11'){ echo $d['jml'];}?>.0,
      <?php foreach($e->result_array() as $d) if($d['bulan']=='12'){ echo $d['jml'];}?>.0
      ]
        }]
    });
});
</script>

<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Problem Solving Paling Banyak Dicari'
        },
        subtitle: {
            text: 'Knowledge Management System'
        },
        xAxis: {
            categories: [
      <?php foreach($lap_ps->result_array() as $l){?>
                <?php echo "'".$l['id_solusi']."<br/>".$l['nama_solusi']."'";?>,
      <?php } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ' Kali'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} kali</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Kasus',
            data: [
      <?php foreach($lap_ps->result_array() as $l){?>
                <?php echo $l['dilihat'];?>.0,
      <?php } ?> 
      ]

        }]
    });
});
    </script>


<script src="<?php echo base_url();?>/asset/highcharts/js/highcharts.js"></script>
<script src="<?php echo base_url();?>/asset/highcharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
              </div>
            </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Problem Solving Paling Banyak Dicari<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
              </div>
              
            </div>            
          </div>
        <!-- /page content -->
