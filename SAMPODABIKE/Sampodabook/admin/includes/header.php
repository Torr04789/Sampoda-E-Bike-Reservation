<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampodabook | Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #333; /* Dark background for the header */
            color: white; /* White text color */
        }

        .brand-link {
            font-size: 25px;
            color: black;
            text-decoration: none;
        }

        .menu-btn {
            cursor: pointer;
            font-size: 20px;
            color: white;
        }

        .ts-profile-nav {
            list-style: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .ts-account {
            position: relative;
            margin-left: 20px;
        }

        .ts-account a {
            color: white; /* Ensure the account link is visible */
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .ts-account img.ts-avatar {
            width: 30px; /* Set avatar size */
            height: 30px;
            border-radius: 50%; /* Circular avatar */
            margin-right: 10px; /* Space between image and text */
        }

        .ts-account .dropdown-menu {
            display: none;
            position: absolute;
            background: white;
            color: #333;
            border-radius: 5px;
            z-index: 10;
            margin-top: 5px;
            min-width: 150px; /* Width of the dropdown */
        }

        .ts-account:hover .dropdown-menu {
            display: block; /* Show dropdown on hover */
        }

        .ts-account .dropdown-menu li {
            list-style: none;
        }

        .ts-account .dropdown-menu li a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: #333; /* Dark text for dropdown items */
        }

        .ts-account .dropdown-menu li a:hover {
            background-color: #f0f0f0; /* Light background on hover */
        }
    </style>
</head>
<body>
    <div class="brand clearfix">
        <a href="dashboard.php" class="brand-link" aria-label="Sampodabook Admin Panel">
            Sampodabook | Admin Panel
        </a>
        <span class="menu-btn" aria-label="Menu">
            <i class="fa fa-bars"></i>
        </span>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#" class="account-link">
                    <img src="img/ts-avatar.jpg" class="ts-avatar" alt="User Avatar" />
                    Account <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>
