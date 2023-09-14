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
        <h1 class="my-5">Update Product</h1>
        <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
            <?php foreach ($product as $product) : ?>
                <?php
                $hidden = array('id' => $product['id']);
                echo form_open("admin_panel/update_product", '', $hidden); ?>
                <div class="col">
                    <label for="inputName4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" id="inputName4">
                </div>
                <div class="col">
                    <label for="inputDescription4" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $product['description'] ?>" id="inputDescription4">
                </div>
                <div class="col">
                    <label for="inputPrice4" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value=<?php echo $product['price'] ?> id="inputPrice4">
                </div>
                <div class="col-3 mt-4">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close(); ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>