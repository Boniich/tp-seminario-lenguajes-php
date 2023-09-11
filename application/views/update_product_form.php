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
        <h1>This is the dashboard</h1>

        <?php foreach ($product as $product) : ?>


            <?php
            $hidden = array('id' => $product['id']);
            echo form_open("dashboard/update_product", '', $hidden); ?>
            <h2>Update product #<?php echo $product['id']; ?></h2>
            <div class="col-xl-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">description</label>
                <input type="text" name="description" class="form-control" value="<?php echo $product['description'] ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" name="price" class="form-control" value=<?php echo $product['price'] ?>>
            </div>
            <div class="col-3">
                <button type="submit" name="submit" class="btn btn-primary">Actualizando</button>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach; ?>
</body>

</html>