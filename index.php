<?php
session_start();
$_SESSION['isConnected'] = false;
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="resources/css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/admin.css">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="body_container">
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
