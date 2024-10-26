<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {   
    header('location:index.php');
} else {
    ?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>E-Bike Rental Reservation System | Admin Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="vendor/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/js/googlemap.js"></script>
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .page-title {
            font-weight: 700;
            font-size: 24px;
            color: #4A4A4A;
            margin-bottom: 20px;
        }

        .panel {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .panel:hover {
            transform: translateY(-5px);
        }

        .panel-body {
            padding: 30px;
            border-radius: 12px 12px 0 0;
            background: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%);
            color: white;
            text-align: center;
        }

        .panel-footer {
            background-color: #f5f5f5;
            text-align: center;
            padding: 15px;
            border-radius: 0 0 12px 12px;
            font-weight: bold;
        }

        .panel-footer a {
            color: #5151E5;
            text-decoration: none;
        }

        .panel-footer a:hover {
            text-decoration: underline;
        }

        .stat-panel-title {
            font-weight: 500;
            margin-top: 15px;
            font-size: 18px;
        }

        .stat-panel-number {
            font-size: 48px;
            font-weight: 700;
        }

        /* Custom panel background colors */
        .bk-primary {
            background: linear-gradient(135deg, #56CCF2 10%, #2F80ED 100%);
        }

        .bk-success {
            background: linear-gradient(135deg, #6DD5FA 10%, #4CAF50 100%);
        }

        .bk-info {
            background: linear-gradient(135deg, #2196F3 10%, #21CBF3 100%);
        }

        .bk-warning {
            background: linear-gradient(135deg, #FFD700 10%, #FF8C00 100%);
        }

        /* Map styles */
        .container {
            position: relative;
            left: -17%;
            top: -1.5%;
            height: 300px;
        }

        #map {
            width: 151.9%;
            height: 150%;
            border: 1px solid black;
        }

        #data, #allData {
            display: none;
        }
    </style>
</head>

<body>
<?php include('includes/header.php');?>

<div class="ts-main-content">
    <?php include('includes/leftbar.php');?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Dashboard</h2>
                    
                    <!-- Maps -->
                    <div class="container">
                        <div id="map"></div>
                    </div>
                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABgvJKOnvPVhTzMqswXeom1YIbxsa3ohQ&callback=loadMap">
                    </script>
                    <!-- End Maps -->

                    <!-- Loading Scripts -->
                    <script src="js/jquery.min.js"></script>
                    <script src="js/bootstrap-select.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/jquery.dataTables.min.js"></script>
                    <script src="js/dataTables.bootstrap.min.js"></script>
                    <script src="js/Chart.min.js"></script>
                    <script src="js/fileinput.js"></script>
                    <script src="js/chartData.js"></script>
                    <script src="js/main.js"></script>
                    
                    <script>
                    window.onload = function() {
                        var ctx = document.getElementById("dashReport").getContext("2d");
                        window.myLine = new Chart(ctx).Line(swirlData, {
                            responsive: true,
                            scaleShowVerticalLines: false,
                            scaleBeginAtZero: true,
                            multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                        }); 
                        
                        var doctx = document.getElementById("chart-area3").getContext("2d");
                        window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

                        var doctx = document.getElementById("chart-area4").getContext("2d");
                        window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php } ?>
