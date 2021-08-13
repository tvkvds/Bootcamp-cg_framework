<header>
<div class="container-fluid">
<div class="row">
<nav class="navbar navbar-expand-lg navbar-light">

<div class="container-fluid">

<a class="navbar-brand" href="/">Codegorilla CV's</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav me-auto mb-2 mb-lg-0">

<li class="nav-item">
<a class="nav-link" href="/contact">contact</a>
</li>
<?php if (isset($_SESSION['user']['uid'])) : ?>
<li class="nav-item">
<a class="nav-link" href="/user/<?=$_SESSION['user']['uid']?>/cv">My CV</a>
</li>
<?php else : ?>
<li class="nav-item">
<a class="nav-link" href="/login">My CV</a>
</li>
<?php endif;?>
<?php if (!isset($_SESSION['user'])) : ?>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="/register">register</a>
</li>
<?php endif; ?>
<?php if (isset($_SESSION['user'])) : ?>
<li class="nav-item">
<a class="nav-link" href="/logout">logout</a>
</li>
<?php else : ?>
<li class="nav-item">
<a class="nav-link" href="/login">login</a>
</li>
<?php endif; ?>

</ul>

</div>

</div>
</nav>
</div>
</div>
</header>