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
    <div class="container text-center my-5">
        <?php $form->start('./register', 'POST') ?>
            <div class="row mt-5">
                <div class="col-md-2 col-lg-3">
                    <?php $form->label('username', 'Username:') ?>
                </div>
                <div class="col-md-6 col-lg-4">
                    <?php $form->textInput('username', $inputClasses) ?>
                </div>
                <div class="col-md-4 col-lg-3">
                <?php $form->errors('username') ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                <?php $form->label('email', 'Email:') ?>
                </div>
                <div class="col-md-6 col-lg-4">
                    <?php $form->emailInput('email', $inputClasses) ?>
                </div>
                <div class="col-md-4 col-lg-3">
                <?php $form->errors('email') ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                <?php $form->label('password', 'Password:') ?> 
                </div>
                <div class="col-md-6 col-lg-4">
                <?php $form->passwordInput('password', $inputClasses) ?>
                </div>
                <div class=" col-md-4 col-lg-3">
                <?php $form->errors('password') ?>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-4">
                    <a href="./">Already Registered?</a>
                </div>
                <div class="col-5">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            <div class="border">
                <p>Copyright &copy; Jamaine Drakes. All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>