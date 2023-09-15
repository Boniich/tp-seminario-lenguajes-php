<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="my-5 bg-success w-50 p-3 rounded ">
            <h1 class="text-center text-light mb-4">Product created successfully</h1>
            <div class="d-flex justify-content-center align-items-center gap-3">
            <td><a class="btn btn-warning" href="<?php echo site_url("admin_panel"); ?>">Go to Admin Panel</a></td>
            <td><a class="btn btn-light" href="<?php echo site_url("products"); ?>">Go to products list</a></td>
            </div>
        </div>
</body>

</html>