<?php 
    include 'db.php';
    $quiz=$_GET['quiz'];
    $SQLdelete = "DELETE FROM quiz WHERE title='$quiz';";
    $run = mysqli_query($con,$SQLdelete);
    if ($run) {
        echo "Quiz deletion successful!";
    } else {
        echo "Quiz deletion failed.";
    }
?>