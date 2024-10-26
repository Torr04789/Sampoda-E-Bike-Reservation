<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

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
	
	<title>E-Bike Rental Reservation System | Canceled Bookings   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
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

						<h2 class="page-title">Canceled Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">

							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Booking No.</th>
											<th>Message</th>
											<th>Pick Up - Drop Off Location</th>
											<th>Vehicle</th>
											<th>From Date - To Date</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>Name</th>
											<th>Booking No.</th>
											<th>Message</th>
											<th>Pick Up - Drop Off Location</th>
											<th>Vehicle</th>
											<th>From Date - To Date</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

									<?php 

$status1 = 2; // Cancelled
$status2 = 3; // Cancelled by user
$sql = "SELECT ebikeusers.FullName, ebikebrands.BrandName, ebikevehicles.VehiclesTitle, ebikebooking.FromDate, ebikebooking.ToDate,ebikebooking.PickLoc,ebikebooking.ReturnLoc, ebikebooking.Message, ebikebooking.VehicleId as vid, ebikebooking.Status, ebikebooking.PostingDate, ebikebooking.id, ebikebooking.BookingNumber FROM ebikebooking JOIN ebikevehicles ON ebikevehicles.id = ebikebooking.VehicleId JOIN ebikeusers ON ebikeusers.EmailId = ebikebooking.userEmail JOIN ebikebrands ON ebikevehicles.VehiclesBrand = ebikebrands.id WHERE ebikebooking.Status IN (:status1, :status2)";
$query = $dbh->prepare($sql);
$query->bindParam(':status1', $status1, PDO::PARAM_INT);
$query->bindParam(':status2', $status2, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) { 
?>


                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->FullName);?></td>
											<td><?php echo htmlentities($result->BookingNumber);?></td>
											<td><?php echo htmlentities($result->Message);?></td>
											<td><?php echo htmlentities($result->PickLoc) . ' - ' . htmlentities($result->ReturnLoc); ?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></td>
											<td><?php echo htmlentities($result->FromDate) . ' - ' . htmlentities($result->ToDate); ?></td>
											<td><?php 
                                                if ($result->Status == 0) {
                                                    echo htmlentities('Not Confirmed yet');
                                                } else if ($result->Status == 1) {
                                                    echo htmlentities('Confirmed');
                                                } else if ($result->Status == 2) {
                                                    echo htmlentities('Cancelled');
                                                } else if ($result->Status == 3) {
                                                    echo htmlentities('Cancelled by user');
                                                }
                                            ?></td>
                                            <td><?php echo htmlentities($result->PostingDate); ?></td>
                                            <td>
                                                <a href="booking-details.php?bid=<?php echo htmlentities($result->id); ?>"> View</a>
                                            </td>
                                        </tr>
                                        <?php $cnt = $cnt + 1; 
                                        } 
                                    } ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

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
</body>
</html>
<?php } ?>
