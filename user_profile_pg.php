<?php 
session_start();

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
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!--
        header
    -->
    <?php include 'header.php'; ?>

    <section class="section-profile">
        <div class="line-2">
            <div class="line-1">
            <h1 class="welcome">My Account Details</h1>
                <table class="usersinfotable">
                    <tr><th>Email</th><td><?= $_SESSION['e_mail']?></td></tr>
                    <tr class="fnandln"><th>First name</th><td><?= $_SESSION['f_name']?></td></tr>
                    <tr class="fnandln"><th>Last name</th><td><?= $_SESSION['l_name']?></td></tr>
                    <tr><th>Gender</th><td><?= $_SESSION['g_ender']?></td></tr>
                    <tr><th>Contact Address (Phone Number)</th><td><?= $_SESSION['c_address']?></td></tr>
                    <tr><th>Address</th><td><?= $_SESSION['a_ddress']?></td></tr>
                </table>
            </div>
            <a class='saveeditbuttdiv' href="editprofile.php">Edit</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>