
<?php require 'views/partials/header.view.php' ?>

    
<div class="container">

    <div class="col">

    </div>

    <div class="col m-5">
        <?php if(isset($_SESSION['user'])):?>
            <h3>Welcome back <i><?=$_SESSION['user']['full_name']?></i></h3>
        <?php endif;?>
    </div>
    
</div>
     
<?php require 'views/partials/footer.view.php' ?>