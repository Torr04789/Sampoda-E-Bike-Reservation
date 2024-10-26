<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$pickloc=$_POST['pickloc'];
$returnloc=$_POST['returnloc']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$bookingno=mt_rand(100000000, 999999999);
$ret="SELECT * FROM ebikebooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->bindParam(':pickloc',$pickloc,PDO::PARAM_STR);
$query1->bindParam(':returnloc',$returnloc,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);

if($query1->rowCount()==0)
{

$sql="INSERT INTO  ebikebooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,PickLoc,ReturnLoc,message,Status) VALUES(:bookingno,:useremail,:vhid,:fromdate,:todate,:pickloc,:returnloc,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':pickloc',$pickloc,PDO::PARAM_STR);
$query->bindParam(':returnloc',$returnloc,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
 echo "<script type='text/javascript'> document.location = 'rent-a-ebike.php'; </script>";
} }  else{
 echo "<script>alert('E-Bike already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'rent-a-ebike.php'; </script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title>E-Bike Rental Reservation System| Vehicle Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT ebikevehicles.*,ebikebrands.BrandName,ebikebrands.id as bid  from ebikevehicles join ebikebrands on ebikebrands.id=ebikevehicles.VehiclesBrand where ebikevehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>$<?php echo htmlentities($result->PricePerDay);?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->FuelType);?></h5>
              <p>Type</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Seats</p>
            </li>

            <li> <i class="fa fa-drivers-license" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->Driver);?></h5>
              <p>Driver</p>
            </li>

          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      

<tr>
<td>Leather Seats</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>


<tr>
<td>GPS Location</td>
<?php if($result->GPSLocation==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      <!--Side-Bar-->
<aside class="col-md-4">
    <div class="share_vehicle">
        <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></p>
    </div>
    <div class="sidebar_widget">
        <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
        </div>
        <form method="post">
            <div class="form-group">
                <label>Book start date & time:</label>
                <input type="datetime-local" class="form-control" name="fromdate" placeholder="From Date" required>
            </div>
            <div class="form-group">
                <label>Book return date & time:</label>
                <input type="datetime-local" class="form-control" name="todate" placeholder="To Date" required>
            </div>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

            <div class="form-group">
                <label>Pick Up Location:</label>
                <div>
                    <input type="radio" id="pickup_dropdown" name="pickup_type" value="dropdown" checked>
                    <label for="pickup_dropdown">Pick Up At Our Station</label>
                    <select class="form-control" id="pickup_station" name="pickloc" required>
                        <option value="" disabled selected>Choose A Pick-Up Location</option>
                        <option value="Bacoor">Bacoor</option>
                        <option value="Manila">Manila</option>
                        <option value="LasPinas">LasPinas</option>
                    </select>
                </div>

                <div>
                    <input type="radio" id="pickup_input" name="pickup_type" value="input">
                    <label for="pickup_input">E-Bike delivered at your place for a fee</label>
                    <div style="display: flex; align-items: center;">
                        <input type="text" class="form-control" id="pickup_custom" name="pickloc" placeholder="Enter your pick-up location" disabled>
                        <i class="fas fa-map-marker-alt" id="pickup_icon" style="margin-left: 10px; cursor: pointer;" title="Use My Location"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Return Location:</label>
                <div>
                    <input type="radio" id="return_dropdown" name="return_type" value="dropdown" checked>
                    <label for="return_dropdown">Drop-Off At Our Station</label>
                    <select class="form-control" id="return_station" name="returnloc" required>
                        <option value="" disabled selected>Choose A Drop-off Location</option>
                        <option value="Bacoor">Bacoor</option>
                        <option value="Manila">Manila</option>
                        <option value="LasPinas">LasPinas</option>
                    </select>
                </div>

                <div>
                    <input type="radio" id="return_input" name="return_type" value="input">
                    <label for="return_input">E-Bike delivered at your place for a fee</label>
                    <div style="display: flex; align-items: center;">
                        <input type="text" class="form-control" id="return_custom" name="returnloc" placeholder="Enter your return location" disabled>
                        <i class="fas fa-map-marker-alt" id="return_icon" style="margin-left: 10px; cursor: pointer;" title="Use My Location"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>

            <?php if($_SESSION['login']) { ?>
    <div class="form-group">
        <input type="submit" class="btn" id="bookNowBtn" name="submit" value="Book Now" style="font-size: 12px;" disabled>
        <button type="button" class="btn" data-toggle="modal" data-target="#termsModal" style="font-size: 12px;" required>Terms and Conditions</button>
    </div>
<?php } else { ?>
    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" style="font-size: 12px;">Login For Book</a>
<?php } ?>

<!-- Map Modal for location selection -->
<div id="mapModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Location</h4>
            </div>
            <div class="modal-body">
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="selectLocationBtn">Select Location</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div id="termsModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="background-color: red; color: white; text-align: center; width: 100%;">
                <h4 class="modal-title" style="font-family: 'Arial', sans-serif; margin: 0; color: white;">Terms and Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-family: 'Verdana', sans-serif; line-height: 1.4; font-size: 0.8em;">
                <p style="font-weight: bold; font-size: 1em;">Terms and Conditions:</p>
                <p style="font-weight: bold;">Definition of terms</p>
                <ol>
                    <li>"Transfer" refers to a Point to Point pick-up & drop-off, or Airport Transfer.</li>
                    <li>"Rental requests" refers to online or website reservation and is subject to confirmation.</li>
                </ol>
                <p style="font-weight: bold;">Package inclusion</p>
                <ol>
                    <li>E-Bike usage</li>
                    <li>Driver usage</li>
                    <li>Electricity usage</li>
                </ol>
                <p style="font-weight: bold;">Package Exclusion (if applicable)</p>
                <ol>
                    <li>Extra hour fee will apply if usage exceeds the hours allotted for the rental.</li>
                </ol>

                <p style="font-weight: bold;">Payments</p>
                <ol>
                    <li>Philippine Rent a E-Bike accepts cash through office walk-in and GCash.</li>
                    <li>Applicable excess cost MUST be paid directly to our driver, cash or credit/debit card accepted.</li>
                </ol>
                <p style="font-weight: bold;">Cancellation/No-Show</p>
                <ol>
                    <li>No show, 100% forfeiture of paid rental. Driver will wait up to 3 hours only if no advice.</li>
                </ol>
                <p style="font-weight: bold;">Others</p>
                <ol>
                    <li>Rent-a-E-Bike with Driver service is not intended and not allowed for Public Conveyance usage (aka pang-PASADA).</li>
                    <li>Client mess (ie. vomiting, defecating and alike) that requires significant cleaning comes with a 500 penalty.</li>
                    <li>Client incident that resulted in damage to vehicle beyond normal wear and tear. Charged at full cost for restoration and lost days revenue. Criminal charges may apply for malicious mischief if needed.</li>
                </ol>
                <p>Please send an email to <a href="mailto:victorokafor4789@gmail.com">victorokafor4789@gmail.com</a> or call/SMS/Viber/WhatsApp/Telegram at +63-993-482-1484 for further concerns.</p>
                <p>* Please note that our office hours are limited from 8 AM to 5 PM daily.</p>

                <!-- Checkbox for terms agreement -->
                <div class="checkbox-container" style="margin-top: 10px;">
                    <input type="checkbox" id="termsCheckbox">
                    <label for="termsCheckbox">I agree to the <a href="#">terms and conditions</a>.</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: red; color: white;" id="confirmTermsBtn" disabled>I Agree</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to enable the book Now button based on the checkbox status
    const termsCheckbox = document.getElementById('termsCheckbox');
    const confirmTermsBtn = document.getElementById('confirmTermsBtn');
    const bookNowBtn = document.getElementById('bookNowBtn');

    // Enable the confirm button when the checkbox is checked
    termsCheckbox.addEventListener('change', function() {
        confirmTermsBtn.disabled = !this.checked;
    });

    // Add event listener to confirm terms button
    confirmTermsBtn.addEventListener('click', function() {
        if (termsCheckbox.checked) {
            bookNowBtn.disabled = false; // Enable book Now button
            $('#termsModal').modal('hide'); // Hide the terms modal
        }
    });
</script>

<script>
    // JavaScript to enable the book Now button based on the checkbox status
    const termsCheckbox = document.getElementById('termsCheckbox');
    const confirmTermsBtn = document.getElementById('confirmTermsBtn');
    const bookNowBtn = document.getElementById('bookNowBtn');

    // Enable the confirm button when the checkbox is checked
    termsCheckbox.addEventListener('change', function() {
        confirmTermsBtn.disabled = !this.checked;
    });

    // Add event listener to confirm terms button
    confirmTermsBtn.addEventListener('click', function() {
        if (termsCheckbox.checked) {
            bookNowBtn.disabled = false; // Enable book Now button
            $('#termsModal').modal('hide'); // Hide the terms modal
        }
    });
</script>

<style>
    .modal-content {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .modal-header {
        border-bottom: none;
    }
    .modal-body {
        padding: 20px;
    }
    .modal-footer {
        border-top: none;
    }
    .btn {
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }
    .btn:hover {
        background-color: white;
    }
</style>


            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbEAMK5m6N3bQGxjs0NOPrPJ-Tj9F8hro&callback=loadMap"></script>

            <script>
                let selectedLatLng;
                let map;
                let marker;

                document.querySelectorAll('input[name="pickup_type"]').forEach((radio) => {
                    radio.addEventListener('change', function() {
                        document.getElementById('pickup_station').disabled = this.value !== 'dropdown';
                        document.getElementById('pickup_custom').disabled = this.value !== 'input';
                    });
                });

                document.querySelectorAll('input[name="return_type"]').forEach((radio) => {
                    radio.addEventListener('change', function() {
                        document.getElementById('return_station').disabled = this.value !== 'dropdown';
                        document.getElementById('return_custom').disabled = this.value !== 'input';
                    });
                });

                // "My Location" logic for pickup
                document.getElementById('pickup_icon').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            const latLng = { lat: latitude, lng: longitude };
                            document.getElementById('pickup_custom').value = latitude + ', ' + longitude;
                            openMapModal('pickup_custom', latLng);
                        }, function() {
                            alert('Geolocation failed. Please allow location access.');
                        });
                    } else {
                        alert('Geolocation is not supported by this browser.');
                    }
                });

                // "My Location" logic for return
                document.getElementById('return_icon').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            const latLng = { lat: latitude, lng: longitude };
                            document.getElementById('return_custom').value = latitude + ', ' + longitude;
                            openMapModal('return_custom', latLng);
                        }, function() {
                            alert('Geolocation failed. Please allow location access.');
                        });
                    } else {
                        alert('Geolocation is not supported by this browser.');
                    }
                });

                function openMapModal(inputFieldId, latLng) {
                    $('#mapModal').modal('show');

                    $('#mapModal').on('shown.bs.modal', function () {
                        initMap(inputFieldId, latLng);
                    });
                }

                function initMap(inputFieldId, latLng) {
                    const initialLocation = latLng || { lat: 14.5995, lng: 120.9842 };

                    map = new google.maps.Map(document.getElementById('map'), {
                        center: initialLocation,
                        zoom: 12
                    });

                    marker = new google.maps.Marker({
                        position: initialLocation,
                        map: map,
                        draggable: true
                    });

                    marker.addListener('dragend', function(event) {
                        selectedLatLng = event.latLng;
                    });

                    selectedLatLng = marker.getPosition();

                    document.getElementById('selectLocationBtn').addEventListener('click', function() {
                        document.getElementById(inputFieldId).value = selectedLatLng.lat() + ', ' + selectedLatLng.lng();
                        $('#mapModal').modal('hide');
                    });
                }

                // Show booking summary in terms modal
                document.getElementById('termsModal').addEventListener('show.bs.modal', function() {
                    document.getElementById('summaryStart').textContent = document.querySelector('input[name="fromdate"]').value;
                    document.getElementById('summaryEnd').textContent = document.querySelector('input[name="todate"]').value;
                    document.getElementById('summaryPickUp').textContent = document.querySelector('input[name="pickup_type"]:checked').nextSibling.textContent.trim();
                    document.getElementById('summaryReturn').textContent = document.querySelector('input[name="return_type"]:checked').nextSibling.textContent.trim();
                });

                // Confirm terms and proceed to book
                document.getElementById('confirmTermsBtn').addEventListener('click', function() {
                    $('#termsModal').modal('hide');
                    // Optionally, you can trigger the form submission here
                    // document.querySelector('form').submit();
                });
            </script>
        </form>
    </div>
    <!--/Side-Bar-->


      
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Similar E-Bike</h3>
      <div class="row">
<?php 
$bid=$_SESSION['brndid'];
$sql="SELECT ebikevehicles.VehiclesTitle,ebikebrands.BrandName,ebikevehicles.PricePerDay,ebikevehicles.FuelType,ebikevehicles.ModelYear,ebikevehicles.id,ebikevehicles.SeatingCapacity,ebikevehicles.Driver,ebikevehicles.VehiclesOverview,ebikevehicles.Vimage1 from ebikevehicles join ebikebrands on ebikebrands.id=ebikevehicles.VehiclesBrand where ebikevehicles.VehiclesBrand=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>      
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
              <p class="list-price">$<?php echo htmlentities($result->PricePerDay);?></p>
          
              <ul class="features_list">

                <li><i class="fa fa-drivers-license" aria-hidden="true"></i><?php echo htmlentities($result->Driver);?> Driver</li>
                <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
              </ul>
            </div>
          </div>
        </div>
 <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>