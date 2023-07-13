<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>बुकिंग विवरण</title>
    <script type="text/javascript" src="dashboard.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboradstyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> इसेवक</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                        <span>डैशबोर्ड</span></a>
                </li>
                <li>
                    <a href="Our Product.php"><span class="las la-store"></span>
                        <span>हमारा उत्पाद</span></a>
                </li>
                <li>
                    <a href="Discount.php"><span class="las la-percent"></span>
                        <span>छूट</span></a>
                </li>
                <li>
                    <a href="booking.php"><span class="las la-list"></span>
                        <span>बुकिंग</span></a>
                </li>
                <li>
                    <a href="Our Services.php"><span class="las la-clipboard-list"></span>
                        <span>हमारी सेवाएं</span></a>
                </li>
                <li>
                    <a href="login.php"><span class="las la-sign-out-alt"></span>
                        <span>लॉगआउट</span></a>
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
                बुकिंग विवरण
            </h2>
            <div class="language-buttons">
                <a href="#" class="language-button" style="background-color: blueviolet; color: #fff; padding: 8px 12px; margin-right: 10px; text-decoration: none; font-size: 14px; border-radius: 4px;">हिन्दी</a>
                <a href="" class="language-button" style="background-color: blueviolet; color: #fff; padding: 8px 12px; margin-right: 10px; text-decoration: none; font-size: 14px; border-radius: 4px;">English</a>
            </div>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="यहाँ खोजें"/>
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
            <div class="user-wrapper">
                <img src="" width="40px" height="40px" alt="">
                <div>
                    <h4>जॉन डो</h4>
                    <small>सुपर एडमिन</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
            <a href="retrived.php">
                <div class="card-single">
                    <div>
                        <h1>64</h1>
                        <span>कुल बुकिंग</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
            </a>
                <div class="card-single">
                    <div>
                        <h1>890</h1>
                        <span>आज की बुकिंग</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>510</h1>
                        <span>रद्द हुए आर्डर</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>1,00,000</h1>
                        <span>आज की बुकिंग की आय</span>
                    </div>
                    <div>
                        <span class="las la-receipt"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="project">
                    <div class="card">
                        <div class="card-header">
                            <h2>आज की बुकिंग</h2>
                            <button>सभी देखें <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>उत्पाद का शीर्षक</td>
                                        <td>विक्रेता का नाम</td>
                                        <td>स्थिति</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>एक्सवाईजी डिज़ाइन</td>
                                        <td>रवि साहू</td>
                                        <td>
                                            <span class="pending"></span>
                                              समीक्षा
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>एक्सवाईजी उत्पाद</td>
                                        <td>मुकेश दास</td>
                                        <td>
                                            <span class="status"></span>
                                            प्रगति में
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>एक्सवाईजी उत्पाद</td>
                                         <td>मोहन दास</td>
                                         <td>
                                           <span class="status"></span>
                                           लंबित
                                          </td>
                                                                       </tr>
                                    <tr>
                                        <td>एक्सवाईजी डिज़ाइन</td>
                                        <td>रवि साहू</td>
                                        <td>
                                            <span class="pending"></span>
                                              समीक्षा
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>एक्सवाईजी उत्पाद</td>
                                        <td>मुकेश दास</td>
                                        <td>
                                            <span class="status"></span>
                                            प्रगति में
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>एक्सवाईजी उत्पाद</td>
                                         <td>मोहन दास</td>
                                         <td>
                                           <span class="status"></span>
                                           लंबित
                                          </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h2>बुकिंग फ़ीडबैक</h2>
                            <button>सभी देखें <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <img src="img.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>रवि साहू</h4>
                                    <small>शॉप नंबर 4 भोपाल</small>
                                </div>
                            </div>
                            <div>
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>

                            <div class="customer">
                                <img src="img.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>रवि साहू</h4>
                                    <small>शॉप नंबर 4 भोपाल</small>
                                </div>
                            </div>
                            <div>
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>

                            <div class="customer">
                                <img src="img.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>रवि साहू</h4>
                                    <small>शॉप नंबर 4 भोपाल</small>
                                </div>
                            </div>
                            <div>
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>

                            <div class="customer">
                                <img src="img.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>रवि साहू</h4>
                                    <small>शॉप नंबर 4 भोपाल</small>
                                </div>
                            </div>
                            <div>
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p>कॉपीराइट &copy; 2023</p>
        </footer>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="app.js"></script>
</body>
</html>