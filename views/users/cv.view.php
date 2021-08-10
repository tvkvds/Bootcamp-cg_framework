<?php # var_dump($vars);?>

<?php require 'views/partials/header.view.php' ?>

<?php $user = $vars['user'];?>
<div class="row container-fluid">
    <div class="col-8 p-4 ml-5 mr-2 border ">

    </div>
    <div class="col-3 p-4  ml-2 mr-5 border ">
        <div class="row profile-top px-4 border-bottom d-flex justify-content-center">
            <h4 class="">My profile</h4>
        </div>
        <div class="row px-4 border-bottom d-flex justify-content-center">
            <img src="../../public/images/profile-icon.png" class="profile-icon">
        </div>
        <div class="row px-4 border-bottom d-flex justify-content-center">
        <h5 class="m-2 "><?= (isset($user->first_name) ? $user->first_name : '') . ' ' . (isset($user->insertion) ? $user->insertion : '') . ' ' . (isset($user->last_name) ? $user->last_name : '') ?></h5>
        </div>
        <div class="row px-4 border-bottom d-flex justify-content-center">
        social media icons
        </div>
        <div class="row px-4 border-bottom">
        Birthday: <?=(isset($user->birthday) ? $user->birthday : '')?>
        Country: <?=(isset($user->country) ? $user->country : '')?>
        City: <?=(isset($user->city) ? $user->city : '')?>
        </div>

    </div>
        <?php #var_dump($user);?>
</div>
<?php require 'views/partials/footer.view.php' ?>