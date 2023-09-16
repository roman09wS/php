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
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                    <div class="card-body p-5 text-center">

                                        <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">¡Ingrese su nombre de usuario y contraseña!</p>

                                        <form action="" method="post">
                                            <div class="form-floating text-dark mb-4">
                                                <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="ingrese su nombre o email" require>
                                                <label for="floatingInput">Usuario o Email</label>
                                            </div>
                                            <div class="form-floating text-dark mb-5">
                                                <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="contraseña" require>
                                                <label for="floatingPassword">Contraseña</label>
                                            </div>

                                            <p class="mb-3">Olvide su contraseña?<a class="mb-3 ms-2 fw-bold text-white" href="restablecer.php">Restablecer</a></p>

                                            <button class="btn btn-outline-light btn-lg px-5" name="btn_login" type="submit">Iniciar Sesion</button>
                                        </form>

                                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                            <a href="#!" class="text-white"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                        </div>

                                        </div>
                                        <form action="" method="post">
                                            <div>
                                                <p class="mb-0">No tengo una cuenta?<a class="ms-2 fw-bold btn btn-outline-light" href="registro.php">Registrarse</a></p>
                                            </div>
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
