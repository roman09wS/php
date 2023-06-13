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
</head>

<body>
    <header>
        <div class="p-5 bg-dark text-white text-center">
            <h1>Tienda Roman</h1>
        </div>
    </header>
    <main>
        <div class="container d-grid gap-2 col-6 mx-auto">
            <div class="row d-grid mx-auto mt-4">
                <div class="col-12">
                    <form action="" method="post">
                        <div class="mb-3 mt-3" role="group" aria-label="Vertical radio toggle button group">
                            <button type="submit" name="producto" class="btn btn-outline-success">Registrar producto</button>
                            <button type="submit" name="proveedor" class="btn btn-outline-success">Registrar proveedor</button>
                            <button type="submit" name="ventas" class="btn btn-outline-success">Reporte de ventas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if (isset($_POST['producto'])) { ?>
        <div class="container">
            <form action="" method="post" class="row">
                <div class="col-4 mb-4">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombreP" id="" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Nombre del producto</small>
                </div>

                <div class="col-4 mb-4">
                    <label for="" class="form-label">Descripcion</label>
                    <textarea class="form-control" name="descripcionP" id="" rows="3" required></textarea>
                    <small id="helpId" class="form-text text-muted">Descripcion del producto</small>
                </div>

                <div class="col-4 mb-4">
                        <label for="" class="form-label">Costo</label>
                    <input type="text" class="form-control" name="costoP" id="" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Costo del producto</small>
                </div>


                <div class="col-4 mb-4">
                    <label for="" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="pvp" id="" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Precio a la venta</small>
                </div>

                <div class="col-4 mb-4">
                    <label for="" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" id="" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Cantidad de productos</small>
                </div>

                <div class="col-4 mb-4">
                    <label for="" class="form-label">Proveedor</label>
                    <select class="form-select form-select-lg" name="provSelect" id="" required>
                        <option value="">Seleccione un proveedor</option>
                        <?php foreach ($resultado as $proveedores) { ?>
                        <option value="<?php echo $proveedores['nombre']?>"><?php echo $proveedores['nombre'];?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-2 d-grid mx-auto mt-4">
                    <button type="submit" name="btn_Producto" class="btn btn-outline-success">Guardar</button>
                </div>
                
            </form>
        </div>
        <?php }?>

        <?php if (isset($_POST['proveedor'])) { ?>
            
        <?php }?>

        <?php if (isset($_POST['ventas'])) { ?>
            
        <?php }?>


    </main>
    <footer>
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; Winder Román 2023 || 99% LEGAL.</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>