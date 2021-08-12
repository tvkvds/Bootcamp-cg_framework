<div class="row profile-top px-4  d-flex justify-content-center">
    <a name="projects"><h4>Experience</h4></a>
</div>
<div class="px-4 mt-4  row d-flex justify-content-center">
    <div class="col">
        <?php $jobs = $vars['jobs']?>
            <?php foreach ($jobs as $job) :?>
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
                <div class="row px-4 pt-2 mt-2 d-flex justify-content-center">
                    <a href="/job/<?=$job->id?>/edit"><button  class="btn">Edit</button></a>
                    <a href="/job/<?=$_job->id?>/destroy"><button  class="btn">Delete</button></a>
                </div>
                <?php endif;?>
                </div>
                
                
            <?php endforeach;?>
            <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew">
            <a href="/job/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new job</a>
            </div>
    </div>
</div>