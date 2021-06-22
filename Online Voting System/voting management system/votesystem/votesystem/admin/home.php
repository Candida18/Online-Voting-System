<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #F1E9D2 " >
    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:black ; font-size: 17px; font-family:Times">
      <h1><b>
      📜 Dashboard 📜
      </b></h1>
      <ol class="breadcrumb" style="color:black ; font-size: 17px; font-family:Times">
        <li><a href="#"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family:Times" >Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row"  >
      <div class="col-lg-3 col-xs-6" style=" font-family:Times">
          <!-- small box -->
          <div class="small-box" style="background-color: Red">
            <div class="inner" style="background-color:#B0C4DE ;color:black ; font-size:15px;" >
              <?php
                $sql = "SELECT * FROM positions";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p > <b >No. of Positions </b> </p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            
            <a href="positions.php" class="small-box-footer " style="background-color:#4682B4 ; color:black ; font-size:18px">More info <i class="fa fa-arrow-right"></i></a>
          </div>
          
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" style=" font-family:Times">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color: 	#DEB887 ;color:black ; font-size:15px">
              <?php
                $sql = "SELECT * FROM candidates";
                $query = $conn->query($sql);

                echo "<h3  >".$query->num_rows."</h3>";
              ?>
          
              <p> <b >No. of Candidates </b></p>
            </div>
            <div class="icon">
              
             <i class="fa fa-black-tie"></i>
             
            </div>
            <a href="candidates.php" class="small-box-footer" style="background-color:	#8B4513 ;color:black ; font-size: 18px">More info <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" style=" font-family:Times">
          <!-- small box -->
          <div class="small-box bg-yellow">
          <div class="inner" style="background-color: #B59B91 ;color:black ; font-size:15px; font-family:Times">
              <?php
                $sql = "SELECT * FROM voters";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p> <b >Total Voters </b></p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="voters.php" class="small-box-footer "style="background-color:  #96837E ;color:black ; font-size: 18px">More info <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" style="color:black ; font-size: 15px; font-family:Times">
          <!-- small box -->
          <div class="small-box bg-red">
          <div class="inner" style="background-color: #778899 ;color:black ; font-size:15px; font-family:Times">
              <?php
                $sql = "SELECT * FROM votes GROUP BY voters_id";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p> <b>Voters Voted </b></p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
            <a href="votes.php" class="small-box-footer "style="background-color: #2F4F4F ;color:black ; font-size: 18px">More info <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row" style="color:black ; font-size: 17px; font-family:Times">
        <div class="col-xs-12" >
          <h3> <b>VOTES TALLY
            <span class="pull-right">
            
              <a href="print.php" class="btn btn-success btn-sm btn-curve" style="background-color: #2E8B57 ;color:black ; font-size: 12px; font-family:Times "><span class="glyphicon glyphicon-print"></span> Print</a>
            </span>
         </b> </h3>
        </div>
      </div>

      <?php
        $sql = "SELECT * FROM positions ORDER BY priority ASC";
        $query = $conn->query($sql);
        $inc = 2;
        while($row = $query->fetch_assoc()){
          $inc = ($inc == 2) ? 1 : $inc+1; 
          if($inc == 1) echo "<div class='row'>";
          echo "
          
           <div class='col-sm-6'  > 
              <div class='box box-solid' style='background-color: #d8d1bd' >
                <div class='box-header with-border' style='background-color: #d8d1bd'>
                  <h4 class='box-title'><b>".$row['description']."</b></h4>
                </div>
                <div class='box-body' style='background-color: #d8d1bd'>
                  <div class='chart' style='background-color: #d8d1bd'>
                    <canvas id='".slugify($row['description'])."' style='height:200px  '></canvas>
                  </div>
                </div>
              </div>
            </div>
            
          ";
          if($inc == 2) echo "</div>";  
        }
        if($inc == 1) echo "<div class='col-sm-6'></div></div>";
      ?>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<?php
  $sql = "SELECT * FROM positions ORDER BY priority ASC";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $sql = "SELECT * FROM candidates WHERE position_id = '".$row['id']."'";
    $cquery = $conn->query($sql);
    $carray = array();
    $varray = array();
    while($crow = $cquery->fetch_assoc()){
      array_push($carray, $crow['lastname']);
      $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
      $vquery = $conn->query($sql);
      array_push($varray, $vquery->num_rows);
    }
    $carray = json_encode($carray);
    $varray = json_encode($varray);
    ?>
    <script>
    $(function(){
      var rowid = '<?php echo $row['id']; ?>';
      var description = '<?php echo slugify($row['description']); ?>';
      var barChartCanvas = $('#'+description).get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      
      var barChartData = {
        labels  : <?php echo $carray; ?>,
        
        datasets: [
         
          {
            label               : 'Votes',
            
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : <?php echo $varray; ?>
          }
        ]
      }
      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
      }

      barChartOptions.datasetFill = false
      var myChart = barChart.HorizontalBar(barChartData, barChartOptions)
      //document.getElementById('legend_'+rowid).innerHTML = myChart.generateLegend();
    });
    </script>
    <?php
  }
?>
</body>
</html>
