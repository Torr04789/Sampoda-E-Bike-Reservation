<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else

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
	
	<title>E-Bike Rental Reservation System | All Reservations   </title>

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
<?php include('includes/header.php'); ?>

<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title">New Rentals</h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Rentals Info</div>
                        <div class="panel-body">

                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reservations No.</th>
                                        <th>Message</th>
                                        <th>Pick Up and Drop Off Location</th>
                                        <th>Vehicle</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                        <th>Posting date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reservations No.</th>
                                        <th>Message</th>
                                        <th>Pick Up and Drop Off Location</th>
                                        <th>Vehicle</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                        <th>Posting date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php 
                                    $status = 0;
                                    $sql = "SELECT ebikeusers.FullName, ebikebrands.BrandName, ebikevehicles.VehiclesTitle, ebikerental.FromDate, ebikerental.ToDate, ebikerental.PickLoc, ebikerental.ReturnLoc, ebikerental.Message, ebikerental.VehicleId as vid, ebikerental.Status, ebikerental.PostingDate, ebikerental.id, ebikerental.BookingNumber FROM ebikerental JOIN ebikevehicles ON ebikevehicles.id = ebikerental.VehicleId JOIN ebikeusers ON ebikeusers.EmailId = ebikerental.userEmail JOIN ebikebrands ON ebikevehicles.VehiclesBrand = ebikebrands.id WHERE ebikerental.Status = :status";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':status', $status, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;

                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($result->FullName); ?></td>
                                                <td><?php echo htmlentities($result->BookingNumber); ?></td>
                                                <td><?php echo htmlentities($result->Message); ?></td>
                                                <td><?php echo htmlentities($result->PickLoc) . ' - ' . htmlentities($result->ReturnLoc); ?></td>
                                                <td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
                                                <td><?php echo htmlentities($result->FromDate) . ' - ' . htmlentities($result->ToDate); ?></td>
                                                <td><?php
                                                if ($result->Status == 0) {
                                                    echo htmlentities('Not Confirmed yet');
                                                } else if ($result->Status == 1) {
                                                    echo htmlentities('Confirmed');
                                                } else {
                                                    echo htmlentities('Cancelled');
                                                }
                                                ?></td>
                                                <td><?php echo htmlentities($result->PostingDate); ?></td>
                                                <td>
                                                    <a href="rental-details.php?bid=<?php echo htmlentities($result->id); ?>">View</a>
                                                    <!-- Show Locations Link with Map Icon, opens Google Maps in a modal -->
                                                    <a href="#" data-toggle="modal" data-target="#mapModal" 
                                                       data-origin="<?php echo urlencode($result->PickLoc); ?>" 
                                                       data-destination="<?php echo urlencode($result->ReturnLoc); ?>" 
                                                       title="Show Map">
                                                        <i class="fas fa-map-marker-alt" style="font-size: 24px; color: #007bff; margin-left: 10px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $cnt++; }
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

<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Set modal size to large -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">GPS Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalMap" style="width: 100%; height: 600px;"></div> <!-- Set height for the map -->
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

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABgvJKOnvPVhTzMqswXeom1YIbxsa3ohQ&callback=initMap">
</script>

<script>
    function initMap() {
        $('#mapModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var origin = decodeURIComponent(button.data('origin'));
            var destination = decodeURIComponent(button.data('destination'));

            var map = new google.maps.Map(document.getElementById('modalMap'), {
                zoom: 12,
                center: { lat: 14.5995, lng: 120.9842 }
            });

            var geocoder = new google.maps.Geocoder();
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();

            directionsRenderer.setMap(map);

            // Function to set markers and route
            function setRoute(originLatLng, destLatLng) {
                var request = {
                    origin: originLatLng,
                    destination: destLatLng,
                    travelMode: 'DRIVING'  // You can change to WALKING, BICYCLING, etc.
                };

                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(result);
                    } else {
                        alert('Could not display route: ' + status);
                    }
                });
            }

            geocoder.geocode({ 'address': origin }, function (results, status) {
                if (status === 'OK') {
                    var originLatLng = results[0].geometry.location;
                    map.setCenter(originLatLng);

                    new google.maps.Marker({
                        position: originLatLng,
                        map: map,
                        title: 'Pick-Up Location'
                    });

                    // Geocode destination and set route
                    geocoder.geocode({ 'address': destination }, function (results, status) {
                        if (status === 'OK') {
                            var destLatLng = results[0].geometry.location;

                            new google.maps.Marker({
                                position: destLatLng,
                                map: map,
                                title: 'Drop-Off Location'
                            });

                            // Draw the route between origin and destination
                            setRoute(originLatLng, destLatLng);
                        } else {
                            alert('Drop-off location not found: ' + status);
                        }
                    });
                } else {
                    alert('Pick-up location not found: ' + status);
                }
            });
        });
    }
</script>


