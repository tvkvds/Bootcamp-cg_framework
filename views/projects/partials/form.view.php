<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>">


    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="name" placeholder="name" 
                value="<?= isset($vars['project']) ? $vars['project']->name : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <input type="text" name="source" placeholder="www.example.com" 
                value="<?= isset($vars['project']) ? $vars['project']->source : '' ?>">
            </div>

        </div>

       

        <div class="row mb-3">

            <div class="col-md-3 mb-3">
                <input type="text" name="live" placeholder="live" 
                value="<?= isset($vars['project']) ? $vars['project']->live : '' ?>">
            </div>
        </div>  

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['project']) ? 
        $vars['project']->id : '' ?>">

        <input type="submit" value="Save edit">

    </div>

</form>