<?php echo $this -> flash('accountCreated', 'alert alert-success'); ?>

<h1 class="mt-3">Login</h1>
<form action="<?php echo BASEURL;?>/AccountController/userLogin" method="POST">
    <div class="form-group">
        <input type="text" name="email" placeholder="Email" class="form-control mt-3" value="<?php if(!empty($data['email'])){ echo $data['email'];}?>">
        <?php echo Validator::getErrorMessage($data['errorMessages'], 'email'); ?>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control mt-3" value="<?php if(!empty($data['password'])){ echo $data['password'];}?>">
        <?php echo Validator::getErrorMessage($data['errorMessages'], 'password');?>
    </div>
    <div class="form-group">
        <button class="btn btn-primary mt-3" name="loginBtn">Login</button>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('.close').click(function () {
            $(this).parent().hide();
        })
    })
</script>
