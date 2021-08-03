<?php require 'views/partials/header.view.php' ?>
    Edit page
    <?php 
    $user = $vars["user"];
    $educations = $vars["educations"];
    var_dump($educations);
    ?>
    <br>
    <br>
    <div class="user">
   <?= $user->first_name . ' ' . $user->last_name?>
   <?= $user->city?>
   <?= $user->birthday?>
   </div>

   <div class="educations">
        <?php foreach ($educations as $education) :?>
            <?= $education->name;?>
            <?= $education->info;?>
            <?= $education->start_year . ' ' . $education->end_year;?>
        <?php endforeach;?>
   </div>
<?php require 'views/partials/footer.view.php' ?>