<?php require 'views/partials/header.view.php' ?>

<h3>index</h3>

<?php if ($vars['hobbies'] == NULL) :?>

    <h3>You have not added a hobby yet.</h3>

<?php else :?>

    <ul>
        <?php foreach ($vars['hobbies'] as $hobby) : ?>
            <li>
                <a href="hobby/<?= $hobby->id?>">
                    <?= $hobby->hobby?>
                    <?= $hobby->description?>
                </a>    
            </li>
        <?php endforeach ;?>
    </ul>
    
<?php endif; ?>

<a href="hobby/<?=$vars['user']?>/create"><h3>Add new</h3></a>

<?php require 'views/partials/footer.view.php' ?>
