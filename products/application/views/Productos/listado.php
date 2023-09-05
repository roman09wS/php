<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <a href="/php/products/index.php/Productos/guardar" class="btn btn-outline-success">Registrar producto</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">costo</th>
                            <th scope="col">precio</th>
                            <th scope="col">cantidad</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personas as $key => $producto) : ?>
                        <tr>
                            <th scope="row"><?= $producto->serial ?></th>
                            <td><?= $producto->nombre ?></td>
                            <td><?= $producto->descripcion ?></td>
                            <td><?= $producto->costo ?></td>
                            <td><?= $producto->precio ?></td>
                            <td><?= $producto->cantidad ?></td>
                            <td>
                                <a href="guardar/<?= $producto->serial ?>" class="btn btn-outline-primary">Editar</a>
                                <a href="ver/<?= $producto->serial ?>" class="btn btn-outline-dark">Ver</a>
                                <a href="delete/<?= $producto->serial ?>" class="btn btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>