  <div class = "logout-div">

      <h4>Log out</h4>

      <?php

        $action_forward = $_SESSION['action_forward'];

        ?>

      <form <?php echo 'action="' . $action_forward . '"' ?> method="POST">
        <p>Are you sure to log out?</p><br><br>
        <input type="hidden" name="action" value="logout"><br><br><br>
        <button type="submit">Log out</button>
        <button class="close">Close</button>
      </form>
  
  </div>