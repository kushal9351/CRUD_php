<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/myshop/index.php">Home</a>
        </div>
    </nav>
    

    <div class="container my-5">
        <h2>list of Students</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Entry</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Courses</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "myshop";

                    $con = mysqli_connect($server, $username, $password, $database);

                    if(!$con){
                        die("connection failed due to " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM clients";
                    $result = $con->query($sql);

                    if(!$result){
                        die("Invalid query: " . $con->error);
                    }
                    $count = 1;
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                        <td>$count</td>
                        <td><img src='$row[std_image]' height='50' width='50' alt='empty field'></td>
                        <td>$row[name]</td>
                        <td>$row[Gender]</td>
                        <td>$row[courses]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                        </td>
                        </tr>
                        ";
                        $count++;
                    }
                ?>
                
            </tbody>
        </table>
    </div>
<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>