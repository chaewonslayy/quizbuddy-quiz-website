<?php

session_start();

// Check if the user is not logged in and not accessing login or registration pages
if (!isset($_SESSION['e_mail']) && !in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'regis.php'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

include "db.php"; // Assuming this file contains your database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session
    $gmail = $_SESSION['e_mail'];

    // Retrieve form data
    $firstname = $_POST['f_name'];
    $lastname = $_POST['l_name'];
    $gender = $_POST['g_ender'];
    $num = $_POST['c_address'];
    $address = $_POST['a_ddress'];
    $password= $_POST['p_assword'];
    $repassword= $_POST['re_pass'];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "2test");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the update statement
    $sql = "UPDATE 2test SET e_mail=?, f_name=?, l_name=?, g_ender=?, c_address=?, a_ddress=?, p_assword=?, re_pass=? WHERE e_mail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $gmail, $firstname, $lastname, $gender, $num, $address, $password, $repassword, $gmail); // Add $gmail as the last bind parameter
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Update session variables with new values
        $_SESSION['f_name'] = $firstname;
        $_SESSION['l_name'] = $lastname;
        $_SESSION['g_ender'] = $gender;
        $_SESSION['c_address'] = $num;
        $_SESSION['a_ddress'] = $address;
        $_SESSION['e_mail'] = $gmail;
        $_SESSION['p_assword'] = $password;
        $_SESSION['re_pass'] = $repassword;

        echo "Profile updated successfully!";
        // Optionally, you can redirect the user to their profile page after updating
        header("Location: user_profile_pg.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!--
        header
    -->
    
    <?php include 'header.php'; ?>

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

    <section class="section-profile">
        <div class="line-2">
            <div class="line-1">
            <h1 class="welcome">Edit your profile details</h1>
            <form id="editProfileForm" method="post" action="editprofile.php" onsubmit="return validatePassword()">
                <table class="usersinfotable">
                    <tr>
                        <th>Email</th>
                        <td>
                            <?= $_SESSION['e_mail'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>First name</th>
                        <td>
                            <input class="userseditinput" type="text" name="f_name" value="<?= $_SESSION['f_name'] ?>" placeholder="Enter your first name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Last name</th>
                        <td>
                            <input class="userseditinput" type="text" name="l_name" value="<?= $_SESSION['l_name'] ?>" placeholder="Enter your last name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <select class="selectgender" name="g_ender" required>
                                <option value="" disabled>Select your gender</option>
                                <?php
                                $genders = ['Male', 'Female', 'Other'];
                                foreach ($genders as $Gender) {
                                    if ($_SESSION['g_ender'] === $Gender) {
                                        echo '<option selected value="' . $Gender . '">' . $Gender . '</option>';
                                    } else {
                                        echo '<option value="' . $Gender . '">' . $Gender . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Contact Address (Phone Number)</th>
                        <td>
                            <input class="userseditinput" type="tel" name="c_address" value="<?= $_SESSION['c_address'] ?>" placeholder="Enter your contact address" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <input class="userseditinput" type="text" name="a_ddress" value="<?= $_SESSION['a_ddress'] ?>" placeholder="Enter your address" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <input class="userseditinput" type="password" id="password" name="p_assword" value="<?= $_SESSION['p_assword'] ?>" placeholder="Enter your new password" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Re-enter Password</th>
                        <td>
                            <input class="userseditinput" type="password" id="re_pass" name="re_pass" value="<?= $_SESSION['re_pass'] ?>" placeholder="Re-enter your new password" required>
                            <span id="passwordError" style="color: red;"></span> <!-- Error message span -->
                        </td>
                    </tr>
                </table>
                <div class="saveeditbuttdiv">
                <input class="saveeditbutt" type="submit" value="Save">
                </div>
            </form> 
            </div>
            <a class='saveeditbuttdiv' href="user_profile_pg.php">Cancel</a> 
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>
