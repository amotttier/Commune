<?php
  session_start();
  $_SESSION['isConnected'] = false;
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <?php include('configuration/head_call.php'); ?>
  <body>
    <div class="container">
      <form action="login_post.php"  class="form-horizontal" role="form" method="post">
        <div class="form-group" id="username">
          <label class="col-sm-2 control-label">Username:</label>
          <input id="input_username" type="text" name="username">
        </div>
        <div class="form-group" id="password">
          <label class="col-sm-2 control-label">Password:</label>
          <input type="password" name="password">
        </div>
        <div class="clear"></div>
        <div id="submit col-md-10 col-md-push-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </body>
</html>
