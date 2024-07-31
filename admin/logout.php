<?php
session_start();
session_unset();
session_destroy(); // Correct function name
header("location: ../website.php"); // Add a semicolon at the end of the statement
exit; // Add exit to prevent further execution
?>