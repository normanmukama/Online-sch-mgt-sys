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
</head>
<body>
    <div class="">
      <div class="row">
        <div class="col-md-2">
           <!-- sidebar -->
          <?php include('sidebar.php'); ?>
        </div>
        <div class="col-md-10" style="margin-left: -1.85rem;">
          <!-- navbar -->
          <?php include('navbar.php'); ?>
        
        <h2 class="mt-4">Dashboard</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Total Students</h5>
                <p class="card-text">500</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Total Teachers</h5>
                <p class="card-text">50</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Total Courses</h5>
                <p class="card-text">20</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Recent Events</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Upcoming Exams</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Announcements</h5>
                <p class="card-text">There are no announcements at the moment.</p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
