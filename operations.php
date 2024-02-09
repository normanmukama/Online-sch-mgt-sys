<?php
session_start();
include('dbcon.php');

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    // Get the value of the 'id' parameter and sanitize it
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Perform the deletion
    $delete = mysqli_query($conn, "DELETE FROM student_info WHERE id = '$id'");
    if ($delete) {
        // Redirect back to the previous page or show a success message
        $_SESSION['message'] = "Student deleted successfully";
        header('Location: students.php');
        // exit();
    } else {
        $_SESSION['message'] = "Failed to delete the student";
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // 'id' parameter not set, handle the situation accordingly
    echo "ID parameter not provided.";
}

?>
