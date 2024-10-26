<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>E-Bike Rental Reservation System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
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

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>&nbsp;</h1>
            <p>&nbsp; </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>E-BikeForYou</span></h2>
      <p>Sampoda E-Bike Rental Reservation is a system build to deal with problems faced in transportation. Major problems faced in this transport sector are such as task allocation, tracking of E-Bikes, assigning routes, payment, booking order, delivery report, generating transactions receipt, overworking of the employees, security of goods, users,and drivers. the E-Bike with tasks at hand and those without.</p>
      <p>Sampoda E-Bike Rental Reservation will be also able to solve major problems such as task allocation where by a GPRS will be mounted in for E-Bikes to ensure that each and every E-Bikes is traced and assigned a tasks at a time, also keep track of all financial reports and expenses incurred in the organization by ensuring that all payments are made through credit/debit card or pay bill. The system will be able to have details of all the customers who has booked E-Bike and also view
    </div>
    <div class="row"> 
      
      <!-- Bootstrap CSS -->
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    /* Tab Navigation */
    .recent-tab {
        margin: 20px 0;
    }

    .recent-tab .nav-tabs {
        display: flex;
        justify-content: center;
        background-color: #007BFF;
        border-radius: 5px;
        overflow: hidden;
        padding: 0;
    }

    .recent-tab .nav-tabs li {
        list-style: none;
    }

    .recent-tab .nav-tabs li a {
        color: #fff;
        padding: 15px 25px;
        display: inline-block;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .recent-tab .nav-tabs li.active a,
    .recent-tab .nav-tabs li a:hover {
        background-color: #0056b3;
    }

    /* Centered Card Container */
    .card-container {
        display: flex;
        justify-content: center; /* Center cards horizontally */
        gap: 20px;
        margin: 20px 0;
        overflow-x: auto;
        padding-bottom: 20px;
        padding-left: 10px;
        padding-right: 10px;
    }

    /* Hide scrollbar for Webkit browsers */
    .card-container::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for all other browsers */
    .card-container {
        -ms-overflow-style: none;  /* Internet Explorer 10+ */
        scrollbar-width: none;  /* Firefox */
    }

    /* Card Styling */
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 300px;
        text-align: center;
        padding: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        color: #333;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
        overflow: hidden;
        display: inline-block;
        white-space: normal;
        text-decoration: none;
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
        transition: opacity 0.3s ease;
    }

    .card:hover img {
        opacity: 0.9;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
        color: #007BFF;
        font-size: 18px; /* Smaller font size */
        margin: 15px 0;
        font-weight: bold;
    }

    .card p {
        font-size: 12px; /* Smaller font size */
        padding: 0 15px 15px;
        line-height: 1.4; /* Adjusted for smaller fonts */
        color: #555;
    }

    @media (max-width: 768px) {
        .card-container {
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 90%;
            margin-bottom: 20px;
        }
    }
</style>

</head>
<body>

<!-- Nav tabs -->
<div class="recent-tab">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New E-Bikes</a></li>
    </ul>
</div>

<!-- Card Container (1-row scrollable) -->
<div class="card-container">
    <a href="ebike-reservation.php" class="card">
        <img src="images/ebike-1.jpg" alt="Reservation E-Bike">
        <h3>Reservation E-Bike</h3>
        <p>We offer a variety of self-driven e-bikes. Rates start as low as ₱200/day, unlimited mileage, free insurance included. We also deliver & collect anywhere in the country. We accept cash & all major credit/debit cards.</p>
    </a>

    <a href="ebike-booking.php" class="card">
        <img src="images/ebike-2.jpg" alt="Chauffeur E-Bike">
        <h3>Chauffeur E-Bike Rental</h3>
        <p>We provide a very comfortable and reliable e-bikes with driver service. From Bacoor to any point of the Las Pinas City. We have competitive rates, which include E-Bike, driver, Battery, road-toll & more.</p>
    </a>

    <a href="ebike-rental.php" class="card">
        <img src="images/ebike-3.jpg" alt="Self Driven E-Bike">
        <h3>Self Driven E-Bike</h3>
        <p>We offer brand new and/or used E-Bike for long-term rental. Comes with free maintenance, insurance, and unlimited mileage anywhere in the Bacoor - Las Pinas City. The lowest rate ever!</p>
    </a>

<!-- Bootstrap JS (Optional for other features) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    </div>
  </div>
</section>
<!-- /Resent Cat --> 

<!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>5+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-train" aria-hidden="true"></i>100+</h2>
            <p>New E-Bike For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-train" aria-hidden="true"></i>100+</h2>
            <p>Used E-Bike For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>60+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT ebiketestimonial.Testimonial,ebikeusers.FullName from ebiketestimonial join ebikeusers on ebiketestimonial.UserEmail=ebikeusers.EmailId where ebiketestimonial.status=:tid limit 4";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">
 
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


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
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>