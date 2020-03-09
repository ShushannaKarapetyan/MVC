<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br><br>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($data)): ?>
            <?php foreach ($data as $user):?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->fullName; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><a href="<?php echo BASEURL?>/ProfileController/edit_user/<?php echo $user->id;?>" class="btn btn-warning">Edit</a></td>
                    <td><a href="<?php echo BASEURL?>/ProfileController/delete/<?php echo $user->id;?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>
</body>
</html>
