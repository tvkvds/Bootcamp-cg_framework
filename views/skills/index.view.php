<?php require 'views/partials/header.view.php' ?>

<h3> Index </h3>

<?php if ($vars['skills'] == NULL) :?>
    <h3>You have not added a skill yet.</h3>
<?php else :?>
    <ul>
        <?php foreach ($vars['skills'] as $skill) : ?>
            <li>
                <a href="skill/<?= $skill->id?>">
                    <?= $skill->skill?>
                    <?= $skill->description?>
                    <?= $skill->category?>
                    <?= $skill->in_progress?>
                </a>    
            </li>
        <?php endforeach ;?>
    </ul>
        
<?php endif;?>

<a href="skill/<?=$vars['user']?>/create"><h3>Add new</h3></a>

<?php require 'views/partials/footer.view.php' ?>