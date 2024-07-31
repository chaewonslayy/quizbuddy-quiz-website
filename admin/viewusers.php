<?php include 'header.php'; ?>
<?php 
    include 'db.php';
    echo '<div class="section-latest">';
    echo "<h1 class='quizh1'>List of Registered Users</h1>";
    echo "<table class='searchingquiz'>";
    echo "<tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
        </tr>";
    $SQLshow="SELECT * from 2test";
    $run=mysqli_query($con,$SQLshow);
    while($data=mysqli_fetch_array($run))
        {
            echo "<tr><td>".$data['e_mail']."</td>
                    <td>".$data['f_name']."</td>
                    <td>".$data['l_name']."</td>
                    <td>".$data['g_ender']."</td>
                    <td>".$data['c_address']."</td>
                <tr>";
        }
    echo "</table>";
    echo "</div>";
    
?>