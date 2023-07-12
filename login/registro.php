<?php include_once("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid gradient-custom">
        <div class="row">
            <div class="col-12">
                <section class="vh-100">
                    <div class="container py-5 h-100" >
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                    <div class="card-body p-5 text-center">

                                        <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Registro de usuario</h2>
                                        <p class="text-white-50 mb-5">¡Ingrese sus datos personales!</p>

                                        <form action="" method="post">
                                            <div class="form-floating text-dark mb-4">
                                                <input type="text" class="form-control" id="floatingInput" name="nombre" pattern="[A-Za-z ]+" placeholder="ingrese su nombre" required>
                                                <label for="floatingInput">Nombre de usuario</label>
                                            </div>
                                            
                                            <div class="form-floating text-dark mb-5">
                                                <input type="email" class="form-control" id="floatingPassword" name="email" placeholder="example@gmail.com" required>
                                                <label for="floatingPassword">Email</label>
                                            </div>

                                            <div class="form-floating text-dark mb-5">
                                                <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="contraseña" required>
                                                <label for="floatingPassword">Contraseña</label>
                                            </div>

                                            <button class="btn btn-outline-light btn-lg px-5" name="registro" type="submit">Registrarme</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>