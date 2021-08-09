<?php # var_dump($vars); ?>

<?php require 'views/partials/header.view.php' ?>

    <h3>show</h3>
    <ul>
    <?php $job = $vars['job'];?>
    <?= $job->company ?>
    <?= $job->role ?>
    <?= $job->responsibilities ?>
    <a href="../job/<?=$job->id?>/edit">Edit</a>
    </ul>
    <a href="../job/<?=$job->id?>/destroy">Delete</a>

<?php require 'views/partials/footer.view.php' ?>