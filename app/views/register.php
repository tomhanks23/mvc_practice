
    <div class="register-div">
        <h3>Register</h3>
        
        <?php

        $url_string = $_SERVER['SCRIPT_FILENAME'];

        if ( strstr($url_string, $substring) == 'index.php' ) {
          $action_forward = 'index.php';
        } else {
          $action_forward = 'detail_page.php'; 
        }

        ?>

        <form class="reptile-form" <?php echo 'action="' . $action_forward . '"' ?> method="POST">

          <input type="text" name="userName" title="User Name" placeholder="User Name" required><br>
          <input type="text" name="email" title="E-mail" placeholder="E-mail" required><br>
          <input type="password" name="password" title="Password" placeholder="Password" required><br>
          <input type="password" name="password2" title="Comfirm Password" placeholder="Re-enter Password" required><br><br>

          <button type="submit">Submit</button>
          <button class="close">Close</button>

        </form>
    </div>  