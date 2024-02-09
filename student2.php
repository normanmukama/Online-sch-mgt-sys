<?php
$conn = mysqli_connect("localhost", "root", "", "OSMS1");

// Function to fetch all student records
function fetchStudents()
{
    global $conn;
    $query = "SELECT * FROM student_info";
    $result = mysqli_query($conn, $query);
    $students = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }
    return $students;
}

// Function to insert student record
function insertStudent($data)
{
    global $conn;
    $query = "INSERT INTO student_info (firstname, lastname, age, regno, gender, pname, contact, addres, aggregates, profile_image)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssisssssss", $data['firstname'], $data['lastname'], $data['age'], $data['regno'], $data['gender'], $data['pname'], $data['contact'], $data['location'], $data['aggregates'], $data['image']);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_insert_id($stmt);
}

// Function to delete student record
function deleteStudent($id)
{
    global $conn;
    $query = "DELETE FROM student_info WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_affected_rows($stmt) > 0;
}

// Function to update student record
function updateStudent($id, $data)
{
    global $conn;
    $query = "UPDATE student_info SET firstname = ?, lastname = ?, age = ?, regno = ?, gender = ?, pname = ?, contact = ?, addres = ?, aggregates = ?, profile_image = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssisssssssi", $data['firstname'], $data['lastname'], $data['age'], $data['regno'], $data['gender'], $data['pname'], $data['contact'], $data['location'], $data['aggregates'], $data['image'], $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_affected_rows($stmt) > 0;
}

if (isset($_POST["submit"])) {
    $data = [
        'firstname' => $_POST["firstname"],
        'lastname' => $_POST["lastname"],
        'age' => $_POST["age"],
        'regno' => $_POST["regno"],
        'gender' => $_POST["gender"],
        'pname' => $_POST["pname"],
        'contact' => $_POST["contact"],
        'location' => $_POST["location"],
        'aggregates' => $_POST["aggregates"],
        'image' => $_FILES["image"]["name"]
    ];

    // Handling image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $insertedId = insertStudent($data);

    if ($insertedId) {
        echo "Data inserted successfully";
    } else {
        echo "Data not inserted";
    }
} elseif (isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $success = deleteStudent($id);
    if ($success) {
        echo "Data deleted successfully";
    } else {
        echo "Failed to delete data";
    }
} elseif (isset($_POST["update"])) {
    $id = $_POST["update"];
    $data = [
        'firstname' => $_POST["firstname"],
        'lastname' => $_POST["lastname"],
        'age' => $_POST["age"],
        'regno' => $_POST["regno"],
        'gender' => $_POST["gender"],
        'pname' => $_POST["pname"],
        'contact' => $_POST["contact"],
        'location' => $_POST["location"],
        'aggregates' => $_POST["aggregates"],
        'image' => $_FILES["image"]["name"]
    ];

    // Handling image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $success = updateStudent($id, $data);
    if ($success) {
        echo "Data updated successfully";
    } else {
        echo "Failed to update data";
    }
} else {
    echo "Failed to get data from the form";
}

// Fetching all students
$students = fetchStudents();
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
            <!-- Other input fields -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Table to display student records -->
        <table class="table">
          <thead>
            <tr>
              <th>First Name</th>
              <!-- Other table headers -->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student) : ?>
              <tr>
                <td><?= $student['firstname']; ?></td>
                <!-- Display other student information -->
                <td>
                  <!-- Form to delete student record -->
                  <form action="" method="POST">
                    <input type="hidden" name="delete" value="<?= $student['id']; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
