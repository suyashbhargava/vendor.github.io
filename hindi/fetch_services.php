<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "responsiveform";
$table = "service";
$column = "service_name";

// Establish a connection to the database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve services based on the user input
$input = $_GET['q'];
$query = "SELECT $column FROM $table WHERE $column LIKE '%$input%'";
$result = mysqli_query($conn, $query);

// Display the retrieved services
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p onclick=\"selectService('" . $row[$column] . "')\">" . $row[$column] . "</p>";
    }
} else {
    echo "<p>No services found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>