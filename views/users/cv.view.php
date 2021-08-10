
<?php require 'views/partials/header.view.php' ?>

<?php $user = $vars['user'];?>
<?php $projects = $vars['projects'];?>

<div class="row container-fluid">

    <div class="col-8 p-4 ml-5 mr-2">
        <?php require 'views/users/partials/projects.view.php' ?>
        <?php require 'views/users/partials/experience.view.php' ?>
    </div>

    <div class="col-3 p-4  ml-2 mr-5  ">
        <?php require 'views/users/partials/personal.view.php' ?>
    </div>
        
</div>
<?php require 'views/partials/footer.view.php' ?>