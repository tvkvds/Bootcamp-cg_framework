
<form method="<?= $vars['method'] ?>" action="<?=$vars['action']?>" class="my-4">

    <div class="container mt-5">

        <div class="row mb-3">

            <div class="col-md-6 form-group">
                <label for="name">Name project:</label> 
                <input type="text" class="form-control" name="name" placeholder="My project" 
                value="<?= isset($vars['project']) ? $vars['project']->name : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6 form-group">
                <label for="source">Source project:</label>
                <input type="text" class="form-control" name="source" placeholder="https://www.example.com" 
                value="<?= isset($vars['project']) ? $vars['project']->source : '' ?>">
            </div>

        </div>

         <div class="row mb-3">

            <div class="col-md-6 form-group">
                <label for="role">My role in the project:</label>
                <input type="text" class="form-control" name="role" placeholder="Designer" 
                value="<?= isset($vars['project']) ? $vars['project']->role : '' ?>">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-6 ml-3 mb-3 form-group form-check">

                <?php if(isset($vars['project']->live) == "1"): ?>
                    <input checked class="form-check-input" type="radio" name="live" value="1">
                <?php  else: ?>
                    <input  class="form-check-input" type="radio" name="live" value="1">
                <?php  endif?>
                <label class="form-check-label" for="code">Live</label><br>

                <?php  if(isset($vars['project']->live) == "0"): ?>
                    <input checked class="form-check-input" type="radio" name="live" value="0">
                <?php else: ?>
                    <input class="form-check-input" type="radio" name="live" value="0">
                <?php  endif?>
                <label class="form-check-label" for="code">Code</label><br>
                
            </div>
        </div>  

        <input type="hidden" name="f_token" value="<?= createToken() ?>">
        <input type="hidden" name="id" value="<?= isset($vars['project']) ? 
        $vars['project']->id : '' ?>">

        <input type="submit" value="Save project" class="form-button btn">
        

    </div>

</form>
