<!DOCTYPE html>
<html>
<head>
    <title>सेवा फ़ॉर्म</title>
    <link rel="stylesheet" type="text/css" href="st.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        
        body {
            height: min-content;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: blueviolet;
            font-family: 'Poppins', sans-serif;
        }
        
        .container {
            max-width: 512px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        
        .title {
            font-size: 30px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center; /* Added align-items property */
            margin: 20px 0 12px 0;
        }
        
        .content form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(33.33% - 10px); /* Updated width */
        }
        
        .content form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: #333;
        }
        
        .content form .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        
        .content form .user-details .input-box input:focus,
        .content form .user-details .input-box input:valid {
            border-color: #9b59b6;
        }
        
        .button {
            height: 45px;
            margin: 35px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: blueviolet;
        }
        
        .button input:hover {
            background: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">सेवा फ़ॉर्म</h1>
        <form action="insert_service.php" method="POST" class="content">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">मूल्य:</span>
                    <br>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="input-box">
                    <span class="details">क्षेत्र:</span>
                    <br>
                    <input type="text" id="area" name="area" required>
                </div>
                <div class="input-box">
                    <span class="details">समय:</span>
                    <br>
                    <input type="text" id="time" name="time" required>
                </div>
                <div class="input-box">
                    <span class="details">तारीख:</span>
                    <br>
                    <input type="text" id="date" name="date" required>
                </div>
                <div class="input-box">
                    <span class="details">सेवा:</span>
                    <br>
                    <input type="text" id="service" name="service" required autocomplete="off">
                    <div id="service-list"></div>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="सबमिट करें">
            </div>
        </form>
    </div>

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
