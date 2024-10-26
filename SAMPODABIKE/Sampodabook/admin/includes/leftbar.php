<nav class="ts-sidebar">
    <ul class="ts-sidebar-menu">
        <li class="ts-label">Main</li>
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="gpsmaplocation.php"><i class="fa fa-dashboard"></i> GPS Location</a></li>

        <li><a href="#"><i class="fa fa-files-o"></i> Brands</a>
            <ul>
                <li><a href="create-brand.php">Create Brand</a></li>
                <li><a href="manage-brands.php">Manage Brands</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-motorcycle"></i> E-Bikes</a>
            <ul>
                <li><a href="post-avehical.php">Add a E-Bike</a></li>
                <li><a href="manage-vehicles.php">Manage E-Bikes</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-sitemap"></i> Reservation</a>
            <ul>
                <li><a href="new-reservations.php">New</a></li>
                <li><a href="confirmed-reservations.php">Confirmed</a></li>
                <li><a href="canceled-reservations.php">Canceled</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-sitemap"></i> Bookings</a>
            <ul>
                <li><a href="new-bookings.php">New</a></li>
                <li><a href="confirmed-bookings.php">Confirmed</a></li>
                <li><a href="canceled-bookings.php">Canceled</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa fa-sitemap"></i> Rentals</a>
            <ul>
                <li><a href="new-rentals.php">New</a></li>
                <li><a href="confirmed-rentals.php">Confirmed</a></li>
                <li><a href="canceled-rentals.php">Canceled</a></li>
            </ul>
        </li>

        <li><a href="testimonials.php"><i class="fa fa-table"></i> Manage Testimonials</a></li>
        <li><a href="manage-conactusquery.php"><i class="fa fa-desktop"></i> Manage Contact Us Query</a></li>
        <li><a href="reg-users.php"><i class="fa fa-users"></i> Registered Users</a></li>
        <li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
        <li><a href="update-contactinfo.php"><i class="fa fa-info-circle"></i> Update Contact Info</a></li>
        <li><a href="manage-subscribers.php"><i class="fa fa-envelope"></i> Manage Subscribers</a></li>
    </ul>
</nav>

<!-- Custom CSS for Sidebar -->
<style>
    .ts-sidebar {
        background-color: #2c3e50;
        min-width: 250px;
        padding-top: 20px;
        color: #ecf0f1;
        font-family: 'Roboto', sans-serif;
    }

    .ts-sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .ts-sidebar-menu li {
        margin-bottom: 20px;
    }

    .ts-sidebar-menu a {
        color: #ecf0f1;
        text-decoration: none;
        display: block;
        padding: 10px 20px;
        font-size: 15px;
        font-weight: 500;
        transition: background 0.3s ease, padding-left 0.3s ease;
    }

    .ts-sidebar-menu a:hover {
        background-color: #1abc9c;
        padding-left: 30px;
    }

    .ts-sidebar-menu a i {
        margin-right: 10px;
    }

    .ts-sidebar-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        padding-left: 15px;
    }

    .ts-sidebar-menu ul li {
        margin-bottom: 10px;
    }

    .ts-sidebar-menu ul a {
        font-size: 14px;
        font-weight: 400;
        padding: 10px 20px;
        color: #bdc3c7;
        transition: background 0.3s ease, padding-left 0.3s ease;
    }

    .ts-sidebar-menu ul a:hover {
        background-color: #16a085;
        padding-left: 30px;
    }

    .ts-label {
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 15px;
        padding: 10px 20px;
        font-size: 14px;
        color: #95a5a6;
        letter-spacing: 1px;
        border-bottom: 1px solid #34495e;
    }
</style>
