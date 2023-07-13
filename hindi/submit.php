<?php
// Assuming you have already established a connection to your MySQL server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiveform";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form submission
$price_list = isset($_POST['price_list']) ? $_POST['price_list'] : '';
$area = isset($_POST['area']) ? $_POST['area'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';
$milk = isset($_POST['milk']) ? $_POST['milk'] : '';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';

// Insert the data into the database
$sql = "INSERT INTO services (price_list, area, time, milk, amount)
        VALUES ('$price_list', '$area', '$time', '$milk', '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>