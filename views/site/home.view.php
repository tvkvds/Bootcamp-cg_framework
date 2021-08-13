
<?php require 'views/partials/header.view.php' ?>

<?php dd($vars);?>
    
<div class="container">
    <div class="col">

    </div>
    <div class="col-3">
        <?php if(isset($_SESSION['user'])):?>
            <h3>Welcome back <i><?=$_SESSION['user']['full_name']?></i></h3>
        <?php endif;?>
    </div>
</div>
     
<?php require 'views/partials/footer.view.php' ?>