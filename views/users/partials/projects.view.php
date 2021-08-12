<div class="row profile-top px-4d-flex justify-content-center">
    <a name="projects"><h4>Projects</h4></a>
</div>
<div class="px-4 mt-4row d-flex justify-content-left">
    
    <?php foreach ($projects as $project) :?>
        <div class="col-5">
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
        

        <div class="row px-4 pb-4  d-flex justify-content-center">
            <?php if ($_SESSION['user']['uid'] == $project->user_id) :?>
                <a href="/project/<?=$project->id?>/edit"><button  class="btn">Edit</button></a>
                <a href="/project/<?=$project->id?>/destroy"><button  class="btn">Delete</button></a>
            <?php endif;?>
        </div>
                        
        </div>   
    <?php endforeach;?>
    
</div>