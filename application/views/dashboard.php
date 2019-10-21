<script>
  function tampilkan_chart(json){
    console.log(json);
    // Menggunakan Morris.Bar
    Morris.Line({
      // ID Element dimana grafik ditempatkan
      element: 'grafik',
       
      // Data dari chart yang akan ditampilkan
      data : json,
       
      // Sumbu X
      xkey: 'tanggal',
       
      // Sumbu Y
      ykeys: ['jumlah'],
       
      // Label
      labels: ['Total Tamu'],
      parseTime: false
      
    });
  }
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body">
            	<?php echo form_open('dashboard/index'); ?>
            	<div class="row">
            		<div class="col-sm-6">
                    <div class="form-group">
                          <label>Bulan</label>
                          <select class="form-control" id="bulan" name="bulan">
                                <option value="01" <?php if(isset($bulan)){if($bulan=='01'){echo 'selected';}}?>>Januari</option>
                                <option value="02" <?php if(isset($bulan)){if($bulan=='02'){echo 'selected';}}?>>Februari</option>
                                <option value="03" <?php if(isset($bulan)){if($bulan=='03'){echo 'selected';}}?>>Maret</option>
                                <option value="04" <?php if(isset($bulan)){if($bulan=='04'){echo 'selected';}}?>>April</option>
                                <option value="05" <?php if(isset($bulan)){if($bulan=='05'){echo 'selected';}}?>>Mei</option>
                                <option value="06" <?php if(isset($bulan)){if($bulan=='06'){echo 'selected';}}?>>Juni</option>
                                <option value="07" selected="true" <?php if(isset($bulan)){if($bulan=='07'){echo 'selected';}}?>>Juli</option>
                                <option value="08" <?php if(isset($bulan)){if($bulan=='08'){echo 'selected';}}?>>Agustus</option>
                                <option value="09" <?php if(isset($bulan)){if($bulan=='09'){echo 'selected';}}?>>September</option>
                                <option value="10" <?php if(isset($bulan)){if($bulan=='10'){echo 'selected';}}?>>Oktober</option>
                                <option value="11" <?php if(isset($bulan)){if($bulan=='11'){echo 'selected';}}?>>November</option>
                                <option value="12" <?php if(isset($bulan)){if($bulan=='12'){echo 'selected';}}?>>Desember</option>
                          </select>
                        </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                          <label>Tahun</label>
                          <input value="2019" type="number" class="form-control" placeholder="Masukkan Tahun" id="tahun", name="tahun" value="<?php if(isset($tahun))echo $tahun;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning pull-right" style="margin-right: 30px;margin-bottom: 10px;"><i class="fa fa-eye"></i> Lihat</button> 
                    </div>
                  </div>  
            	</div>
            	<?php echo form_close(); ?>

                <div class="row">
                	<div class="col-lg-4 col-xs-6">
                		<div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                	<?php echo isset($total_sekretariat[0]['jumlah']) ? $total_sekretariat[0]['jumlah']:  "0" ;?>
                                </h3>
                                <p>Sekretariat</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-4 col-xs-6">
                		<div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                	<?php echo isset($total_bidang[0]['jumlah']) ? $total_bidang[0]['jumlah']:  "0" ;?>
                                </h3>
                                <p>Bidang</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                        </div>
                	</div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>
                                	<?php echo isset($total_lpse[0]['jumlah']) ? $total_lpse[0]['jumlah']:  "0" ;?>
                                </h3>
                                <p>LPSE</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <?php if($lihat_data == 1){ ?>
                    <div id='grafik'></div>
                    
                    <?php 
                      echo "<script type='text/javascript' language='javascript'>tampilkan_chart(".json_encode($data_grafik).")</script>";
                    ?>
                    
                    <table id='example2' class='table table-bordered table-hover text-center'>
                      <thead>
                        <tr>
                          <th class='col-md-6'>Tanggal</th><th class='col-md-6'>Jumlah Tamu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data_grafik as $row) { ?>
                              <tr>
                                  <td><?php echo $row->tanggal ?></td>
                                  <td><?php echo $row->jumlah?></td>
                              </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <?php }else{ ?>
                    <h5 class='text-center'>Data Tidak Ditemukan</h5>
                    <div id="chart" align="center" style="width: 500px; height: 300px; margin: 0 auto;"/>
                  <?php } ?>
                </div>

                <!-- <div class="row">
                	<?php 
                  if($lihat_data == 1){
                    echo "<div id='grafik'></div>";
                    echo "<script type='text/javascript' language='javascript'>tampilkan_chart(".json_encode($data_grafik).")</script>";
                    echo "<table id='example2' class='table table-bordered table-hover text-center'>";
                    echo "<thead><tr><th class='col-md-6'>Tanggal</th><th class='col-md-6'>Jumlah Tamu</th></tr></thead>";
                    echo "<tbody>";
                    $i=0;
                    foreach ($data_grafik as $row) {
                      echo "<tr><td>$row->tanggal</td><td>$row->jumlah</td>";
                      echo "</tr>";
                      $i++;
                    }
                    echo "</tbody></table>";
                  }else{
                    echo "<h5 class='text-center'>Data Tidak Ditemukan</h5>";
                  }
                  ?>
                </div> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartPendidikan);
    function drawChartPendidikan() {
         var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['PNS',     11],
              ['Honorer',      2]
            ]);
         var options = {

        };
        //legend: 'none'
        var chart = new google.visualization.PieChart(document.getElementById('chart'));

        chart.draw(data, options);
    }
</script>