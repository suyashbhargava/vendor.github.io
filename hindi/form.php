<!-- <?php include("connection.php"); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="section1">
    <div class="container">
        <form action="form.php" method="post" enctype="multipart/form-data">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>Upload Image</label>
                <input type="file" name="uploadfile" style="width: 100%">
            </div>

            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label>Username</label>
                <input type="text" class="input" name="user" required>
            </div>

            <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email" required>
            </div>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" class="input" name="phone" required>
            </div>

            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>

            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="confirm" required>
            </div>

            <div class="input_field">
                <label>Aadhar Number</label>
                <input type="text" class="input" name="adhar" required>
            </div>

            <div class="input_field">
                <label>Comapany</label>
                <input type="text" class="input" name="comapany">
            </div>

            <div class="input_field">
                <label>Position</label>
                <input type="text" class="input" name="position">
            </div>

            <div class="input_field">
                <label>Date</label>
                <input type="text" class="input" name="start" required>
            </div>

            <div class="input_field">
                <label>End Date</label>
                <input type="text" class="input" name="end" required>
            </div>

            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </div>
            </div>
            
            <div class="input_field">
                <label>Temporary Address</label>
                <textarea class="textarea" name="temporary" required></textarea>
            </div>

            <div class="input_field">
                <label>Permanent Address</label>
                <textarea class="textarea" name="permanent" required></textarea>
            </div>

            <div class="input_field">
                <label>Description</label>
                <textarea class="textarea" name="description"></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to term and condition</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Register" class="btn" name="register">
            </div>
        </div>
        </form>
    </div>
    </div>
</body>
</html>

<?php
// Include the file for database connection
include("connection.php");

// Check if the form is submitted
if (isset($_POST['register'])) {
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname, $folder);
    $fname = $_POST['fname'];
    $uname = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $adhar = $_POST['adhar'];
    $company = $_POST['comapany'];
    $position = $_POST['position'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $gender = $_POST['gender'];
    $temporary = $_POST['temporary'];
    $permanent = $_POST['permanent'];
    $description = $_POST['description'];

    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "responsiveform");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Perform the database query
    $query = "INSERT INTO form (img, fname, user, email, phone, password, confirm, adhar, company, position, start, end, gender, temporary, permanent, description) VALUES ('$folder','$fname', '$uname', '$email', '$phone', '$password', '$confirm', '$adhar', '$company', '$position', '$start', '$end', '$gender', '$temporary', '$permanent', '$description')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>window.location = 'login.php';</script>";
    } else {
        echo "<script>alert('Registration failed. Please try again.');</script>";
    }
    

    // Close the database connection
    mysqli_close($conn);
}
?>
