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
            <div class="col-12">
                <a href="/php/code/index.php/Personas/guardar" class="btn btn-outline-success">Registrar persona</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Edad</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personas as $key => $persona) : ?>
                        <tr>
                            <th scope="row"><?= $persona->persona_id ?></th>
                            <td><?= $persona->nombre ?></td>
                            <td><?= $persona->apellido ?></td>
                            <td><?= $persona->edad ?></td>
                            <td>
                                <a href="/php/code/index.php/Personas/guardar/<?= $persona->persona_id?>" class="btn btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <a href="/php/code/index.php/Personas/delete/<?= $persona->persona_id?>" class="btn btn-outline-danger">Borrar</a>
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