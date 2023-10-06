<form method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

<!-- file section -->
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
        <input class="form-check-input" type="radio" name="gender" id="Male" value="Male"  required>
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
  <select class="mx-4" name="courses" id="courses" required>
    <option value="">SELECT</option>
    <option value="phpDeveloper">phpDeveloper</option>
    <option value="MernStack">MernStack</option>
    <option value="MeanStack">MeanStack</option>
    <option value="JavaDeveloper">JavaDeveloper</option>
    <option value="ROR">ROR</option>
    <option value="UI/UX">UI/UX</option>
  </select>
</div>
  

<!-- email section -->
<div class="mb-3" id="emailContainer">
    <label for="email" class="form-label">Email address <span style="color: red;">* </span></label>
    <input type="email" class="form-control inpTxt" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter your email" value="<?php echo $email ?>" required>
    <b><span style="color: red" class="formError form-text"></span></b>
</div>

<!-- Phone section -->
<div class="mb-3" id="phoneContainer">
    <label for="phone" class="form-label">Phone No. <span style="color: red;">* </span></label>
    <input type="number" class="form-control inpTxt" name="phone" id="phone" placeholder="Enter your phone" value="<?php echo $phone ?>" required>
    <b><span style="color: red" class="formError form-text"></span></b>
</div>

<!-- address section -->
<div class="mb-3" id="addressContainer">
    <label for="address" class="form-label">Address</label>
    <!-- <input type="address" class="form-control inpTxt" name="address" id="address" placeholder="Enter your Address" value="<?php echo $address ?>"> -->
    <textarea class="form-control inpTxt" name="address" id="address" cols="30" rows="10" placeholder="Enter your Address" value="<?php echo $address ?>"></textarea>
    <b><span style="color: red" class="formError form-text"></span></b>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>