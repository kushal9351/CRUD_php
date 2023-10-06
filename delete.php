<?php
if(isset($_GET["id"])){
    $id = $_GET['id'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database =  "myshop";


    $con = mysqli_connect($server, $username, $password, $database);

    $sql = "DELETE FROM clients where id=$id";
    $con->query($sql);
}

header("location: /myshop/index.php");
exit;

?>