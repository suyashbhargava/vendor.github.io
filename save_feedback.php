<?php
// Retrieve the feedback message from the form
$message = $_POST['message'];

// Create a database connection
$servername = "localhost";
$username = "root";
$password = ""; // Enter your database password here
$dbname = "responsiveform";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the feedback message into the table
$sql = "INSERT INTO feedback (message) VALUES ('$message')";

if ($conn->query($sql) === TRUE) {
    echo "Feedback saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
