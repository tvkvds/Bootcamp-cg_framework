
<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>" class="my-5">

    <div class="container mt-5">

        <div class="row mb-3 form-group">

            <div class="col-md-6">
            <label for="name">Name education:</label> 
            <input type="text" class="form-control" name="name" placeholder="my education" 
            value="<?= isset($vars['education']) ? $vars['education']->name : '' ?>">
            </div>
            <div class="col-md-6">
            <label for="institution">Name of institute:</label> 
            <input type="text" class="form-control" name="institution" placeholder="example highschool" 
            value="<?= isset($vars['education']) ? $vars['education']->institution : '' ?>">
            </div>

        </div>

        


        <div class="row mb-3 form-group">

            <div class="col-md-12">
            <label for="info">About:</label> 
            <input type="text" class="form-control" min-height="500px" name="info" placeholder="About my education" 
            value="<?= isset($vars['education']) ? $vars['education']->info : '' ?>">
            </div>

        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-6">
            <label for="start_year">Started in: </label> 
                <input type="text" class="form-control" step="1" name="start_year" placeholder="1998" 
                value="<?= isset($vars['education']) ? $vars['education']->start_year : '' ?>" />
            </div>
            <div class="col-md-6">
            <label for="end_year">Ended in:</label> 
                <input type="text" class="form-control" step="1" name="end_year" placeholder="2002" 
                value="<?= isset($vars['education']) ? $vars['education']->end_year : '' ?>" />
            </div>

        </div>    

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['education']) ? 
        $vars['education']->id : '' ?>">

    <input type="submit" value="Save education" class="form-button btn">

    </div>

</form>