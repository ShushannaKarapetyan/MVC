<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/materia/bootstrap.min.css">
    <title>Index</title>
</head>
<body>
    <?php include "components/nav.php";?>
    <div class="container row">
        <form action="<?php echo BASEURL;?>/Controller/insertUser" method="POST">
            <div class="form-group mt-5 ml-5">
                <h2>Create User</h2>
                <button class="btn btn-success">Insert User</button>
            </div>
        </form>
    </div>


    <?php include "components/footer.php"; ?>

</body>
</html>