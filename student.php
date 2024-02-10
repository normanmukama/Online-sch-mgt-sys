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
        header('location: students.php');
    }
    else{
        echo "Data not inserted";
    }
}
else{
    echo "Failed to get data from the form";
}
?>
