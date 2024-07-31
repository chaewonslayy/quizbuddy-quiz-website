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
    <title>Search User Score - QuizBuddy Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse;
        }
        th, td {
            text-align: center;
            border: 1px solid white;
            padding: 10px;
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

        <section class="section-latest">
            <?php 
            if(isset($_POST['searchuser'])){
                include 'showuserscore.php';
            }else{
                include 'searchuserform.php';
            }
                ?>
        </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>