<?php # var_dump($vars);?>

<?php require 'views/partials/header.view.php' ?>

<?php $user = $vars['user'];?>
<div class="row container-fluid border">
    <div class="col-8 border ">

    </div>
    <div class="col-3 border ">
        <div class="row profile-top">
            <h4>My profile</h4>
        </div>
        <div class=" row">
        <h5 class="m-2"><?= (isset($user) ? $user->first_name : '') . ' ' . (isset($user) ? $user->insertion : '') . ' ' . (isset($user) ? $user->last_name : '') ?></h5>
        </div>
        <div class="row">
        Email:
        Birthday: 
        Country:
        City:
        </div>

    </div>
        <?php #var_dump($user);?>
</div>
<?php require 'views/partials/footer.view.php' ?>