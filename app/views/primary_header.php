<header class='container'>
	<h1>Welcome, honey!</h1>
    
    <?php 

        $url_string = $_SERVER['SCRIPT_FILENAME'];
        $substring = 'inline_item';
        
        if ( strstr($url_string, $substring) !== 'inline_item.php') { 
    ?>
        
        <?php if ( !isset($_SESSION['user_id']) ) { ?>

            <div class="visitor">
                <a href="" class="register">Register</a>&nbsp&nbsp&nbsp
                <a href="" class="login">Log In</a>
            </div>

        <?php } else { ?>
        
            <div class="login-user">
                <?php echo 'Hi, ' . $_SESSION['user_name'] . '! ' ?>
                <a href="" class="logout">Log Out</a>
            </div>

        <?php } ?>
    <?php } else { ?>
        <?php if ( isset($_SESSION['user_id']) ) { ?>

            <div class="login-user">
                <?php echo 'Hi, ' . $_SESSION['user_name'] . '! ' ?>
                <a href="" class="logout">Log Out</a>
            </div>
            
        <?php } ?>
    <?php } ?>

</header>
<hr>