<?php
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

// Retrieve all feedback messages from the table
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Feedback Messages</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['message'] . "</p>";
    }
} else {
    echo "<p>No feedback messages found.</p>";
}

$conn->close();
?>
