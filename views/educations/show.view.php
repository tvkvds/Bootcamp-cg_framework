

<?php require 'views/partials/header.view.php' ?>

    <h3>show</h3>
    <ul>
    <?php $education = $vars['education'];?>
    <?= $education->name ?>
    <?= $education->info ?>
    <?= $education->institution ?>
    <a href="../education/<?=$education->id?>/edit">Edit</a>
    </ul>
    <a href="../education/<?=$education->id?>/destroy">Delete</a>
   

<?php require 'views/partials/footer.view.php' ?>