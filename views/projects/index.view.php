<?php var_dump($vars);?>
<?php # var_dump($vars); ?>

<?php require 'views/partials/header.view.php' ?>

<h3> Index </h3>

<?php if ($vars['projects'] == NULL) :?>
    <h3>You have not added a project yet.</h3>
<?php else :?>
    <ul>
    <?php foreach ($vars['projects'] as $project) : ?>
        <li>
            <a href="project/<?= $project->id?>">
                <?= $project->name?>
                <?= $project->source?><!-- needs to be an anchor tag-->
                <?= $project->live?>
                
            </a>    
        </li>
    <?php endforeach ;?>
    </ul>
        
<?php endif;?>

<a href="project/<?=$vars['user']?>/create"><h3>Add new</h3></a>



<?php require 'views/partials/footer.view.php' ?>