
    <div class="register-div">
        <h3>Register</h3>
        
        <?php

        $action_forward = $_SESSION['action_forward'];

        ?>

        <form class="reptile-form" <?php echo 'action="' . $action_forward . '"' ?> method="POST">

          <input type="text" name="userName" title="User Name" placeholder="User Name" required><br>
          <input type="text" name="email" title="E-mail" placeholder="E-mail" required><br>
          <input type="password" name="password" title="Password" placeholder="Password" required><br>
          <input type="password" name="password2" title="Comfirm Password" placeholder="Re-enter Password" required><br><br>
          <input type="hidden" name="action" value="register">

          <button type="submit">Submit</button>
          <button class="close">Close</button>

        </form>
    </div>  