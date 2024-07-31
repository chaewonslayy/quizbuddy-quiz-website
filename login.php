
<?php
    session_start();
    
    include "db.php";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['e_mail'];
        $password= $_POST['p_assword'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "Select * from 2test where e_mail = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['p_assword'] == $password)
                    {
                        $_SESSION['e_mail'] = $user_data['e_mail'];
                        $_SESSION['f_name'] = $user_data['f_name'];
                        $_SESSION['l_name'] = $user_data['l_name'];
                        $_SESSION['g_ender'] = $user_data['g_ender'];
                        $_SESSION['c_address'] = $user_data['c_address'];
                        $_SESSION['a_ddress'] = $user_data['a_ddress'];
                        $_SESSION['p_assword'] = $user_data['p_assword'];
                        $_SESSION['re_pass'] = $user_data['re_pass'];
                        $_SESSION['is_admin'] = $user_data['is_admin'];
                        $cookie_name = "e_mail";
                        $cookie_value = $user_data['e_mail'];
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days expiration

                        // Check if the user is an admin
                        if($user_data['is_admin'] == 1) {
                            header("location: ./admin"); // Redirect to admin page
                        } else {
                            header("location: website.php"); // Redirect to regular user page
                        }
                        exit();
                    }

                }
            }
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <!--
        header
    -->

    <?php include 'header.php'; ?>

    <section class="section-login-regis">
        <div class="border"> 
            <h1 class="welcome">Login</h1>
                <form method="POST">
                    <label>Email</label>
                    <input type="email" name="e_mail" required><br>
                    <label>Password</label >
                    <input type="password" name="p_assword" required>
                    <input type="submit" name="" value="Submit">
                </form>
            <p class="darren">Do not have an account? <a href="regis.php">Sign Up here</a></p>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    
</body>
</html>