<?php # var_dump($vars); ?>

<?php require 'views/partials/header.view.php' ?>

<h3> Index </h3>

<?php if ($vars['jobs'] == NULL) :?>
    <h3>You have not added a job yet.</h3>
<?php else :?>
    <ul>
    <?php foreach ($vars['jobs'] as $job) : ?>
        <li>
            <a href="job/<?= $job->id?>">
                <?= $job->role?>
                <?= $job->company?>
                <?= $job->responsibilities?>
                <?= $job->start_year?>
            </a>    
        </li>
    <?php endforeach ;?>
    </ul>
        
<?php endif;?>

<a href="job/<?=$vars['user']?>/create"><h3>Add new</h3></a>



<?php require 'views/partials/footer.view.php' ?>