<?php require 'views/partials/header.view.php' ?>
    Home

    
    <ul>
    <?php foreach ($vars['users'] as $user) : ?>
        <li>
        <a href="user/<?= $user->id?>">
        <?= $user->first_name . ' ' . $user->last_name?>
        </a>
        </li>
        <?php endforeach ;?>
        </ul>
<?php require 'views/partials/footer.view.php' ?>