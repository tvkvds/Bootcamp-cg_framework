<?php require 'views/partials/header.view.php' ?>

<?php $job = $vars['job']?>

<div class="job">
    <div class="row px-4 pt-2 mt-2 ">

        <div class="col">
            <b><?= (isset($job->role) ? $job->role : '')?></b>
        </div>

        <div class="col">
            <?= (isset($job->company) ? $job->company : '')?>
        </div>

        <div class="col-1">
            <?= (isset($job->start_year) ? $job->start_year : '')?>
        </div>

        <div class="col-1">
            <?= (isset($job->end_year) ? $job->end_year : '')?>
        </div>

    </div>

    <div class="row px-4 pt-2 mt-2 ">
        <div class='col'>
            <?= (isset($job->responsibilities) ? $job->responsibilities : '')?>
        </div>
    </div>

    <?php if ($_SESSION['user']['uid'] == $job->user_id) :?>

        <div class="row px-4 pt-2 mt-2 d-flex justify-content-center editdelete">
            <a href="/job/<?=$job->id?>/edit"><button  class="btn">Edit</button></a>
            <a href="/job/<?=$job->id?>/destroy"><button  class="btn">Delete</button></a>
        </div>

    <?php endif;?>
</div>

<?php require 'views/partials/footer.view.php' ?>