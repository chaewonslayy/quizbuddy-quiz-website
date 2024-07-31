<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feature</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--
        header
    -->
    
    <?php include 'header.php'; ?>

    <section class="section-about">
        <h1>Feature</h1>
        <div class="line-1">
            <p class="para"> At QuizBuddy, we offer a range of exciting features designed to enhance your quiz-taking experience and foster a vibrant community of learners and creators. Here's what you can expect:</p>
            <h2 class="lmao"> Create & Share</h2>
            <p class="para"> To create a quiz, you have to click the "Create & Share" UI from the main page. After that, you can start creating questions. Please note that there can only be one correct answer/option. To do that, you will have to click a small checkbox under an option. Then, only click "Done/Share" after you have added all the questions you want. For the "Open to Public" checkbox, it is to hide your quiz from the "Random Quiz" and "Latest Quiz" pages. Other users will need to have or know your quiz code to be able to do your quiz.</p>

            <h2 class="lmao"> Your Quiz/zes / Remove Quiz</h2>
            <p class="para"> For this part, you can find all your created quizzes, including its code, created date, and more! Go check it out.</p>

            <h2 class="lmao"> Explore</h2>
            <p class="para"> For the "Explore" section, you can find two UI named "Random Quiz" and "Latest Quiz". For "Random Quiz", it will randomly select a quiz for you to play (all the quizzes in here are made public by the creator). For "Latest Quiz", you can find all the newest quizzes made by other users. Just choose and play!</p>

            <h2 class="lmao"> Activity</h2>
            <p class="para"> Keep track of your quiz-taking journey with our "Play History" feature. Easily access a record of quizzes you've played in the past, allowing you to revisit your favorite quizzes or track your progress over time. Whether you're aiming for mastery in a particular subject or simply looking to reminisce about past quiz experiences, your play history provides valuable insights into your quiz-taking habits.</p>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>