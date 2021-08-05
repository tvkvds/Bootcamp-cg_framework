<?php require 'views/partials/header.view.php' ?>

    <h3>educations index</h3>

    <?php var_dump($vars)?>
    
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

<?php require 'views/partials/footer.view.php' ?>