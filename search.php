<?php 

session_start();
// Check if the user is not logged in and not accessing login or registration pages
if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Quiz Code</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--
        header
    -->
    
    <?php include 'header.php'; ?>
    <section class="section-search">
        <h1 class="search">Search Quiz Code</h1>
        <form action="quizname.php" method="get">
        <div class="saveeditbuttdiv1">
            <input class="saveeditbutt1" type="number" name="Q_NUM" placeholder="Enter quiz number, example: 1122" required>
            <button class="saveeditbutt2" type="submit">Search</button>
</div>
        </form>

    </section>

</body>
</html>

<?php include 'footer.php'; ?>
