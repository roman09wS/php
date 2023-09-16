<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<?php include("application/views/layouts/header.php");?>

    <div class="container">
        <div class="row">
            <div class="mb-5"></div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table mb-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Password</th>
                            <th scope="col">Correo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php foreach ($usuarios as $key => $user) : ?>
                        <tr>
                            <th scope="row"><?= $user->id_usuario ?></th>
                            <td><?= $user->nombre ?></td>
                            <td><?= $user->password?></td>
                            <td><?= $user->correo ?></td>
                            <td>
                                <a href="guardar/<?= $user->id_usuario ?>" class="btn btn-outline-primary"><i class="fa-solid fa-square-pen fa-xl"></i></a>
                                <a href="ver/<?= $user->id_usuario ?>" class="btn btn-outline-dark"><i class="fa-solid fa-eye"></i></a>
                                <a href="delete/<?= $user->id_usuario ?>" class="btn btn-outline-danger"><i class="fa-solid fa-circle-minus"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- <div class="row">
        <div class="mb-5"></div>
    </div>
    <div class="row">
        <div class="mb-5"></div>
    </div> -->

    <?php include("application/views/layouts/footer.php");?>
</body>
</html>
