<!DOCTYPE html>
<html>
<head>
    <title>Service Selection</title>
    <script>
        function selectService(service) {
            document.getElementById("service").value = service;
            document.getElementById("service-list").innerHTML = "";
        }
    </script>
</head>
<body>
    <?php
    // Your PHP code to fetch services from the database and assign it to $result variable

    // Example $result data for testing
    $result = mysqli_query($connection, "SELECT * FROM services");
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p onclick=\"selectService('" . $row[$column] . "')\">" . $row[$column] . "</p>";
        }
    } else {
        echo "<p>No services found.</p>";
    }
    ?>
    
    <!-- HTML form -->
    <form>
        <label for="service">Selected Service:</label>
        <input type="text" id="service" name="service">
    </form>
    <div id="service-list"></div>
</body>
</html>