<footer class="py-2">

<?php # var_dump($_SESSION);?>


<?php if (isset($_SESSION['user']['uid'])) :?>

<div class="row">
    <div class="col-2">
        <h6 class="m-3 row">Users</h6>

        <a href="/users" class='mx-3 row'>All users</a>
        <a href="/user/<?= $_SESSION['user']['uid']?>" class='mx-3 row'>This user</a>
        <a href="/user/create" class='mx-3 row'>New user</a>
        <a href="/user/<?= $_SESSION['user']['uid']?>/edit" class='mx-3 row'>Edit user</a>
    
    </div>
    <div class="col-2">
        <h6 class="m-3 row">Educations</h6>

        <a href="/education" class='mx-3 row'>My educations</a>
        <a href="education/<?=$_SESSION['user']['uid']?>/create" class='mx-3 row'>New education</a>
        
    
    </div>
    <div class="col-2">
        <h6 class="m-3 row">Jobs</h6>

        <a href="/job" class='mx-3 row'>My jobs</a>
        <a href="/job/<?=$_SESSION['user']['uid']?>/create" class='mx-3 row'>New job</a>
        
    
    </div>
    <div class="col-2">
        <h6 class="m-3 row">Skills</h6>

        <a href="/skill" class='mx-3 row'>My skills</a>
        <a href="/skill/<?=$_SESSION['user']['uid']?>/create" class='mx-3 row'>New Job</a>
    
    </div>
    <div class="col-2">
        <h6 class="m-3 row">Projects</h6>

        <a href="/project" class='mx-3 row'>My projects</a>
        <a href="/project/<?=$_SESSION['user']['uid']?>/create" class='mx-3 row'>New project</a>
    
    </div>
    <div class="col-2">
        <h6 class="m-3 row">Hobbies</h6>

        <a href="/hobby" class='mx-3 row'>My hobbies</a>
        <a href="/hobby/<?=$_SESSION['user']['uid']?>/create" class='mx-3 row'>New hobby</a>
    
    </div>
    
</div>
<?php endif;?>

</footer>

