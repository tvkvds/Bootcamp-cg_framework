
<?php require 'views/partials/header.view.php' ?>

    <h3>index</h3>

    <?php if ($vars['educations'] == NULL) :?>
    <h3>You have not added an education yet.</h3>
    <?php else :?>
    
    <ul>
    <?php foreach ($vars['educations'] as $education) : ?>
        <li>
            <a href="education/<?= $education->id?>">
                <?= $education->name?>
                <?= $education->institution?>
            </a>    
        </li>
    <?php endforeach ;?>
    </ul>
    <?php endif; ?>

    <a href="education/<?=$vars['user']?>/create"><h3>Add new</h3></a>

<?php require 'views/partials/footer.view.php' ?>
