<?php 
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));
session_start();
$sql = "DELETE FROM quiz WHERE Q_NUM = " .$_GET['Q_NUM'];
mysqli_query($conn, $sql);
$sql = "DELETE FROM item WHERE Q_NUM = " .$_GET['Q_NUM'];
mysqli_query($conn, $sql);

// Check if the user is not logged in and not accessing login or registration pages
if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

?>
<!--
    header
-->

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>random quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section-about">
        <h3>Quiz deleted successfully!</h3>
        <a href="yourquiz.php">Back to home</a>
    </section>
    
</body>
</html>

<?php include 'footer.php'; ?>
