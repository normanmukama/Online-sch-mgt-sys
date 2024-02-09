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
                    <h4>session</h4>
                    <?php
        if(isset($_SESSION['message']))
        { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert</strong> <?php echo  $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
       <?php
            //unset session
            unset($_SESSION['message']);
        }
        ?>
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