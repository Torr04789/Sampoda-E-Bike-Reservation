<style>
      
        
        /* Center logo and make it larger */
        .logo img {
            width: 180px; /* Increase logo size */
            animation: logoAnimation 2s infinite; /* Animation */
        }

/* Simple logo animation */
        @keyframes logoAnimation {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Center header info */
        .header_info {
            text-align: center;
            color: #333; /* Darker text for white background */
        }

        .header_info p,
        .header_info a {
            color: #333; /* Ensure text and links are visible on white background */
        }

        .login_btn a {
            color: #fff;
            background-color: #f05a22; /* Button color */
            padding: 5px 10px;
            border-radius: 5px;
        }

        .login_btn a:hover {
            background-color: #d04c1d; /* Hover effect for button */
        }

        /* Styling for social follow icons */
        .social-follow i {
            color: #333;
            margin-right: 10px;
        }

        /* Additional responsiveness */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
            .col-sm-9, .col-md-10, .col-sm-3, .col-md-2 {
                width: 100%;
                text-align: center;
            }
        }
    </style>
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
         <?php
         $sql = "SELECT EmailId,ContactNo from ebikecontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
$email=$result->EmailId;
$contactno=$result->ContactNo;
}
?>   

            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:<?php echo htmlentities($email);?>"><?php echo htmlentities($email);?></a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:<?php echo htmlentities($contactno);?>"><?php echo htmlentities($contactno);?></a> </div>
            <div class="social-follow">
            </div>

   <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 

echo "Welcome To Sampodabook";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 <!-- Navigation -->
<nav id="navigation_bar" class="navbar navbar-default" style="background-color: #222; border: none;">
    <div class="container-fluid" style="padding: 0;">
        <div class="header_wrap" style="display: flex; justify-content: center; align-items: center;">
            <div class="navbar_content" style="display: flex; align-items: center;">
                <!-- Navigation Menu -->
                <ul class="nav navbar-nav" style="font-size: 11px; white-space: nowrap; text-align: center; margin: 0;">
                    <li><a href="index.php" class="nav-link">Home</a></li>
                    <li><a href="page.php?type=aboutus" class="nav-link">About Us</a></li>
                    <li><a href="ebike-reservation.php" class="nav-link">E-Bike Reservation</a></li>
                    <li><a href="ebike-booking.php" class="nav-link">E-Bike Booking</a></li>
                    <li><a href="ebike-rental.php" class="nav-link">E-Bike Rental</a></li>
                    <li><a href="services.php" class="nav-link">Services</a></li>
                    <li><a href="page.php?type=faqs" class="nav-link">FAQs</a></li>
                    <li><a href="contact-us.php" class="nav-link">Contact Us</a></li>
                    <li><a href="contact-us.php" class="nav-link"></a></li>
                    <li><a href="contact-us.php" class="nav-link"></a></li>
                    <li><a href="contact-us.php" class="nav-link"></a></li>
                    <li><a href="contact-us.php" class="nav-link"></a></li>
                    <li><a href="contact-us.php" class="nav-link"></a></li>

                </ul>

                <!-- User Login Dropdown -->
                <ul class="nav navbar-nav" style="font-size: 11px; text-align: center; margin-left: 20px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 11px; color: #ccc; display: inline-flex; align-items: center;">
                            <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 16px; margin-right: 5px;"></i>
                            <span style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 120px; display: inline-block;">
                                <?php 
                                    $email = $_SESSION['login'];
                                    $sql = "SELECT FullName FROM ebikeusers WHERE EmailId=:email";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                            echo htmlentities($result->FullName);
                                        }
                                    }
                                ?>
                            </span>
                            <i aria-hidden="true" style="font-size: 10px; margin-left: 5px;"></i>
                        </a>
                        <ul class="dropdown-menu" style="right: 23; left: auto;">
                            <?php if ($_SESSION['login']) { ?>
                                <li><a href="profile.php">Profile Settings</a></li>
                                <li><a href="update-password.php">Update Password</a></li>
                                <li><a href="my-reservation.php">My Reservation</a></li>
                                <li><a href="my-booking.php">My Booking</a></li>
                                <li><a href="my-rental.php">My Rental</a></li>
                                <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                                <li><a href="my-testimonials.php">My Testimonials</a></li>
                                <li><a href="logout.php">Sign Out</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</nav>

<!-- CSS for styling -->
<style>
    /* Make fonts smaller, lighter, and center the content */
    .nav-link {
        font-size: 11px;
        font-weight: 500;
        color: #ccc;
        padding: 10px 15px;
        text-transform: uppercase;
        text-align: center;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .nav-link:hover {
        color: #fff;
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8); /* Glow effect */
    }

    /* Dropdown menu styling */
    .dropdown-menu {
        background-color: #333;
        border: none;
        padding: 5px 0;
        min-width: 150px;
        right: 0;
        left: auto;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu > li > a {
        font-size: 11px;
        padding: 8px 15px;
        color: #ccc;
        background-color: #333;
        transition: background-color 0.3s ease, color 0.3s ease, text-shadow 0.3s ease;
    }

    .dropdown-menu > li > a:hover {
        background-color: #007bff;
        color: white;
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8); /* Glow effect */
    }

    /* Hover effect for the user dropdown */
    .dropdown-toggle:hover {
        background-color: transparent;
        color: #fff;
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8); /* Glow effect */
    }

    /* Darker navbar background */
    .navbar-default {
        background-color: #222;
        border: none;
    }

    /* Align user icon and name */
    .fa-user-circle {
        font-size: 16px;
        margin-right: 5px;
        color: #ccc;
    }

    .fa-angle-down {
        font-size: 10px;
        color: #ccc;
    }

    /* Text ellipsis for long names */
    .header_wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navbar_content {
        display: flex;
        align-items: center;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .header_wrap {
            flex-direction: column;
        }

        .nav-link {
            font-size: 12px;
        }

        .dropdown-menu {
            min-width: 100px;
        }
    }
</style>
