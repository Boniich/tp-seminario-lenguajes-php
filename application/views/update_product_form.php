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
    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre mi</a>
                        </li>
                        <li class="nav-item">
                            <!-- <p class="nav-link" href="#">user email: <?php echo $user; ?></p> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>This is the dashboard</h1>

        <?php foreach ($product as $product) : ?>

            <?php echo form_open('dashboard/update_product'); ?>
            <h2>Update product #<?php echo $product['id']; ?></h2>
            <div class="col-xl-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4" value=<?php echo $product['name']; ?>>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">description</label>
                <input type="text" name="description" class="password" class="form-control" id="inputPassword4" value=<?php echo $product['description'] ?>>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" name="price" class="password" class="form-control" id="inputPassword4" value=<?php echo $product['price'] ?>>
            </div>
            <div class="col-3">
                <button type="submit" name="submit" class="btn btn-primary">Actualizando</button>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach; ?>
</body>

</html>