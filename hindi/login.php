<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="loggin-style.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>

        <form action="#" method="POST" autocomplete="off">
        <div class="form">
            <input type="text" name="username" class="textfilled" placeholder="username">
            <input type="text" name="password" class="textfilled" placeholder="password">

            <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget password ?</a></div>

            <input type="submit" name="login" value="Login" class="btn">
             
            <div class="signup">new member ? <a href="#" class="link">SignUp Here</a></div>

        </div>
    </div>
    </form>
<script>
    function message(){
        alert("Remember Password")
    }
</script>

</body>
</html>

<?php
    include("connection.php");

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        $query = "SELECT * FROM form WHERE user ='$username' && password = '$pwd'";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
        // echo $total;

        if($total == 1)
        {
            $_SESSION['username'] = $username;
            header('location: vendor dashborad.php');
        }
        else
        {
            echo "Login Failed";
        }

    }
?>