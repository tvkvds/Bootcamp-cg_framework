
<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">

    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
            <input type="text" name="name" placeholder="Name" value="<?= isset($vars['education']) ? $vars['education']->name : '' ?>">
            </div>
            <div class="col-md-6">
            <input type="text" name="institution" placeholder="Institution" value="<?= isset($vars['education']) ? $vars['education']->institution : '' ?>">
            </div>

        </div>

        


        <div class="row mb-3">

            <div class="col-md-12">
            <input type="text" min-height="500px" name="info" placeholder="About" value="<?= isset($vars['education']) ? $vars['education']->info : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" step="1" name="start_year" placeholder="Started in" value="<?= isset($vars['education']) ? $vars['education']->start_year : '' ?>" />
            </div>
            <div class="col-md-6">
                <input type="text" step="1" name="end_year" placeholder="Completed in" value="<?= isset($vars['education']) ? $vars['education']->end_year : '' ?>" />
            </div>

        </div>    

        <div class="row mb-3">

            <div class="col-md-6">
                
            </div>
            
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['education']) ? $vars['education']->id : '' ?>">

        <input type="submit" value="Opslaan">

    </div>

</form>