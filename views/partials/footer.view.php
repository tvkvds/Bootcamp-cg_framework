<footer class="p-5 d-flex justify-content-center mt-auto py-3 sticky-bottom">
    <div class="container row">
<?php # var_dump($_SESSION);?>


<?php if (isset($_SESSION['user']['uid'])) :?>

<div class="col-2 ">
    <h6 class="row">Users</h6>
    <a href="/users" class='row'>All users</a>
    <a href="/user/<?= $_SESSION['user']['uid']?>" class='row'>This user</a>
    <a href="/user/create" class='row'>New user</a>
    <a href="/user/<?= $_SESSION['user']['uid']?>/edit" class='row'>Edit user</a>
</div>

<div class="col-2 ">
    <h6 class=" row">Educations</h6>
    <a href="/education" class='row'>My educations</a>
    <a href="education/<?=$_SESSION['user']['uid']?>/create" class='row'>New education</a>
</div>

<div class="col-2 ">
<h6 class=" row">Jobs</h6>
<a href="/job" class='row'>My jobs</a>
<a href="/job/<?=$_SESSION['user']['uid']?>/create" class='row'>New job</a>
</div>

<div class="col-2 ">
<h6 class="row">Skills</h6>
<a href="/skill" class='row'>My skills</a>
<a href="/skill/<?=$_SESSION['user']['uid']?>/create" class='row'>New skill</a>
</div>

<div class="col-2 ">
<h6 class="row">Projects</h6>
<a href="/project" class='row'>My projects</a>
<a href="/project/<?=$_SESSION['user']['uid']?>/create" class='row'>New project</a>
</div>

<div class="col-2 ">
<h6 class="row">Hobbies</h6>
<a href="/hobby" class='row'>My hobbies</a>
<a href="/hobby/<?=$_SESSION['user']['uid']?>/create" class='row'>New hobby</a>
</div>

<?php else:?>
<p>You are not logged in</p>
<?php endif;?>

</div>
</footer>

