<header>
    <a href="index.php" class="logo1">Quiz<span class="c1">Buddy</span><span class="c3">&copy;</span><span class="c2"> Admin</span></a>
    <ul>
        <li>
            <a href="../website.php">Normal Page</a>
        </li>
        <?php if(isset($_SESSION['f_name'])) {?>
            <li><a href="logout.php" class="fa fa-sign-out">Logout</a></li>
            <div>
                <li>
                    <a class="username" href="../user_profile_pg.php"><?= $_SESSION['f_name']?></a></li>
                </li>
            </div>    
        <?php } else {?>
            <li><a href="login.php">Login</a></li>
        <?php }?>
    </ul>
</header>

<script type="text/javascript">
    window.addEventListener('scroll', function(){
        var header = document.querySelector('header');
        header.classList.toggle('sticky', window.scrollY > 80)
    })
</script>