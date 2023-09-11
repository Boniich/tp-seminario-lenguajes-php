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

        <?php foreach ($products as $product) : ?>
            <div>
                <p>id: <?php echo $product['id']; ?> </p>
                <p>Name: <?php echo $product['name']; ?> </p>
                <p>Description: <?php echo $product['description']; ?></p>
                <p>Price: <?php echo $product['price']; ?></p>
                <a href="<?php echo site_url("update_form/{$product['id']}"); ?>">Actualizar Registro</a><br> <!--Funciona -->
                <a href="<?php echo site_url("delete_product/{$product['id']}"); ?>">Eliminar Registro</a> <!--Funciona -->
                <br><br><br>
                <?php echo form_close(); ?>
            </div>
        <?php endforeach; ?>


</body>

</html>