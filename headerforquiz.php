<header>
        <a href="#" class="logo1">Quiz<span class="c1">Buddy</span><span class="c3">&copy;</span></a>
        <ul>
            <?php if(isset($_SESSION['f_name'])) {?>
                <li><a href="#" class="fa fa-sign-out">You can't leave until you've finished the quiz.</a></li>
                <div>
                    <li>
                        <a class="username" href="#"><?= $_SESSION['f_name']?></a></li>
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
        header.classList.toggle('sticky', window.scrollY > 100)
    })
</script>