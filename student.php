<?php
$conn = mysqli_connect("localhost","root","", "OSMS1");

if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $regno = $_POST["regno"];
    $gender = $_POST["gender"];
    $parent = $_POST["pname"];
    $contact = $_POST["contact"];
    $location = $_POST["location"];
    $aggregates = $_POST["aggregates"];
    // Handling image upload
    $image = $_FILES["image"]["name"]; // Get the name of the uploaded file
    
    // Move uploaded file to a permanent location
    $target_dir = "uploads/"; // Directory where you want to store the uploaded files
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $query = mysqli_query($conn, "INSERT INTO student_info (firstname, lastname, age, regno, gender, pname, contact, addres, aggregates, profile_image)
    VALUES ('$firstname','$lastname','$age','$regno','$gender','$parent','$contact','$location','$aggregates','$image')");
    
    if($query){
        echo "Data inserted successfully";
    }
    else{
        echo "Data not inserted";
    }
}
else{
    echo "Failed to get data from the form";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Additional CSS for styling */
    body {
      background-color: #f4f4f4;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
  <h2 class="text-center text-primary">Student Information</h2>
    <div class="row">
        
      <div class="col-md-6">
        <div class="form-container">
          
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" name="firstname" class="form-control" id="firstName" placeholder="Enter first name" required>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Enter last name" required>
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" name="age" class="form-control" id="age" placeholder="Enter age" required>
            </div>
            <div class="form-group">
              <label for="regNumber">Registration Number</label>
              <input type="text" name="regno" class="form-control" id="regNumber" placeholder="Enter registration number" required>
            </div>
            <div class="form-group">
              <label for="regNumber">Gender</label>
              <input type="text" name="gender" class="form-control" id="regNumber" placeholder="Enter registration number" required>
            </div>
            <!-- <div class="form-group">
              <label for="gender">Gender</label>
              <select class="form-control" id="gender" name>
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div> -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-container">
            <div class="form-group">
              <label for="parentName">Parent's Name</label>
              <input type="text" name="pname" class="form-control" id="parentName" placeholder="Enter parent's name" required>
            </div>
            <div class="form-group">
              <label for="contact">Contact Number</label>
              <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter contact number" required>
            </div>
            <div class="form-group">
              <label for="location">Location</label>
              <input type="text" name="location" class="form-control" id="location" placeholder="Enter location" required>
            </div>
            <div class="form-group">
              <label for="aggregates">Aggregates</label>
              <input type="text" name="aggregates" class="form-control" id="aggregates" placeholder="Enter aggregates" required>
            </div>
            <div class="form-group">
    <label for="formFile" class="form-label">Profile image</label>
    <input class="form-control" name="image" type="file" id="formFile" required>
</div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
