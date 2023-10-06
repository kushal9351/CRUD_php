<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection failed due to " . mysqli_connect_error());
    }
    else{

        // echo "Successfully connected"; 
        
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        // echo $gender;
        
        //INSERT INTO DATABASE
        
        $sql = "INSERT INTO `trip`.`trips` (`name`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address', current_timestamp());";
        
        // $sql = INSERT INTO `trip`.`trips` (`name`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('rohan', '11', 'male', 'this@this.com', '9999999999', 'lkjsjdklfjd', '2023-09-15 09:10:58.000000');

        // echo $sql;
        
        if($con->query($sql) == true){
            echo "successfully inserted";
            $insert = true;
        }
        else{
            echo "Error ". $con->error;
        }
        
        
    }
}
    ?>


