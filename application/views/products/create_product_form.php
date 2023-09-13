<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h2 class="my-4">Create Product</h2>

        <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
            <?php echo form_open_multipart('admin_panel/create_product'); ?>
            <div class="col">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col">
                <label for="inputPassword4" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="col">
                <label for="inputPassword4" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col">
                <label for="inputEmail4" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="inputEmail4">
            </div>
            <div class="col-3 mt-4">
                <button type="submit" name="submit" class="btn btn-success">Create</button>
            </div>
            <?php echo form_close(); ?>
        </div>
</body>

</html>