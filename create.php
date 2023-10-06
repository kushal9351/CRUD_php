<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";
    $con = mysqli_connect($server, $username, $password, $database);

    $name = "";
    $gender = "";
    $courses = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $courses = $_POST['courses'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        do{
            if(empty($name) || empty($email) || empty($phone) || empty($gender) || empty($courses)){
                $errorMessage = "All the fields are required";
                break;
            }
            // print_r($_FILES["uploadfile"]);
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "images/".$filename;
            move_uploaded_file($tempname, $folder);

            $sql = "INSERT INTO clients (std_image, name, Gender, courses, email, phone, address) values ('$folder', '$name', '$gender', '$courses', '$email', '$phone', '$address');";
            $result = $con->query($sql);


            if(!$result){
                // die("Invalid query: " . $con->error);
                $errorMessage = "Invalid query: " .  $con->error;
                break;
            }

            $name = "";
            $gender= "";
            $courses = "";
            $email = "";
            $phone = "";
            $address = "";

            header("location: /myshop/index.php");
            exit;

            $successMessage = "Client added correctly";

        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>new registration</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/myshop/index.php">&larr; Home</a>
        </div>
    </nav>
    <div class="container">
        <h1>registration form</h1>
        <p>Enter your details</p>
        <?php
            // if($insert == true){
            //     echo "<p class='submitMsg'>'thanks for submitting'</p>";
            // }
            if(!empty($errorMessage)){
                echo "
                    <div class = 'row mb-3'>
                        <div class = 'offset-sm-3 col-sm-6'>
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>
            <?php
                if(!empty($successMessage)){
                    echo "
                        <div class = 'row mb-3'>
                            <div class = 'offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>

        <?php
            include "phpForm.php";
            
        ?>
        <div class="button">
            <button id="rst">Reset</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="action.js"></script>
</body>
</html>