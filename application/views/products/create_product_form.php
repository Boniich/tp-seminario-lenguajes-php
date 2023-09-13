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
    <div class="container">
        <h2>Create product</h2>

        <?php echo form_open_multipart('admin_panel/create_product'); ?>
        <div class="col-xl-6">
            <label for="inputEmail4" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">description</label>
            <input type="text" name="description" class="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">price</label>
            <input type="number" name="price" class="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-xl-6">
            <label for="inputEmail4" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="inputEmail4">
        </div>
        <div class="col-3">
            <button type="submit" name="submit" class="btn btn-primary">Crear producto</button>
        </div>
        <?php echo form_close(); ?>
</body>

</html>