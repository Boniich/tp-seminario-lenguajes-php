<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="my-5">Register</h1>

        <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
            <?php echo form_open('register/do_register'); ?>
            <div class="col">
                <label for="inputName4" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputName4" required>
            </div>
            <div class="col mt-2">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col mt-2">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col mt-4">
                <button type="submit" name="submit" class="btn btn-success">Sign in</button>
            </div>
            <?php echo form_close(); ?>
            <p class="text-danger text-center fs-4 my-0">
                <?php if (isset($error_message)) {
                    echo $error_message;
                } ?></p>
        </div>
    </div>

</body>

</html>