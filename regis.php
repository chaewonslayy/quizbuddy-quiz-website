<?php
session_start();

include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = $_POST['e_mail'];
    $firstname = $_POST['f_name'];
    $lastname = $_POST['l_name'];
    $Gender = $_POST['g_ender'];
    $num = $_POST['c_address'];
    $address = $_POST['a_ddress'];
    $password= $_POST['p_assword'];
    $repassword= $_POST['re_pass'];

    // Validate email format
    if(!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'> alert('Please enter a valid email address')</script>";
    } else {
        // Check if email already exists in the database
        $check_query = "SELECT * FROM 2test WHERE e_mail='$gmail'";
        $check_result = mysqli_query($con, $check_query);
        if(mysqli_num_rows($check_result) > 0) {
            echo "<script type='text/javascript'> alert('Email already exists. Please choose a different email')</script>";
        } else {
            // Insert the data into the database
            $query = "INSERT INTO 2test (e_mail, f_name, l_name, g_ender, c_address, a_ddress, p_assword, re_pass) VALUES ('$gmail', '$firstname','$lastname','$Gender','$num','$address','$password','$repassword')";
            mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Successfully registered'); window.location.href = 'login.php'; </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <!--
        header
    -->

    <?php include 'header.php'; ?>
    <section class="section-login-regis">
        <div class="border">
            <h1 class="welcome">Sign Up</h1>
                <h4>It's free and only takes a minute</h4>
                    <form method="post" onsubmit="return validatePassword()">
                        <label>Email</label >
                        <input type="email" name="e_mail" required><br>
                        <label>First Name</label>
                        <input type="text" name="f_name" required><br>
                        <label>Last Name</label>
                        <input type="text" name="l_name" required><br>
                        <label>Gender</label>
                        <select class="selectgender2" name="g_ender" required>
                            <option selected value="">Your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select><br>
                        <label>Contact Address (Phone Number)</label >
                        <input type="tel" name="c_address" required><br>
                        <label>Address</label >
                        <input type="text" name="a_ddress" required><br>
                        <label>Password</label >
                        <input type="password" id="password" name="p_assword" required><br>
                        <label>Re-enter Password</label>
                        <input type="password" id="re_pass" name="re_pass" required><br>
                        <span id="passwordError" style="color: red;"></span> <!-- Error message span -->
                        <input type="submit" name="" value="Submit"><br>
                    </form>
                <p class="darren">By clicking the Sign UP button, you agree to our<br>
                <a href="t&c.php">Terms and Conditions</a> and <a href="p&p.php">Policy Privacy</a>
                </p>
            <p class="darren"> Already have an account ? <a href="login.php">Login Here</a></p>
        </div>
    </section>

    <script>
        // Function to validate password match
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("re_pass").value;
            var errorSpan = document.getElementById("passwordError");

            if (password !== confirmPassword) {
                errorSpan.innerText = "Passwords do not match";
                return false;
            } else {
                errorSpan.innerText = "";
                return true;
            }
        }
    </script>

    <?php include 'footer.php'; ?>

</body>
</html>    
