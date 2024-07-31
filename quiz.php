<?php
session_start();
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "2test") or die(mysqli_error($conn));

// Retrieve the question number from the session or the GET parameters
$Q_NUM = isset($_GET['Q_NUM']) ? $_GET['Q_NUM'] : (isset($_SESSION['Q_NUM']) ? $_SESSION['Q_NUM'] : null);

// Store the current question number in the session
$_SESSION['Q_NUM'] = $Q_NUM;

// Retrieve questions from the database
$query = "SELECT * FROM item WHERE Q_NUM = $Q_NUM";
$result = mysqli_query($conn, $query);

// Check if there are questions in the database
if(mysqli_num_rows($result) > 0) {
    // Start a session to keep track of the user's answers

    // Check if the current question index is set in the session
    if(!isset($_SESSION['current_question'])) {
        $_SESSION['current_question'] = 0; // Initialize current question index
    }

    // Initialize score
    if(!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    // Check if the form is submitted
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Get the user's selected answer
        $selected_option = $_POST['option'];

        // Move the result pointer to the current question
        mysqli_data_seek($result, $_SESSION['current_question']);

        // Get the correct answer for the current question from the database
        $row = mysqli_fetch_assoc($result);
        $correct_answer = $row['A'];

        // Check if the selected answer is correct
        if($selected_option == $correct_answer){
            // Increment the user's score
            $_SESSION['score']++;
        }
        // Move to the next question
        $_SESSION['current_question']++;
    }

    // Check if there are more questions to display
    if($_SESSION['current_question'] < mysqli_num_rows($result)){
        // Move the result pointer to the current question
        mysqli_data_seek($result, $_SESSION['current_question']);
        // Fetch the current question data
        $row = mysqli_fetch_assoc($result);
        // Display the question and options
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Quiz Start</title>
            <link rel="stylesheet" href="style.css">
            <script>
                var warningShown = false;

                // Add event listener to warn the user when they try to navigate back
                window.addEventListener('popstate', function(event) {
                    if (!warningShown) {
                        alert("You cannot navigate back during the quiz. Please complete the quiz.");
                        history.pushState(null, null, location.href);
                        warningShown = true;
                    }
                });
            </script>
        </head>
        <body>
                <!--
                    header
                -->

    <?php include 'headerforquiz.php'; ?>
            <section class="section-quiz">
            <h1>Quiz</h1>
            <form class="quiz" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p><?php echo "Quetion: " . $row ['Ques']; ?></p>
                <input type="hidden" name="Q_NUM" value="<?php echo $Q_NUM; ?>">
                <input type="radio" name="option" value="1"><?php echo $row['OPT1']; ?><br>
                <input type="radio" name="option" value="2"><?php echo $row['OPT2']; ?><br>
                <input type="radio" name="option" value="3"><?php echo $row['OPT3']; ?><br>
                <input type="radio" name="option" value="4" required><?php echo $row['OPT4']; ?><br>
                <div class="saveeditbuttdiv">
                <input class="saveeditbutt" type="submit" value="Next Question">
                </div>
            </form>
            </section>
        </body>
        </html>

        <?php include 'footer.php'; ?>
        
        <?php
    } else {
        // Display the final score when all questions are answered
        include 'headerforquiz.php';
        echo '<div class="quiz-completed-container">';
        echo '<section class="section-quizcompleted">';
        echo "<h1>Quiz Completed!</h1>";
        echo "<p>Your Score: ".$_SESSION['score']."</p>";
        //upload the score to the database
        $query = "INSERT INTO RESULT (Q_NUM, E_EMAIL, RESULT) VALUES ('".$_SESSION['Q_NUM']."', '".$_SESSION['e_mail']."', '".$_SESSION['score']."')";
        mysqli_query($conn, $query);
        // Clear session variables
        unset($_SESSION['current_question']);
        unset($_SESSION['score']);
        unset($_SESSION['Q_NUM']);
        
        // Add a button to go back to the home page
        echo '<div class="saveeditbuttdiv">
            <a href="website.php"><button class="saveeditbutt">Back to Home Page</button></a>
            </div>';

        echo '</section>'; // Closing section tag
        echo '</div>';
        // include the footer lmaoo
        echo file_get_contents('footer.php');
    }
} else {
    echo "No questions found in the database.";
}

// Close the database connection
mysqli_close($conn);

// Add the link to the stylesheet
echo '<link href="style.css" rel="stylesheet"></link>';
?>
