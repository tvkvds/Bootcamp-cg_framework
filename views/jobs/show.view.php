<?php var_dump($vars); ?>

<?php require 'views/partials/header.view.php' ?>

    <h3>jobs show</h3>
    <ul>
    <?php $job = $vars['job'];?>
    <?= $job->company ?>
    <?= $job->role ?>
    <?= $job->responsibilities ?>
    <a href="../job/<?=$job->id?>/edit">Edit</a>
    </ul>

<?php require 'views/partials/footer.view.php' ?>