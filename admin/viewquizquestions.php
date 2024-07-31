<?php 
    include 'db.php';
    $quiz = $_POST['quiz'];
    echo '<div class="section-latest">';
    echo "<table class='searchingquiz'>
            <tr>
                <th>Question No.</th>
                <th>Question</th>
                <th>Quiz ID</th>
            </tr>";
    $SQLshowquizquestions = "SELECT * from item where Q_NUM='$quiz' ;";
    $run = mysqli_query($con,$SQLshowquizquestions);
    while($data = mysqli_fetch_array($run))
        {
            $num = $data['U_NUM'];
            $question = $data['Ques'];
            $quizid = $data['Q_NUM'];
            echo "<tr><td>$num</td>
                      <td>$question</td>
                      <td>$quizid</td>
                  </tr>";
        }
    echo "</table>";
    echo '</div>';
?>