<!DOCTYPE html>
<html>
<head>
    <title>Service Form</title>
    <link rel="stylesheet" type="text/css" href="st.css">
</head>
<body>
    <h1>Service Form</h1>
    <form action="insert_service.php" method="POST">
        <label for="price">Amount:</label>
        <input type="text" id="price" name="price" required><br><br>
        
        <label for="area">Area:</label>
        <input type="text" id="area" name="area" required><br><br>
        
        <label for="time">Time:</label>
        <input type="text" id="time" name="time" required><br><br>

        <label for="date">Date:</label>
        <input type="text" id="date" name="date" required><br><br>
        
        <label for="service">Service:</label>
        <input type="text" id="service" name="service" required autocomplete="off">
        <div id="service-list"></div>
        
        <input type="submit" value="Submit">
    </form>

    <script>
        // Function to populate the selected service in the input field
        function selectService(serviceName) {
            document.getElementById("service").value = serviceName;
            document.getElementById("service-list").innerHTML = ""; // Clear the service list
        }

        // AJAX function to fetch services based on user input
        function fetchServices(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("service-list").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "fetch_services.php?q=" + str, true);
            xmlhttp.send();
        }

        // Event listener for the input field to call the fetchServices function
        document.getElementById("service").addEventListener("input", function() {
            var input = this.value;
            if (input.length > 0) {
                fetchServices(input);
            } else {
                document.getElementById("service-list").innerHTML = "";
            }
        });
    </script>

    
</body>
</html>