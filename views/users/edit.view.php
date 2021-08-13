<?php require 'views/partials/header.view.php' ?>

    Edit page
    <?php $user = $vars["user"];?>
    <br>
    <br>

    <div class="user">
        <?= $user->first_name . ' ' . $user->last_name?>
        <?= $user->city?>
        <?= $user->birthday?>
    </div>

   <?php require 'views/users/partials/form.view.php' ?>

   
<?php require 'views/partials/footer.view.php' ?>