<div class="row profile-top px-4 mb-4 d-flex justify-content-center">
    <a href="/project" name="projects"><h4>Projects</h4></a>
</div>

<?php if (!$vars['projects'] == NULL) :?>

    <div class="px-4 mt-4 row d-flex justify-content-center">
        
        <?php foreach ($projects as $project) :?>
            <div class="col-5 m-2 projects" >
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
            
                <div class="row px-4 py-2 d-flex justify-content-center editdelete">
                    <?php if ($_SESSION['user']['uid'] == $project->user_id) :?>
                        <a href="/project/<?=$project->id?>/edit"><button  class="btn">Edit</button></a>
                        <a href="/project/<?=$project->id?>/destroy"><button  class="btn">Delete</button></a>
                    <?php endif;?>
                </div>  

            </div>   
        <?php endforeach;?> 
    </div>

    <?php if ($_SESSION['user']['uid'] == $project->user_id) :?>
        <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew btn">
            <a href="/project/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new project</a>
        </div>
    <?php endif;?>

<?php else :?>

    <?php if ($_SESSION['user']['uid'] == $vars['user']->id) :?>

        <div class="p-4 mt-4 row d-flex justify-content-center">
            <h4>You have not added any projects yet!</h4>
        </div>

        <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew btn">
            <a href="/project/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new project</a>
        </div>

    <?php else:?>

        <div class="p-4 mt-4 row d-flex justify-content-center">
            <h4>This user has not added any projects yet!</h4>
        </div>

    <?php endif;?>

<?php endif;?>