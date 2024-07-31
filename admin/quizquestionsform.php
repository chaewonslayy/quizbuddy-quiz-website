<h3>Choose Quiz</h3>
<form action="" method="POST">
    <label>Quiz ID:</label><br>
    <select name="quiz">
        <?php 
        include 'db.php';
        $SQLquiz = "SELECT * from quiz ;";
        $run = mysqli_query($con,$SQLquiz);
        while($data = mysqli_fetch_array($run))
            {
        ?>
        <option value="<?php echo $data['Q_NUM']; ?>">
        <?php echo $data['Q_NUM']; }; ?></option>
    </select><br><br>
    <button type="submit" name="choosequiz">
    SHOW QUESTIONS</button>
</form>