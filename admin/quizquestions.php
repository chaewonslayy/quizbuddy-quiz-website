<?php 
session_start();

// Check if the user is not logged in and not accessing login or registration pages
if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>View Quiz Questions - QuizBuddy Admin</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php include 'header.php'; ?>
    
    <section class="section-latest">
                
        <h1 class="lmao">List of Questions for Specific Quiz</h1>
        <?php 
            if(isset($_POST['choosequiz'])){
                include 'viewquizquestions.php';
            }else{
                include 'quizquestionsform.php';
            } ?>
                
    </section>
    
    <?php include 'footer.php'; ?>

</body>
</html>