<?php
session_start();
?>
<html lang="en-US">
  <?php include('../../configuration/user_head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
    <form action="user_edit_password_post.php" method="post" role="form" onsubmit="return verif()">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="old_pwd">
        <input type="password" name="old_pwd" class="mdl-textfield__input">
        <label class="mdl-textfield__label" for="old_pwd">Ancien mot de passe</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="new_pwd">
        <input type="password" name="new_pwd" class="mdl-textfield__input" id="_new_pwd">
        <label class="mdl-textfield__label" for="new_pwd">Nouveau mot de passe</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="con_new_pwd">
        <input type="password" name="con_new_pwd" class="mdl-textfield__input" id="_con_new_pwd">
        <label class="mdl-textfield__label" for="con_new_pwd">Confirmation du nouveau mot de passe</label>
      </div>
      <br />
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
    </form>
  </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  <script>
  function verif() {
    var new_pwd = document.getElementById("_new_pwd").value;
    var con_new_pwd = document.getElementById("_con_new_pwd").value;
    var ok = true;
    if (new_pwd != con_new_pwd) {
        //alert("Passwords Do not match");
        document.getElementById("_new_pwd").style.borderColor = "#E34234";
        document.getElementById("_con_new_pwd").style.borderColor = "#E34234";
        ok = false;
    }
    return ok;
  }
</script>
</body>
</html>
