<?php 
session_start();

if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));

// Retrieve all quizzes from the database
$query = "SELECT * from quiz WHERE C_EMAIL = '{$_SESSION['e_mail']}'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Created Quizzes</title>
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
        echo '<h1 class="quizh1">Your Quiz(zes)</h1>';
        echo "<table class='searchingquiz'>";
        echo "<tr>
                <th>Quiz Title</th>
                <th>Quiz Code</th>
                <th>Created on</th>
                <th>Delete quiz</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row['title'] . "</a>
            </td>
            <td>
                    " . $row['Q_NUM'] . "
            </td>
            <td>
                    " . $row['C_DATETIME'] . "
            </td>
            <td>
            <a href='delete.php?Q_NUM=" . $row['Q_NUM'] . "'>Delete</a>
            </td>
            
            </tr>";
        }
        echo "</table>";
        echo '</div>';
    } else {
        echo '<div class="section-latest">';
        echo "<p style='text-align: center;'>No quiz found.</p>";
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

