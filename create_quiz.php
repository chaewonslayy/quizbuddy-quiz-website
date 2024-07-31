<?php 
$conn = mysqli_connect("localhost","root","","2test") or die(mysqli_error($conn));
session_start();

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
    <title>Create & Share</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="createquiz">
        <div class="createquizdiv">
            <?php

            if(empty($_SESSION['Q_NUM'])){ 
                $_SESSION['Q_NUM'] = rand(1000, 9999);
                while(true){
                    $check = "SELECT * FROM ITEM WHERE Q_NUM = '".$_SESSION['Q_NUM']."'";
                    $result = $conn->query($check);
                    if($result->num_rows > 0){
                        $_SESSION['Q_NUM'] = rand(1000, 9999);
                    }
                    else{
                        break;
                    }
                }
            }

            echo "<div class = 'code'>";
            echo '<h1> QUIZ code = ';
            echo $_SESSION['Q_NUM'];
            echo "</h1>";
            echo "</div>";
            ?>
            <h2 class="warning"> <span class="red">*</span> Note: Click 'Done' only after you've added all the questions you wanted. The text box should be blank before you click 'Done' to submit!</h2>
            <form action="<?php $_SERVER['PHP_SELF']?>" method = "post">
            <input class="quiztitle" type="text" name="title" placeholder="Title (Keep it short and simple!)" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>">
                <div>
                    <textarea class="textarea1" name="question" placeholder="Enter question here"></textarea>
                </div>
                <div>
                    <textarea class="textarea" name="O1" placeholder="Enter option A (Select only one option.)"></textarea><input class="radio" type="radio" name="answer" value="01">
                    <textarea class="textarea" name="O2" placeholder="Enter option B"></textarea><input class="radio" type="radio" name="answer" value="02">
                    <textarea class="textarea" name="O3" placeholder="Enter option C"></textarea><input class="radio" type="radio" name="answer" value="03">
                    <textarea class="textarea" name="O4" placeholder="Enter option D"></textarea><input class="radio" type="radio" name="answer" value="04">
                </div>
                <input class="cancel" type="submit" value="Add question" name='submit'>
                <input class="cancel" type="submit" value="Done" name='Done'>
                <input class="cancel" type="submit" value="Cancel" name= 'cancel'>
                <div class="openforpublicdiv">
                    <label class="openforpublic" for="public">Open to public</label>
                    <input class="openforpublic" type="checkbox" name="public" <?php echo isset($_POST['public']) ? 'checked' : ''; ?>>
                    <br>
                </div>
                <center>
                <h2 class="warning"> <span class="red">*</span> This checkbox is for users who want to open their quiz to the public. You can find your code by navigating to the "Your Quizzes/Remove Quiz" section from the main page. Users can still play your quizzes by searching for your code in the search section.</h2>
                </center>
            </form>
        </div>
    </section>
</body>
</html>
<?php

if (isset($_POST['cancel'])) {
    $sql = "DELETE FROM item WHERE Q_NUM = '{$_SESSION['Q_NUM']}'";
    mysqli_query($conn, $sql);
    unset($_SESSION['Q_NUM']);
    header("Location: website.php");
    exit();
}

if(isset($_POST['submit'])){
    if(!empty($_POST['question']) && !empty($_POST['O1']) && !empty($_POST['O2']) && !empty($_POST['O3']) && !empty($_POST['O4']) && !empty($_POST['answer'])){
        $q = $_POST['question'];
        $op1 = $_POST['O1'];
        $op2 = $_POST['O2'];
        $op3 = $_POST['O3'];
        $op4 = $_POST['O4'];
        $ans = $_POST['answer'];
        $sql = "INSERT INTO item (Q_NUM, ques, opt1, opt2, opt3, opt4, A) VALUES ('{$_SESSION['Q_NUM']}', '$q', '$op1', '$op2', '$op3', '$op4', '$ans')";
        mysqli_query($conn, $sql);
        echo "<h1 class='qadded'>Question added</h1>";
    }
    else{
        echo "Please fill all the fields";
    }
}
if(isset($_POST['Done'])){
    if(isset($_POST['public'])){
        $public = 1;
    }
    else{
        $public = 0;
    }
    $t = $_POST['title'];
    $email = $_SESSION['e_mail'];
    $total = "SELECT * FROM item WHERE Q_NUM = '{$_SESSION['Q_NUM']}'";
    $result = $conn->query($total);
    $num = $result->num_rows;
    $sql = "INSERT INTO quiz (pb, title, Q_NUM, C_EMAIL, NUM_OF_QUES) VALUES ('$public', '$t','{$_SESSION['Q_NUM']}', '$email', '$num')";
    mysqli_query($conn, $sql);
    $_SESSION['Q_tk'] = $_SESSION['Q_NUM'];
    unset($_SESSION['Q_NUM']);
    header("Location: Create_suc.php");
    exit();
}
$sql = "SELECT ques from item WHERE Q_NUM = '{$_SESSION['Q_NUM']}'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $i=1;
    while($row = $result->fetch_assoc()){
        echo "<h1 class='qadded2'>" . "{$i}." . $row['ques'];
        echo "</h1>";
        $i++;
    }
}
?>

<?php include 'footer.php'; ?>