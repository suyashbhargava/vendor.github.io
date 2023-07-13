<!DOCTYPE html>
<html lang="en">
<head>
    <title>Isevak(Vendor Dashboard)</title>
    <link rel="stylesheet" type="text/css" href="vendordashboradstyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span> Isevak</h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="" class="active"><span class="las la-igloo"></span>
                    <span>DashBoard</span></a>
            </li>
            <li>
                <a href="Our Product.php"><span class="las la-store"></span>
                    <span>Our product</span></a>
            </li>
            <li>
                <a href="Discount.php"><span class="las la-percent"></span>
                    <span>Discount</span></a>
            </li>
            <li>
                <a href="booking.php"><span class="las la-list"></span>
                    <span>Booking</span></a>
            </li>
            <li>
                <a href="Our Services.php"><span class="las la-clipboard-list"></span>
                    <span>Our services</span></a>
            </li>
            <li>
                <a href="login.php"><span class="las la-sign-out-alt"></span>
                    <span>Logout</span></a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <h2>
            <label for="">
                <span class="las la-bars"></span>
            </label>
            DashBoard
        </h2>
        <div class="language-buttons">
            <!-- Replace the Hindi button with an anchor tag -->
            <a href="hindi\booking.php" class="language-button" style="background-color: blueviolet; color: #fff; padding: 8px 12px; margin-right: 10px; text-decoration: none; font-size: 14px; border-radius: 4px;">हिन्दी</a>
            <a href="#" class="language-button" style="background-color: blueviolet; color: #fff; padding: 8px 12px; margin-right: 10px; text-decoration: none; font-size: 14px; border-radius: 4px;">English</a>
        </div>
        <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="Search here"/>
        </div>
        <?php
        session_start();
        include("connection.php");

        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            header('location: login.php');
            exit;
        }

        // Retrieve the username from the session
        $username = $_SESSION['username'];

        // Retrieve user data from the database
        $query = "SELECT * FROM form WHERE user = '$username'";
        $data = mysqli_query($conn, $query);

        if ($data) {
            // Fetch the user's image and name
            $row = mysqli_fetch_assoc($data);
            $imageName = $row['img'];
            $name = $row['fname'];
        } else {
            // Handle database query error
            $imageName = 'default-image.jpg';
            $name = 'Unknown';
        }
        ?>
        <div class="first">
            <div class="user-wrapper">
                <img src="<?php echo $imageName; ?>" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $name; ?></h4>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="cards">
            <a href="retrived.php">
            <div class="card-single">
                <div>
                    <h1>64</h1>
                    <span>Total Sales</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            </a>
            <div class="card-single">
                <div>
                    <h1>890</h1>
                    <span>Total Income</span>
                </div>
                <div>
                    <span class="las la-clipboard-list"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>510</h1>
                    <span>Total services</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>1,00,000</h1>
                    <span>Total Booking</span>
                </div>
                <div>
                    <span class="las la-receipt"></span>
                </div>
            </div>
        </div>
    </main>

    <footer>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="app.js"></script>
</div>
</body>
</html>