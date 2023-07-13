<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Today's Registration</title>
    <link rel="stylesheet" type="text/css" href="today.css">
</head>
<body>
    <header>
        <h1>Today's Registration</h1>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Confirm</th>
                <th>Adhar</th>
                <th>Company</th>
                <th>Position</th>
                <th>Start</th>
                <th>End</th>
                <th>Gender</th>
                <th>Temporary</th>
                <th>Permanent</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'responsiveform';

        // Create a connection
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Execute the query
        $sql = "SELECT * FROM form WHERE DATE(start) = CURDATE() ORDER BY start ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['img']."</td>";
                echo "<td>".$row['fname']."</td>";
                echo "<td>".$row['user']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['confirm']."</td>";
                echo "<td>".$row['adhar']."</td>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['position']."</td>";
                echo "<td>".$row['start']."</td>";
                echo "<td>".$row['end']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['temporary']."</td>";
                echo "<td>".$row['permanent']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='17'>No data found.</td></tr>";
        }

        // Close the connection
        $conn->close();
        ?>
        </tbody>
    </table>

    <footer>
        <p>© 2023 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
