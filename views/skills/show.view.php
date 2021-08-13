<?php require 'views/partials/header.view.php' ?>

<h3>show</h3>
    
<?php $skill = $vars['skill'];?>

<?= $skill->skill?>
<?= $skill->description?>
<?= $skill->category?>
<?= $skill->in_progress?>

<a href="../skill/<?=$skill->id?>/edit">Edit</a>
    
<a href="../skill/<?=$skill->id?>/destroy">Delete</a>

<?php require 'views/partials/footer.view.php' ?>