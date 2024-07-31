<?php 
$conn = mysqli_connect("localhost","root","","2test") or die(mysqli_error($conn));
session_start();

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
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>Create & Share</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section-about">
        <h2>Quiz created successfully!</h2>
        <h3>Share your quiz with the code:</h3>
        <h3><?php echo $_SESSION['Q_tk']; ?></h3>
        <a href="website.php">Back to home</a>
    </section>

<?php include 'footer.php'; ?>
</body>


</html>

