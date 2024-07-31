<?php 
session_start();
include 'header.php'; 

$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));

$sql = "SELECT * FROM quiz WHERE pb = 1 ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);

// Initialize variables with default values
$title = "";
$num_of_ques = "";
$creator_name = "";
$c_datetime = "";
$q_num = "";

// Check if the user is not logged in and not accessing login or registration pages
if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section-about">
        <?php if (empty($q_num)) { ?>
        <h3>There is no quiz available.</h3>
        <?php } ?>

        <?php if (!empty($q_num)) { ?>
        <h3>Here is your surprise Quiz!</h3>
        <h3>Title: <?php echo $title; ?></h3>
        <h3>Number of questions: <?php echo $num_of_ques; ?></h3>
        <h3>Created by: <?php echo $creator_name; ?></h3>
        <h3>Created on: <?php echo $c_datetime; ?></h3>
            <a href="quiz.php?Q_NUM=<?php echo $q_num; ?>">Start quiz</a><br>
        <?php } ?>
        <a href="website.php">Back to home</a>
    </section>
</body>
</html>

<?php include 'footer.php'; ?>