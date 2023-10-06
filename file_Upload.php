<?php
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file Upload</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploadfile" id="uploadfile" onchange="getImagePreview(event)"><br><br>
            <div id="preview"></div>
            <input type="submit" value="uplaod file" name="Submit">
        </form>
    </div>
</body>
</html>

<script>
    function getImagePreview(event){
        let image = URL.createObjectURL(event.target.files[0]);
        let imgDiv = document.getElementById('preview');
        imgDiv.innerHTML = '';
        let newImg = document.createElement('img');
        newImg.src = image;
        newImg.width = 100;
        newImg.height = 100;
        imgDiv.appendChild(newImg);
    }
</script>


<?php
    // echo $_FILES["uploadfile"];
    print_r($_FILES["uploadfile"]);
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    echo "<img src='$folder' height='100px' width='100px'>"

?>