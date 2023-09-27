<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ICHI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url("product"); ?>">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("shopping_car"); ?>">Shopping Car</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("admin_panel"); ?>">Admin Panel</a>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link" href="#">user: <?php echo $user; ?></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("logout"); ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>