<?php
session_start();
include('../../configuration/connect_db.php');


$query=$bdd->prepare('SELECT *
FROM users WHERE username = :username');
$query->bindValue(':username',$_SESSION['user_username'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();
?>
<html lang="en-US">
<style>
  .demo-list-control {
    width: 300px;
    margin: auto;
  }

  .demo-list-radio {
    display: inline;
  }
  .mdl-list__item .mdl-list__item-primary-content {
    color: rgba(0, 0, 0, 0.26);
  }
</style>
  <?php include('../../configuration/user_head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
    <div class="notification-shape shape-box" id="notification-shape" data-path-to="m 0,0 500,0 0,500 -500,0 z">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 500 500" preserveAspectRatio="none">
				<path d="m 0,0 500,0 0,500 0,-500 z"/>
			</svg>
		</div>
    <form>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="username">
        <input type="text" name="username" class="mdl-textfield__input" value="<?php echo $data['username']; ?>" disabled>
        <label class="mdl-textfield__label" for="input_username">Nom du compte</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="name">
        <label class="mdl-textfield__label" for="input_username">Prénom</label>
        <input type="text" name="name" class="mdl-textfield__input" value="<?php echo $data['name']; ?>" disabled>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="surname">
        <label class="mdl-textfield__label" for="input_username">Nom de famille</label>
        <input type="text" name="surname" class="mdl-textfield__input"value="<?php echo $data['surname']; ?>" disabled>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="email">
        <label class="mdl-textfield__label" for="input_email">Email</label>
        <input type="text" name="email" class="mdl-textfield__input" value="<?php echo $data['email']; ?>" disabled>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="adresse">
        <label class="mdl-textfield__label" for="input_adresse">Adresse</label>
        <input type="text" name="adresse" class="mdl-textfield__input" value="<?php echo $data['adresse']; ?>" disabled>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="phone">
        <label class="mdl-textfield__label" for="input_email">Numéro de téléphone</label>
        <input type="text" name="phone" class="mdl-textfield__input" value="<?php echo $data['phone']; ?>" disabled>
      </div>
      <br />
      <a href="user_edit_password.php"class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Changer de mot de passe</a>
      <a href="user_edit_account.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</a>
    </form>
  </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  <script src="../../resources/js/classie.js"></script>
  <script src="../../resources/js/notificationFx.js"></script>
  <script>
      windows.onlaod = function() {

        setTimeout( function() {

          path.animate( { 'path' : pathConfig.to }, 300, mina.easeinout );

          classie.remove( bttn, 'active' );

          // create the notification
          var notification = new NotificationFx({
            wrapper : svgshape,
            message : '<p><span class="icon icon-bulb"></span></p>',
            layout : 'other',
            effect : 'cornerexpand',
            type : 'notice', // notice, warning or error
            onClose : function() {
              bttn.disabled = false;
              setTimeout(function() {
                path.animate( { 'path' : pathConfig.from }, 300, mina.easeinout );
              }, 200 );
            }
          });

          // show the notification
          notification.show();

        }, 1200 );

      } );
  </script>
  </body>
  </html>
