<? var_dump($vars); ?>
<?php $project = $vars['project']?>


<?php require 'views/partials/header.view.php' ?>
<div class="containter d-flex justify-content-center">
<div class="col-5 m-5 projects" >
        <?php if ($project->live === '0') :?>
                       
            <div class="row px-4 pt-4 pb-2  d-flex justify-content-center">
                <a href="<?=$project->source?>"><img src="../../public/images/github-icon.png" class="github-icon"></a>
            </div>
            
            <?php elseif ($project->live === '1') :?>
                <div class="row px-4 pt-4 pb-2  d-flex justify-content-center">
                    <a href="<?=$project->source?>"><img src="../../public/images/project-icon.png" class="project-icon"></a>
                </div>
        <?php endif;?>
        <div class="row px-4 py-2 ">
            <h5><a href="<?=$project->source?>"><?=(isset($project->name) ? $project->name : '')?></a></h5>
        </div>
        <div class="row px-4 py-2 ">
            <?=(isset($project->role) ? $project->role : '')?>
        </div>
        
        <div class="col-8">
        <div class="row px-4 py-2 d-flex justify-content-center editdelete">
           
            <?php if ($_SESSION['user']['uid'] == $project->user_id) :?>
                <a href="/project/<?=$project->id?>/edit"><button  class="btn">Edit</button></a>
                <a href="/project/<?=$project->id?>/destroy"><button  class="btn">Delete</button></a>
            <?php endif;?>
            
        </div>
        </div>               
        </div>   
        </div>
<?php require 'views/partials/footer.view.php' ?>