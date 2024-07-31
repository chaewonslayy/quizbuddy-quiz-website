<?php 
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));
session_start();
$sql = "SELECT * FROM quiz WHERE Q_NUM = " .$_GET['Q_NUM'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $pb = $row['pb'];
        $q_num = $row['Q_NUM'];
        $c_email = $row['C_EMAIL'];
        $num_of_ques = $row['NUM_OF_QUES'];
        $c_datetime = $row['C_DATETIME'];

        $creator = "SELECT * FROM 2test WHERE e_mail = '$c_email'";
        $creator_result = mysqli_query($conn, $creator);
        $creator_row = mysqli_fetch_assoc($creator_result);
        $creator_name = $creator_row['f_name'] . " " . $creator_row['l_name'];

    } else {
        echo "No records found";
    }
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
        <h3>Are you sure you want to delete quiz below? (This action can't be undo)</h3>
        Title: <?php echo $title; ?><br>
        Number of questions: <?php echo $num_of_ques; ?><br>
        Created on: <?php echo $c_datetime; ?><br>
        <a href="deleted.php?Q_NUM=<?php echo $q_num; ?>">Delete</a><br>
        <a href="yourquiz.php">Back</a>
    </section>
    
</body>
</html>

<?php include 'footer.php'; ?>
