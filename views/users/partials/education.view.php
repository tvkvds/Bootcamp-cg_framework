
<div class="row profile-top px-4  d-flex justify-content-center">
    <a href="/education" name="projects"><h4>Education</h4></a>
</div>
<div class="px-4 mt-4  row d-flex justify-content-center">
    <div class="col">
        <?php $educations = $vars['educations']?>
        <?php foreach ($educations as $education) :?>
            <div class="educations">
                <div class="row row px-4 pt-2 mt-2 ">
                    <div class="col">
                        <b><?= (isset($education->name) ? $education->name : '')?></b>
                    </div>
                    <div class="col">
                        <?= (isset($education->institution) ? $education->institution : '')?>
                    </div>
                    <div class="col-1">
                        <?= (isset($education->start_year) ? $education->start_year : '')?>
                    </div>
                    <div class="col-1">
                        <?= (isset($education->end_year) ? $education->end_year : '')?>
                    </div>
                    </div>
                    <div class="row row px-4 pt-2 mt-2 ">
                        <div class="col">
                            <?= (isset($education->info) ? $education->info : '')?>
                        </div>
                    </div>
                    <?php if ($_SESSION['user']['uid'] == $education->user_id) :?>
                    <div class="row px-4 pt-2 mt-2 d-flex justify-content-center editdelete">
                    <a href="/education/<?=$education->id?>/edit"><button  class="btn">Edit</button></a>
                    <a href="/education/<?=$education->id?>/destroy"><button  class="btn">Delete</button></a>
                    </div>
                    <?php endif;?>
                </div>
            
                
        <?php endforeach;?>
        <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew">
        <a href="/education/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new education</a>
        </div>
    </div>
</div>