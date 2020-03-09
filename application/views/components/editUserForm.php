<h2>Update User Form</h2>
<form action="<?php echo BASEURL?>/ProfileController/updateUser" method="post">
    <div class="form-group">
        <input type="text" name="fullName" placeholder="Full Name" class="form-control mt-3" value="<?php echo $data['fullName'];?>">
        <?php echo Validator::getErrorMessage($data['errorMessages'], 'fullName'); ?>
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="Email" class="form-control mt-3" value="<?php  echo $data['email'];?>">
        <?php echo Validator::getErrorMessage($data['errorMessages'], 'email');?>
    </div>
    <input type="hidden" name="hiddenId" value="<?php echo $data['id']; ?>">

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update User</button>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('.close').click(function () {
            $(this).parent().hide();
        })
    })
</script>
