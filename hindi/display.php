<?php
session_start();
// echo "Welcome ".$_SESSION['username']
?>

<html>
    <head>
        <title>Display</title>
        <style>
            body
            {
                background-color: darkcyan;
            }
            table
            {
                background-color: white;
            }
            .update,.delete
            {
                background-color: green;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
            .delete
            {
                background-color: red;
                
            }
        </style>
    <head>

<?php
include("connection.php");
error_reporting(0);

$userprofile = $_SESSION['username'];

if($userprofile == true)
{

}
else
{
    // header('location:login.php');
}

$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

// echo $result['fname'];

// echo $total;

if($total != 0)
{   
    ?>
   
    <h2 align="center"><mark>Displaying Vendor's Records </mark></h2>
   
    <center><table border="1" cellspacing="7" width="105%">
        <tr>
        <th width="2%">ID</th>
        <th width="5%">Image</th>
        <th width="5%">First Name</th>
        <th width="5%">User Id</th>
        <th width="5%">Email Address</th>
        <th width="5%">Phone Number</th>
        <th width="5%">Password</th>
        <th width="5%">Confirm Password</th>
        <th width="5%">Aadhar Number</th>
        <th width="5%">Comapany</th>
        <th width="5%">Position</th>
        <th width="3%">Start</th>
        <td width="3%">End</th>
        <th width="3%">Gender</th>
        <th width="10%">Temporary</th>
        <th width="10%">Permanenet</th>
        <th width="14%">Discription</th>
        <th width="16%">Operation</th>
        </tr>

    <?php

    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                <td>".$result['id']."</td>
                <td><img src='".$result['img']."'height='100px' width='100px'></td>
                <td>".$result['fname']."</td>
                <td>".$result['user']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['password']."</td>
                <td>".$result['confirm']."</td>
                <td>".$result['adhar']."</td>
                <td>".$result['company']."</td>
                <td>".$result['position']."</td>
                <td>".$result['start']."</td>
                <td>".$result['end']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['temporary']."</td>
                <td>".$result['permanent']."</td>
                <td>".$result['description']."</td>

                <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'</a>
                <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a></td>
             </tr>";
        
    }
}
else
{
    echo 'No records found';
}
?>
</table>
</center>

<!-- <a href="logout.php"><input type="submit" name="" value="Logout" style="background: blue; color: white; height: 35px; width: 100px; margin-top: 20px; font-size: 18px; border:0; border-radius: 5px; cursor: pointer;"></a> -->

<script>
    function checkdelete()
    {
        return confirm('Are you sure do you want to delete this record ?');
    }
</script>
</html>