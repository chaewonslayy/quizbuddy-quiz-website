<?php 
session_start();

if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));

// Retrieve all information from the database
$query = "SELECT * FROM result INNER JOIN quiz ON result.Q_NUM = quiz.Q_NUM WHERE C_EMAIL = '{$_SESSION['e_mail']}'
ORDER BY C_DATETIME DESC" ;
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Played history</title>
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

    <!--
        header
    -->
    <?php include 'header.php'; ?>
    <?php
    // Check if there are quizzes in the database
    if(mysqli_num_rows($result) > 0) {
        // Display quizzes in a centered table
        echo '<div class="section-latest">';
        echo '<h1 class="quizh1">Played history</h1>';
        echo "<table class='searchingquiz'>";
        echo "<tr>
                <th>debug</th>
                <th>Date and Time</th>
                <th>Quiz Title</th>
                <th>Quiz number</th>
                <th>Result</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td> " . $_SESSION['e_mail'] . "</td>`
            <td> " . $row['C_DATETIME'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['Q_NUM'] . "</td>
            <td>" . $row['RESULT'] . '/' . $row['NUM_OF_QUES'] . "</td>
            
            </tr>";
        }
        echo "</table>";
        echo '</div>';
    } else {
        echo '<div class="section-latest">';
        echo "<p style='text-align: center;'>No result found.</p>";
        echo '</div>';
    }
    ?>

</body>
</html>

<?php include 'footer.php'; ?>

<?php
// Close the database connection
mysqli_close($conn);
?>