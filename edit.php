<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";
    $con = mysqli_connect($server, $username, $password, $database);

    $id = "";
    $name = "";
    $gender = "";
    $courses = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location: /myshop/index.php");
            exit;
        }


        $id = $_GET['id'];
        $sql = "SELECT * FROM clients WHERE id=$id;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: /myshop/index.php");
        }
        $name = $row['name'];
        $gender = $row['Gender'];
        $courses = $row['courses'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];

    }
    else{
        // POST request 
        $id = $_POST['id'];
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

            $sql = "UPDATE clients SET std_image= '$folder', name = '$name', Gender='$gender', courses='$courses', email='$email', phone='$phone', address='$address' where id=$id"; 
            $result = $con->query($sql);

            if(!$result){
                // die("Invalid query: " . $con->error);
                $errorMessage = "Invalid query: " .  $con->error;
                break;
            } 
            
            $successMessage = "Client added correctly";
            
            header("location: /myshop/index.php");
            exit;
            
        }while(false);
    }       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>php</title>
    
</head>
<body>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/myshop/index.php">&larr; Home</a>
        </div>
    </nav>
    <div class="container">
        <h1>edit form</h1>
        <p>Enter your details</p>
        <?php
            if(!empty($errorMessage)){
                echo "
                    <div class = 'row mb-3'>
                        <div class = 'offset-sm-3 col-sm-6'>
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>
        <form  method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
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

            <div class="input-group mb-3" style="width: 50vw;">
  <input type="file" class="form-control" id="uploadfile" name="uploadfile" onchange="getImagePreview(event)">
  <label class="input-group-text" for="uploadfile">Upload</label>
</div>
<div id="preview"></div>
                <!-- name section -->
            <div class="mb-3" id="nameContainer">
    <label for="name" class="form-label">Name <span style="color: red;">* </span></label>
    <input type="text" class="form-control inpTxt" name="name" id="name" placeholder="Enter your name" value="<?php echo $name ?>" required >
    <b><span style="color: red" class="formError form-text"></span></b>
</div>
<!-- gender Section -->
<div class="mb-3" id="genderContainer">
    <label for="Gender" class="form-label">Gender <span style="color: red;">* </span></label>
    <div class="d-flex justify-content-start">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" required>
        <label class="form-check-label" for="Male">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" required>
        <label class="form-check-label" for="Female">Female</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="Other" value="Other" required>
        <label class="form-check-label" for="Other">Other</label>
      </div>
    </div>
  </div>


  <!-- courses section -->
<div class="coursesContainer">
  <label for="courses" class="form-label">Courses: <span style="color: red;">* </span></label>
  <select class="mx-4" name="courses" id="courses" value="<?php echo $courses ?>" required>
    <option value="">SELECT</option>
    <option value="phpDeveloper">phpDeveloper</option>
    <option value="MernStack">MernStack</option>
    <option value="MeanStack">MeanStack</option>
    <option value="JavaDeveloper">JavaDeveloper</option>
    <option value="ROR">ROR</option>
    <option value="UI/UX">UI/UX</option>
    </select>
  </div>


<div class="mb-3" id="emailContainer">
    <label for="email" class="form-label">Email address <span style="color: red;">* </span></label>
    <input type="email" class="form-control inpTxt" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter your email" value="<?php echo $email ?>" required>
    <b><span style="color: red" class="formError form-text"></span></b>
</div>
<div class="mb-3" id="phoneContainer">
    <label for="phone" class="form-label">Phone No. <span style="color: red;">* </span></label>
    <input type="phone" class="form-control inpTxt" name="phone" id="phone" placeholder="Enter your phone" value="<?php echo $phone ?>" required>
    <b><span style="color: red" class="formError form-text"></span></b>
</div>
<div class="mb-3" id="addressContainer">
    <label for="address" class="form-label">Address</label>
    <!-- <input type="address" class="form-control inpTxt" name="address" id="address" placeholder="Enter your Address" value="<?php echo $address ?>"> -->
    <textarea class="form-control inpTxt" name="address" id="address" cols="30" rows="10" placeholder="Enter your Address" value=""><?php echo $address ?></textarea>
    <b><span style="color: red" class="formError form-text"></span></b>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        <div class="button">
            <button id="rst">Reset</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="action.js"></script>

</body>
</html>