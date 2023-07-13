<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "responsiveform";
$table = "service_name";

// Validate and sanitize the data

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the data from the table
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table and add the CSS
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>"; // Add this line

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Price</th>";
        echo "<th>Area</th>";
        echo "<th>Time</th>";
        echo "<th>Date</th>";
        echo "<th>Service</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            // Validate and sanitize the data
            $price = isset($row["price"]) ? $conn->real_escape_string($row["price"]) : "";
            $area = isset($row["area"]) ? $conn->real_escape_string($row["area"]) : "";
            $time = isset($row["time"]) ? $conn->real_escape_string($row["time"]) : "";
            $date = isset($row["date"]) ? $conn->real_escape_string($row["date"]) : "";
            $service = isset($row["service"]) ? $conn->real_escape_string($row["service"]) : "";

            echo "<tr>";
            echo "<td>".$price."</td>";
            echo "<td>".$area."</td>";
            echo "<td>".$time."</td>";
            echo "<td>".$date."</td>";
            echo "<td>".$service."</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th>Price</th>";
        echo "<th>Area</th>";
        echo "<th>Time</th>";
        echo "<th>Date</th>";
        echo "<th>Service</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "</table>";
    } else {
        echo "No data found.";
    }
} else {
    echo "Error retrieving data: " . $conn->error;
}

// Close the connection
$conn->close();
?>
