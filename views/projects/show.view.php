<? var_dump($vars); ?>


<?php require 'views/partials/header.view.php' ?>

    <h3>show</h3>
    <ul>
        <?php $project = $vars['project'];?>
            <?= $project->name?>
            <?= $project->source?><!-- needs to be an anchor tag-->
            <?= $project->live?>
            <a href="../project/<?=$project->id?>/edit">Edit</a>
    </ul>
    <a href="../project/<?=$project->id?>/destroy">Delete</a>

<?php require 'views/partials/footer.view.php' ?>