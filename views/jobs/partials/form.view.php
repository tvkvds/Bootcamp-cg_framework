<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>" class="my-5">


    <div class="container mt-5">

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="role">Function</label> 
                <input type="text" class="form-control" name="role" placeholder="CEO ENTREPENEUR, BORN IN 1964" 
                value="<?= isset($vars['job']) ? $vars['job']->role : '' ?>" required>
            </div>

        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="company">Name company</label> 
                <input type="text" class="form-control" name="company" placeholder="Minions inc." 
                value="<?= isset($vars['job']) ? $vars['job']->company : '' ?>" required>
            </div>

        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="responsibilities">Responsibilities</label> 
                <input type="text" class="form-control" name="responsibilities" placeholder="My main task was to..." 
                value="<?= isset($vars['job']) ? $vars['job']->responsibilities : '' ?>">
            </div>

        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-3 mb-3">
                <label for="start_year">Started in </label> 
                <input type="text" class="form-control" name="start_year" placeholder="1998" 
                value="<?= isset($vars['job']) ? $vars['job']->start_year : '' ?>" required>
            </div>

            <div class="col-md-3">
            <label for="end_year">Ended in</label> 
                <input type="text" class="form-control" name="end_year" placeholder="2018" 
                value="<?= isset($vars['job']) ? $vars['job']->end_year : '' ?>">
            </div>

        </div>


        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['job']) ? 
        $vars['job']->id : '' ?>">

        <input type="submit" class="form-button btn" value="Save job">

    </div>

</form>
