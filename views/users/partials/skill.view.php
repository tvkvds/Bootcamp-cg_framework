<div class="row profile-top px-4  d-flex justify-content-center">
    <a href="/skill" name="projects"><h4>Skill</h4></a>
</div>

<?php if (!$vars['skills'] == NULL) :?>

<div class="px-4 mt-4  row d-flex justify-content-center">
    <div class="col">
        <?php $skills = $vars['skills']?>
        <?php foreach ($skills as $skill) :?>
            <div class="educations">
                <div class="row row px-4 pt-2 mt-2 ">
                    <div class="col">
                       <b> <?= (isset($skill->category) ? $skill->category : '')?> </b>
                    </div>
                    <div class="col-1">
                        <?= (isset($skill->skill) ? $skill->skill : '')?>
                    </div>
                    <div class="col-1">
                        <?= (isset($skill->in_progress) ? $skill->in_progress : '')?>
                    </div>
                    </div>
                    <div class="row row px-4 pt-2 mt-2 ">
                        <div class="col">
                        <?= (isset($skill->description) ? $skill->description : '')?>
                        </div>
                    </div>
                    <?php if ($_SESSION['user']['uid'] == $skill->user_id) :?>
                    <div class="row row px-4 pt-2 mt-2 d-flex justify-content-center editdelete">
                    <a href="/skill/<?=$skill->id?>/edit"><button  class="btn">Edit</button></a>
                    <a href="/skill/<?=$skill->id?>/destroy"><button  class="btn">Delete</button></a>
                    </div>
                    <?php endif;?>
                </div>
            
                
        <?php endforeach;?>
        <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew btn">
        <a href="/skill/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new skill</a>
        </div>
    </div>
</div>

<?php else :?>

    <div class="p-4 mt-4 row d-flex justify-content-center">
        <h4>You have not added any skills yet!</h4>
    </div>
    <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew btn">
        <a href="/skill/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new skill</a>
    </div>

<?php endif;?>