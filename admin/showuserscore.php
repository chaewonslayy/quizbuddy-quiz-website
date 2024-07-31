<?php
    include 'db.php';
    echo '<div class="section-latest">';
    echo "<h1 class='lmao'>Find User</h1>";
    echo "<h1 class='lmao'>User Score Results</h1>";
    echo "<table class='searchingquiz'>";

    $user = $_POST['email'];
        echo "<tr>
                <th>E-Mail</th>
                <th>User First Name</th>
                <th>User Last Name</th>
                <th>Quiz ID</th>
                <th>Date of Participation</th>
                <th>Score</th>
            </tr>";
    $SQLsearch="SELECT * from 2test inner join result 
    on 2test.e_mail=result.E_EMAIL where 2test.e_mail='$user'; ";
    $run=mysqli_query($con,$SQLsearch);
    while($data=mysqli_fetch_array($run))
        {
            echo "<tr><td>".$data['e_mail']."</td>
                      <td>".$data['f_name']."</td>
                      <td>".$data['l_name']."</td>
                      <td>".$data['Q_NUM']."</td>
                      <td>".$data['DATETIME']."</td>
                      <td>".$data['RESULT']."</td>
                  </tr>";
        }
        echo "<a clas='lmao1' href='searchuser.php'>Find Another User</a>";      
    echo "</table>";
    echo "</div>";
?>