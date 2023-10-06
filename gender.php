<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <form action="#" method="POST">
    <!-- <div class="mb-3" id="genderContainer">
      <label for="Gender" class="form-label">Gender</label>
      <div class="d-flex justify-content-start">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male">
          <label class="form-check-label" for="Male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female">
          <label class="form-check-label" for="Female">Female</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="Other" value="Other">
          <label class="form-check-label" for="Other">Other</label>
        </div>
      </div>
    </div>
    <button type="submit">submit your gender</button> -->
    
    <div class="coursesContainer">
      <label for="courses" class="form-label">Courses: </label>
      <select class="mx-4" name="courses" id="courses">
        <option value="">SELECT</option>
        <option value="phpDeveloper">phpDeveloper</option>
        <option value="MernStack">MernStack</option>
        <option value="MeanStack">MeanStack</option>
        <option value="JavaDeveloper">JavaDeveloper</option>
        <option value="ROR">ROR</option>
        <option value="UI/UX">UI/UX</option>
      </select>
      
      <button type="submit">submit your gender</button>
    </div>
  </form>
</div>
    
    <?php
    // if(isset($_POST['Gender'])){
    //   echo $_POST['Gender'];
    // }
    if(isset($_POST['courses'])){
      echo $_POST['courses'];
    }
  ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>