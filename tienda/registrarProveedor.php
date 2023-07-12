<?php include_once("conexionBD.php"); ?>
<!doctype html>
<html lang="es">

<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="img/icono.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesHD.css">
</head>

<body>
    <main>
        <header>
            <div class="p-5 bg-dark text-white text-center">
                <h1>Registrar proveedor</h1>
            </div>
        </header>
        <?php include("layouts/header.php");?>
             
        <?php
        $sql = "SELECT * FROM producto";
        $resultado = $conexion->query($sql);    
        ?>
        <div class="container">
            <form action="" method="post" class="row mt-4" <?php echo( isset($_POST['btn_Proveedor'])? 'hidden': '')?>>
                <div class="col-6 mb-4">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombreProveedor" id="" aria-describedby="helpId" placeholder="Ingrese el nombre" pattern="[A-Za-z ]+" required="required">
                    <small id="helpId" class="form-text text-muted">Nombre del proveedor</small>
                </div>

                <div class="col-6 mb-4">
                    <label for="" class="form-label">Producto</label>
                    <select class="form-select form-select-lg" name="prodSelect" id="" required>
                        <option value="">Seleccione un producto</option>
                        <?php foreach ($resultado as $producto) { ?>
                        <option value="<?php echo $producto['nombre'];?>"><?php echo $producto['nombre'];?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label for="" class="form-label">Ubicacion</label>
                    <input type="text" class="form-control" name="Ubicacion" id="" aria-describedby="helpId" placeholder="Ingrese la ubicacion" required>
                    <small id="helpId" class="form-text text-muted">direccion de donde vive</small>
                </div>

                <div class="col-6 mb-4">
                    <label for="" class="form-label">Telefono</label>
                    <input type="number" class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder="Ingrese el numero telefonico" min=0 max=9999999999 required>
                    <small id="helpId" class="form-text text-muted">número de contacto</small>
                </div>

                <div class="col-2 d-grid mx-auto mt-4">
                    <button type="submit" id="alertP" name="btn_Proveedor" class="btn btn-outline-success">Guardar</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
















