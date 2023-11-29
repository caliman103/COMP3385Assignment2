<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5 text-center">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <img style="height:120px;" src="./book-logo-x2.png" class="img-fluid" alt="...">
            </div>
            <div class="col-sm-6 col-md-7 col-lg-7">
                
            </div>
            <div class="mt-3 col-sm-2 col-md-2 col-lg-2">
                <?php if(null !== $user): ?>
                    <p><a href="./Logout.php">Log Out</a></p> 
                <?php endif; ?>
            </div>
        </div>

        <div class="my-4 row">
            <div class="col-sm-5 col-md-5 col-lg-4">
                <p><?php echo $user->role . ": ".$user->username?></p>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-5">

            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 ">
                <p>Email:<?php echo " ".$user->email?></p> 
            </div>
        </div>

        <div class="row">
        <?php if(in_array("View All Studies", $permissions)): ?>
            <div class="m-1 col-sm-4 col-md-3 border border-3 p-3">
                <a class="text-primary" href=".">View All Studies</a> 
            </div>
            <?php endif ?>

            <div class="col-sm-3 col-md -4">

            </div>

            <?php if(in_array("Create New Study", $permissions)): ?>
            <div class="m-1 col-sm-4 col-md-3  border border-3 p-3">
            <a class="text-warning" href=".">Create New Study</a>
            </div>
            <?php endif; ?>

        </div>

        <div class="row my-4">
        <?php if(in_array("Delete Previous Study", $permissions)): ?>
            <div class="m-1 col-sm-4 col-md-3  border border-3 p-3">
            <a class="text-info" href=".">Delete Previous Study</a>
            </div>
            <?php endif ?>

            <div class="col-sm-3 col-md -4">
            </div>
            <?php if(in_array("Create New Researchers", $permissions)): ?>
            <div class="m-1 col-sm-4 col-md-3 border border-3 p-3">
                <a class="text-danger" href="./createUser">Create New Researchers</a>
            </div>
            <?php endif ?>
        </div>          
        <div class="row mt-5">
            <div class="border">
                <p>Copyright &copy; Jamaine Drakes. All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>