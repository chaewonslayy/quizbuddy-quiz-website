<?php 
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--
        header
    -->
    
    <?php include 'header.php'; ?>

    <section class="section-main">
        <h1>Explore</h1>
        <div class="line-1">
            <a href="randomquiz.php" class="random-quiz-btn"> Random Quiz <br>
                <img class="random-quiz-btn-img" src="Images/1.jpg">
            </a>
        </div>
        <div class="line-1">
            <a href="latestquiz.php" class="random-quiz-btn"> Latest Quiz <br>
                <img class="random-quiz-btn-img" src="Images/3.jpg">
            </a>
        </div>
    </section>
    <section class="section-2">
        <div class="line-1">
            <a href="create_quiz.php" class="random-quiz-btn"> Create & Share <br>
                <img class="random-quiz-btn-img" src="Images/2.jpg">
            </a>
        </div>
        <div class="line-1">
            <a href="yourquiz.php" class="random-quiz-btn"> Your Quiz/zes / Remove Quiz <br>
                <img class="random-quiz-btn-img" src="Images/4.jpg">
            </a>
        </div>
        <h1>Create</h1>
    </section>
    <section class="section-2">
        <h1>Activity</h1>
        <div class="line-1">
            <a href="history.php" class="random-quiz-btn"> Recently Played<br>
                <img class="random-quiz-btn-img" src="Images/5.jpg">
            </a>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
</body>
</html>