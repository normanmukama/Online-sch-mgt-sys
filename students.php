<?php 
include('dbcon.php');
session_start();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<body>
    <div class="">
        <?php
        if(isset($_SESSION['message']))
        {
            $_SESSION['message'];

            //unset session
            unset($_SESSION['message']);
        }
        ?>
        <div class="row ">
            <div class="col-md-2">
                <!-- Sidebar -->
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col-md-10" style="margin-left: -1.85rem;">
                <!-- Navbar -->
                <?php include('navbar.php'); ?>
                <div class="mt-1">
                    <?php
                    $stmt = mysqli_query($conn, "SELECT * FROM student_info");
                    if (mysqli_num_rows($stmt)) {
                    ?>
             
                    <p type="button" class="float-center btn text-light justify-content-right" data-toggle="modal" data-target="#exampleModal" style="background-color: #0f172a; ">
                    Add student
                    </p>
                        <table id="studentTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="" style="background-color: whitesmoke;">
                                <tr>
                                    <th>Firstname</th>
                                    <th>Last name</th>
                                    <th>Age</th>
                                    <th>Registration no</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Profile image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($stmt)) {
                                ?>
                                    <tr>
                                        <td><?= $row['firstname'] ?></td>
                                        <td><?= $row['lastname'] ?></td>
                                        <td><?= $row['age'] ?></td>
                                        <td><?= $row['regno'] ?></td>
                                        <td><?= $row['gender'] ?></td>
                                        <td><?= $row['contact'] ?></td>
                                        <td><img src="uploads/<?= $row['profile_image'] ?>" alt="Profile Image" style="width: 40px;"></td>
                                        <td>
                                            <a href="#" class="btn text-light" style="background-color: #0f172a;"><i class="fas fa-eye"></i></a>
                                            <a href="operations.php?id=<?= $row["id"] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="operations.php?id=<?= $row["id"]; ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    //modal
    <!-- Button trigger modal -->

     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form action="student.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-container">
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
                            <div class="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable();
        });
    </script>
</body>

</html>