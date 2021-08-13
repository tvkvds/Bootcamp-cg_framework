<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>" class="my-5">


    <div class="container mt-5">

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="skill">Skill:</label> 
                <input class="form-control" type="text" name="skill" placeholder="My skill" 
                value="<?= isset($vars['skill']) ? $vars['skill']->skill : '' ?>">
            </div>

        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="description">About:</label> 
                <input class="form-control" type="text" name="description" placeholder="Describe your skill" 
                value="<?= isset($vars['skill']) ? $vars['skill']->description : '' ?>">
            </div>

        </div>

       

        <div class="row mb-3 form-group">

            <div class="col-md-3 mb-3">
                <label for="category">Category:</label> 
                <input class="form-control" type="text" name="category" placeholder="dropdown" 
                value="<?= isset($vars['skill']) ? $vars['skill']->category : '' ?>">
            </div>

            <div class="col-md-3">
            <label for="in_progress">Learning:</label> 
                <input class="form-control" type="text" name="in_progress" placeholder="radio" 
                value="<?= isset($vars['skill']) ? $vars['skill']->in_progress : '' ?>">
            </div>

        </div>


        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['skill']) ? 
        $vars['skill']->id : '' ?>">

    <input type="submit" value="Save skill" class="form-button btn">

    </div>

</form>