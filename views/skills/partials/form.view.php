<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">


    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="skill" placeholder="Skill" 
                value="<?= isset($vars['skill']) ? $vars['skill']->skill : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="description" placeholder="skill description" 
                value="<?= isset($vars['skill']) ? $vars['skill']->description : '' ?>">
            </div>

        </div>

       

        <div class="row mb-3">

            <div class="col-md-3 mb-3">
                <input type="text" name="category" placeholder="category" 
                value="<?= isset($vars['skill']) ? $vars['skill']->category : '' ?>">
            </div>

            <div class="col-md-3">
                <input type="text" name="in_progress" placeholder="Learning yes or no" 
                value="<?= isset($vars['skill']) ? $vars['skill']->in_progress : '' ?>">
            </div>

        </div>


        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['skill']) ? 
        $vars['skill']->id : '' ?>">

        <input type="submit" value="Save edit">

    </div>

</form>