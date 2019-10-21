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



<div class="box-body">
    <div class="col-md-12">
        <div class="box" style="padding: 15px">
            <div class="box-header">
                <h3 class="box-title">Dashboard</h3>
            </div>
                 
              <div class="col-xs-12">
                <div style="margin-left: 70%;">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label" ><small>Cari Data: </small></label>
                    <div class='input-group date' id='tanggal'>
                    <input type="text" class="form-control" id="tanggal" />
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                       <div class="form-group">
                      <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-search"></i></button> 
                    </div>
                  </div>  
            	   </div>
               </div>
             </div>
          </div>
        </div>
    
            	<?php echo form_close(); ?>

                <div class="row">
                	<div class="col-lg-4 col-xs-6">
                		<div class="small-box bg-red">
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

<body>
 
    <canvas id="canvas" width="1000" height="280"></canvas>
 
    <!--Load chart js-->
    <script type="text/javascript" src="<?php echo base_url().'assets/chart.js'?>"></script>
    <script>
 
            var lineChartData = {
                labels : <?php echo json_encode($merk);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($stok);?>
                    }
 
                ]
                 
            }
 
        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
         
    </script>

    <!-- js untuk jquery -->
  <script src="js/jquery-1.11.2.min.js"></script>
  <!-- js untuk bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- js untuk moment -->
  <script src="js/moment.js"></script>
  <!-- js untuk bootstrap datetimepicker -->
  <script src="js/bootstrap-datetimepicker.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){

       $('#tanggal').datetimepicker({
        format : 'DD/MM/YYYY'
       });
    });
  </script>
</body>