<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/materia/bootstrap.min.css">
    <?php include "components/header.php" ?>
</head>
<body>
    <?php include "components/nav.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
               <?php include "components/signupForm.php";?>
             <!--Close col-md-5-->
            </div>
         <!--Close row-->
        </div>
    <!--Close container-->
    </div>

    <?php include "components/footer.php"; ?>

</body>
</html>