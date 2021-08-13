
<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">

    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="hobby" placeholder="hobby" 
                value="<?= isset($vars['hobby']) ? $vars['hobby']->hobby : '' ?>">
            </div>
            
        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="description" placeholder="description" 
                value="<?= isset($vars['hobby']) ? $vars['hobby']->description : '' ?>">
            </div>

        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['hobby']) ? 
        $vars['hobby']->id : '' ?>">

        <input type="submit" value="Opslaan">

    </div>

</form>