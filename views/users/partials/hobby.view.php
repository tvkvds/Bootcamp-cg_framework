<div class="row profile-top px-4  d-flex justify-content-center">
    <a href="/hobby" name="projects"><h4>Hobby</h4></a>
</div>
<div class="px-4 mt-4  row d-flex justify-content-center">
    <div class="col">
        <?php $hobbies = $vars['hobbies']?>
        <?php foreach ($hobbies as $hobby) :?>
            <div class="educations">
                <div class="row row px-4 pt-2 mt-2 ">
                    <div class="col">
                       <b> <?= (isset($hobby->hobby) ? $hobby->hobby : '')?> </b>
                    </div>
                   
        </div>
                    <div class="row row px-4 pt-2 mt-2 ">
                        <div class="col">
                        <?= (isset($hobby->description) ? $hobby->description : '')?>
                        </div>
                    </div>
                    <?php if ($_SESSION['user']['uid'] == $hobby->user_id) :?>
                    <div class="row row px-4 pt-2 mt-2 d-flex justify-content-center editdelete">
                    <a href="/hobby/<?=$hobby->id?>/edit"><button  class="btn">Edit</button></a>
                    <a href="/hobby/<?=$hobby->id?>/destroy"><button  class="btn">Delete</button></a>
                    </div>
                    <?php endif;?>
                </div>
            
                
        <?php endforeach;?>
        <div class="row px-5 mx-5 my-4 py-2 d-flex justify-content-center addnew btn">
        <a href="/hobby/<?=$_SESSION['user']['uid']?>/create" class='row'>Add new hobby</a>
        </div>
    </div>
</div>