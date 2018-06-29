<?php 
  session_start();
  if(!isset($_SESSION["username"]))
  {
    header('location:login.php');
  }
  include('db.php');
  $sqlUsers = $db->query("SELECT * FROM signup");
  $userCount = $sqlUsers->rowCount();
 
  if($userCount > 0){
     $urC = $userCount;
  }else{
    $urC = "0";
  }
  $sqlReviews = $db->query("SELECT * FROM reviewtb");
  $reviewCount = $sqlReviews->rowCount();
  if($reviewCount > 0)
  {
    $revC = $reviewCount;
  }else
  {
    $revC = "0";
  }
  
  $sqlBusiness = $db->query("SELECT * FROM business");
  $businessCount = $sqlBusiness->rowCount();
  if($businessCount > 0)
  {
    $businessCount = $businessCount;
  }
  else{
    $businessCount = "0";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>finIT</title>
  <!-- Bootstrap core CSS-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart(){
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work', 15],
          ['Eat', 2],
          ['Share Ideas', 3],
          ['Break', 1],
          ['Meeting', 2]
        ]);

        var options = {
          title: ''
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Reviews', 'Businesses', 'Users'],
          ['2015', 1000, 400, 200],
          ['2016', 1170, 460, 250],
          ['2017', 660, 1120, 300],
          ['2018', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Reviews, Businesses, and Users: 2015-2018',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Business', 'Reviews', 'Responses'],
          ['2015', 1000, 400, 200],
          ['2016', 1170, 460, 250],
          ['2017', 660, 1120, 300],
          ['2018', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2015-2018',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <style type="text/css">
      #page-top
      {
        font-family: 'Abel', sans-serif;
      }
    </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><?php echo $urC ?> USERS!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-edit"></i>
              </div>
              <div class="mr-5"><?php echo $revC ?> REVIEWS!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-reply"></i>
              </div>
              <div class="mr-5">12 REPLIES!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?= $businessCount ?> COMPANIES</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="row">
        <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i> Area Chart Example</div>
          <div class="card-body">
             <div id="columnchart_material" style="width: 500px; height: 200px;"></div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <div class="col-md-4">
      <div class="list-group" style="text-align: center;font-family: 'Abel', sans-serif;">
        <a href="#" class="list-group-item active"  style="text-align: center;font-size: 20px; ">
          Our Delopment Tools
        </a>
        <a href="#" class="list-group-item">PHP</a>
        <a href="#" class="list-group-item list-group-item-success">C#</a>
        <a href="#" class="list-group-item list-group-item-default">JavaScript</a>
        <a href="#" class="list-group-item list-group-item-warning">JQuery</a>
        <a href="#" class="list-group-item list-group-item-default">BootStrap</a>
        <a href="#" class="list-group-item list-group-item-info">HTML</a>
      </div>

      </div>
    </div>
      <div class="row">
        <div class="col-md-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                    <div id="barchart_material" style="width: 450px; height: 200px;"></div>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h3 mb-0 text-primary">1 693</div>
                  <div class="small text-muted">Reviews Dec</div>
                  <hr>
                  <div class="h3 mb-0 text-warning">1 402</div>
                  <div class="small text-muted">Reviews Jan</div>
                  <hr>
                  <div class="h3 mb-0 text-danger">1 019</div>
                  <div class="small text-muted">Reviews Feb</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Done By Marc-Design</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->           
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="col-md-4">
        <br>
      <div class="list-group" style="text-align: center;font-family: 'Abel', sans-serif;">
        <a href="#" class="list-group-item list-group-item-danger"  style="font-size: 20px; ">
          Our Delopment Team
        </a>
        <a href="#" class="list-group-item list-group-item-default">Dane (CEO)</a>
         <a href="#" class="list-group-item list-group-item-default">Cole (Manager)</a>
        <a href="#" class="list-group-item ">Marc (Front & Back End)</a>
        <a href="#" class="list-group-item list-group-item-default">Dave (Front-End)</a>
        <a href="#" class="list-group-item list-group-item-info">Kapil (Front-End )</a>
      </div>

      </div>
      
    </div>
   <?php include('footer.php') ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
</body>

</html>
