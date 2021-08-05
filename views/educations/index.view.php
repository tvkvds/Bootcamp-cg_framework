

<?php require 'views/partials/header.view.php' ?>

    <h3>educations index</h3>

  
    
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

    <a href=""><h3>Add new</h3></a>

<?php require 'views/partials/footer.view.php' ?>