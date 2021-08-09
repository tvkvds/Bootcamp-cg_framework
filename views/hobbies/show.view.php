<?php var_dump($vars); ?>

<?php require 'views/partials/header.view.php' ?>

    <h3>show</h3>
    <ul>
    <?php $hobby = $vars['hobby'];?>
    <?= $hobby->hobby ?>
    <?= $hobby->description ?>
    
    <a href="../hobby/<?=$hobby->id?>/edit">Edit</a>
    </ul>
    <a href="../hobby/<?=$hobby->id?>/destroy">Delete</a>
   

<?php require 'views/partials/footer.view.php' ?>