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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php include 'header.php'; ?>

    <section class="section-main">
        <h1>View</h1>
        <div class="line-1">
            <a href="users.php" class="button"> Registered Users <br>
                <img class="button-img" src="Images/1.jpg">
            </a>
        </div>
        <div class="line-1">
            <a href="quizzes.php" class="button"> Created Quizzes <br>
                <img class="button-img" src="Images/2.jpg">
            </a>
        </div>
    </section>
    <section class="section-2">
        <h1>Check</h1>
        <div class="line-1">
            <a href="searchuser.php" class="button"> Scores <br>
                <img class="button-img" src="Images/3.jpg">
            </a>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>