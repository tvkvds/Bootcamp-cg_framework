
<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>" class="my-5">

<div class="container col-6 mt-5">

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="hobby">My hobby</label> 
                <input type="text" class="form-control" name="hobby" placeholder="knitting" 
                value="<?= isset($vars['hobby']) ? $vars['hobby']->hobby : '' ?>" required>
            </div>
            
        </div>

        <div class="row mb-3 form-group">

            <div class="col-md-6">
                <label for="description">About</label> 
                <input type="text" class="form-control" name="description" placeholder="Describe your hobby" 
                value="<?= isset($vars['hobby']) ? $vars['hobby']->description : '' ?>">
            </div>

        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['hobby']) ? 
        $vars['hobby']->id : '' ?>">

        <input type="submit" class="form-button btn" value="Save Hobby">

    </div>

</form>