<?php
session_start();
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));

// Retrieve all quizzes from the database
$query = "SELECT *   
FROM quiz
INNER JOIN 2test  
ON quiz.C_EMAIL = 2test.e_mail 
WHERE pb = 1" ;
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lastest Quizzes</title>
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
        echo '<h1 class="quizh1">Latest Quizzes</h1>';
        echo "<table class='searchingquiz'>";
        echo "<tr>
                <th>Quiz Title</th>
                <th>Created by</th>
                <th>Created on</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>
                <td>
                    <a href='quizname.php?Q_NUM=" . $row['Q_NUM'] . "'>" . $row['title'] . "</a>
                </td>
                <td>
                    " . $row['f_name'] . "
                </td>
                <td>
                    " . $row['C_DATETIME'] . "
                </td>
            </tr>";
                    $row['Q_NUM'] . "'>" . $row['title'] . "</a></td></tr>";
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
