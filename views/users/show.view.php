<?php require 'views/partials/header.view.php' ?>

   <?php 
   $user = $vars["user"];
   ?>

   <?= $user->first_name . ' ' . $user->last_name?>
   <?= $user->city?>
   <?= $user->birthday?>

<?php require 'views/partials/footer.view.php' ?>