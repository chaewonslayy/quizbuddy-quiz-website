<?php 
    include 'db.php';
    echo '<div class="section-latest">';
    echo '<h1 class="quizh1">List of Created Quizzes</h1>';
    echo "<table class='searchingquiz'>";
    echo "<a class='lmao1' href='quizquestions.php'>View Quiz Questions</a>";
    echo "<tr>
            <th>No.</th>
            <th>Quiz Name</th>
            <th>Quiz ID</th>
            <th>Delete Quiz</th>
        </tr>";
    $SQLshowkuiz = "SELECT * from quiz;";
    $run = mysqli_query($con,$SQLshowkuiz);
    $num = 0;
    while($data = mysqli_fetch_array($run))
        {
            $num++;
            $quiz = $data['title'];
            $id = $data['Q_NUM'];
            echo "<tr><td>$num</td>
                      <td>$quiz</td>
                      <td>$id</td>
                      <td><a href='deletequiz.php?quiz=".$quiz."'>Delete</a></td>
                  </tr>";
        }
    echo "</table>";
    echo "</div>";
?>

