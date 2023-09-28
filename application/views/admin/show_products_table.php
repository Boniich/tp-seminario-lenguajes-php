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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row"><?php echo $product['id']; ?></th>
                    <td><?php echo $product['name']; ?> </td>
                    <td><?php echo $product['price']; ?></td>
                    <td><a href="<?php echo site_url("update_form/{$product['id']}"); ?>">Actualizar Registro</a></td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteProduct" data-id="<?php echo $product['id']; ?>">
                            Delete
                        </a></td>
                    <?php echo form_close(); ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php echo $links; ?>
    </div>
    <div class="modal" id="deleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this product?
                </div>
                <div class="modal-footer">
                    <!-- <?php print_r($id); ?> -->
                    <a type="button" class="btn btn-danger" href="#" id="eliminarProducto">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var modal = document.getElementById('deleteProduct');
    var deleteProduct = document.getElementById('eliminarProducto');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        let id = button.getAttribute('data-id');
        let newURL = '<?php echo site_url('admin_panel/delete_product/'); ?>' + id;
        deleteProduct.setAttribute('href', newURL);
    });
</script>