<?php
// error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$database = "responsiveform";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn) {
    // echo "Connection ok";
} else {
    echo "Connection Failed" . mysqli_connect_error();
}
?>


<?php
// error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "responsiveform";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if($conn)
    {
        // echo "Connection ok";
    }
    else
    {
        echo "Connection Failed".mysqli_connect_error();
    }
?>