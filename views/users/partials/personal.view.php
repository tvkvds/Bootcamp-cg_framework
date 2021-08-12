<div class="row profile-top px-4  d-flex justify-content-center">
    <h4 class="">  personal information </h4>
</div>
<div class="row px-4  d-flex justify-content-center">
    <img src="../../public/images/profile-icon.png" class="profile-icon">
</div>
<div class="row px-4  d-flex justify-content-center">
    <h5 class="m-2 "><?= (isset($user->first_name) ? $user->first_name : '') . ' ' . (isset($user->insertion) ? $user->insertion : '') . ' ' . (isset($user->last_name) ? $user->last_name : '') ?></h5>
</div>
<div class="row px-4  d-flex justify-content-center">
    social media icons
</div>
<div class="row px-4 d-flex justify-content-center">
    <div class="col">
        <div class="row px-4 ">
            Birthday: 
        </div>
    <div class="row px-4 ">
        Country: 
    </div>
    <div class="row px-4 ">
        City: 
    </div>
    </div>
    <div class="col">
        <div class="row px-4 ">
            <?='  ' . (isset($user->birthday) ? $user->birthday : '')?>
        </div>
        <div class="row px-4 ">
            <?=(isset($user->country) ? $user->country : '')?>
        </div>
        <div class="row px-4 ">
            <?=(isset($user->city) ? $user->city : '')?>
        </div>
    </div>
</div>
  
<?php if ($_SESSION['user']['uid'] == $user->id) :?>
<div class="row px-4  d-flex justify-content-center editdelete">
    <a href="/user/<?=$_SESSION['user']['uid']?>/edit"><button  class="btn">Edit</button></a>
</div>
<?php endif;?>
        