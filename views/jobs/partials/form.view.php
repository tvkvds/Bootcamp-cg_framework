<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">


    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="role" placeholder="Role" value="<?= isset($vars['jobs']) ? $vars['jobs']->role : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="company" placeholder="At company" value="<?= isset($vars['jobs']) ? $vars['jobs']->company : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="responsibilities" placeholder="Responsibilities" value="<?= isset($vars['jobs']) ? $vars['jobs']->responsibilities : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-3 mb-3">
                <input type="text" name="start_year" placeholder="Started in" value="<?= isset($vars['jobs']) ? $vars['jobs']->start_year : '' ?>">
            </div>

            <div class="col-md-3">
                <input type="text" name="end_year" placeholder="Ended in" value="<?= isset($vars['jobs']) ? $vars['jobs']->end_year : '' ?>">
            </div>

        </div>


        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['jobs']) ? $vars['jobs']->id : '' ?>">

        <input type="submit" value="Save edit">

    </div>

</form>