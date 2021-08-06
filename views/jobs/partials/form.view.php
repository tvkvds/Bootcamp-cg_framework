<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">
<?php $job = $vars['job'];?>

    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="role" placeholder="Role" value="<?= isset($job) ? $job->role : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="company" placeholder="At company" value="<?= isset($job) ? $job->company : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="responsibilities" placeholder="Responsibilities" value="<?= isset($job) ? $job->responsibilities : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-3 mb-3">
                <input type="text" name="start_year" placeholder="Started in" value="<?= isset($job) ? $job->start_year : '' ?>">
            </div>

            <div class="col-md-3">
                <input type="text" name="end_year" placeholder="Ended in" value="<?= isset($job) ? $job->end_year : '' ?>">
            </div>

        </div>


        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($job) ? $job->id : '' ?>">

        <input type="submit" value="Save edit">

    </div>

</form>