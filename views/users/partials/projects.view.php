<div class="row profile-top px-4d-flex justify-content-center">
    <a name="projects"><h4>Projects</h4></a>
</div>
<div class="px-4 mt-4row d-flex justify-content-center">

    <div class="col  px-4 mr-2" id="code-projects">
        <div class="row  px-4 d-flex justify-content-center">
            source code
        </div>
        <?php foreach ($projects as $project) :?>
            <?php if ($project->live === '0') :?>
                       
                <div class="row px-4 pt-4 pb-2  d-flex justify-content-center">
                    <a href="<?=$project->source?>"><img src="../../public/images/github-icon.png" class="github-icon"></a>
                </div>
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
                        
            <?php endif;?>
        <?php endforeach;?>
    </div>

    <div class="col  px-4 ml-2" id="live-projects">
        <div class="row  px-4  d-flex justify-content-center">
            live
        </div>
        <?php foreach ($projects as $project) :?>
            <?php if ($project->live === '1') :?>
                <div class="row px-4 pt-4 pb-2  d-flex justify-content-center">
                    <a href="<?=$project->source?>"><img src="../../public/images/project-icon.png" class="project-icon"></a>
                </div>
                <div class="row px-4 py-2 ">
                    <h5><a href="<?=$project->source?>"><?=(isset($project->name) ? $project->name : '')?></a></h5>
                </div>
                <div class="row px-4 py-2 ">
                    <?=(isset($project->role) ? $project->role : '')?>
                </div>
                <div class="row px-4 pb-4  d-flex justify-content-center">
                    <?php if ($_SESSION['user']['uid'] == $project->user_id) :?>
                        <a href="/project/<?=$project->id?>/edit"><button  class="btn">Edit</button></a>
                        <a href="/project/<?=$_project->id?>/destroy"><button  class="btn">Delete</button></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>

</div>