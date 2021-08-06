<?php var_dump($vars);?>

<?php require 'views/partials/header.view.php' ?>

<h3> Job </h3>

<?php if ($vars['jobs'] == NULL) :?>
    <h3>You have not added an education yet.</h3>
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



<?php require 'views/partials/footer.view.php' ?>