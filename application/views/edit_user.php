<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/materia/bootstrap.min.css">
    <?php include "components/header.php" ?>
    <?php linkCSS('assets/css/dataTables.bootstrap4.min.css');?>
</head>
<body>
<?php include "components/nav.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
                include 'components/editUserForm.php';
            ?>
        </div>
    </div>
</div>

<?php include "components/footer.php"; ?>

<script>
    $(document).ready(function () {
        $('.close').click(function () {
            $(this).parent().hide();
        });

        $('#example').DataTable();

    })
</script>
    <?php linkJS('assets/dataTables.min.js'); ?>
    <?php linkJS('assets/dataTables.bootstrap4.min.js'); ?>

</body>
</html>

