<!-- Navbar-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo BASEURL; ?>">User Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASEURL?>/ProfileController">Home</span></a>
            </li>
            <?php if(!$this->getSession('userId')):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL?>/AccountController">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL?>/AccountController/loginForm">Login</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php
            if($this-> getSession('userId')): ?>
            <ul class="my-2 my-lg-0">
                <a href="<?php echo BASEURL?>/ProfileController/logout" class="btn btn-success">Logout</a>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<!--Close Navbar-->
