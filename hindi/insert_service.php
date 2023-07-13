<?php
// Retrieve the form data
$price = $_POST['price'];
$area = $_POST['area'];
$time = $_POST['time'];
$date = $_POST['date'];
$service = $_POST['service'];

// Connect to the MySQL database
$host = 'localhost';
$user = 'root';
$password = ''; // Enter your MySQL password here
$database = 'responsiveform';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the data into the table
$sql = "INSERT INTO service_name (price, area, time, date, service) VALUES ($price, '$area', '$time', '$date', '$service')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>