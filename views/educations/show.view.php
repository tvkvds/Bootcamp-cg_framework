

<?php require 'views/partials/header.view.php' ?>

    <h3>educations show</h3>
    <ul>
    <?php $education = $vars['education'];?>
    <?= $education->name ?>
    <?= $education->info ?>
    <?= $education->institution ?>
    <a href="../education/<?=$education->id?>/edit">Edit</a>
    </ul>

<?php require 'views/partials/footer.view.php' ?>