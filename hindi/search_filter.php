<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="search.css">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vendor's Record List</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="filter_value" class="form-control" placeholder="Search/Filter Record">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="filter_btn" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Password</th>
                            <th scope="col">Confirm</th>
                            <th scope="col">Aadharcard</th>
                            <th scope="col">Company</th>
                            <th scope="col">Position</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Temporary Address</th>
                            <th scope="col">Permanent Address</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "", "responsiveform");
                        if (isset($_POST['filter_btn'])) {
                            $value_filter = $_POST['filter_value'];
                            $query = "SELECT * FROM form WHERE CONCAT(id,fname,user) LIKE '%$value_filter%' ";
                            $query_run = mysqli_query($connection, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_array($query_run)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['img']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['user']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['confirm']; ?></td>
                                        <td><?php echo $row['adhar']; ?></td>
                                        <td><?php echo $row['company']; ?></td>
                                        <td><?php echo $row['position']; ?></td>
                                        <td><?php echo $row['start']; ?></td>
                                        <td><?php echo $row['end']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['temporary']; ?></td>
                                        <td><?php echo $row['permanent']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery (you may need to include these if not already included in your project) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4u5f+oY3S2owtX3m1zQRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
