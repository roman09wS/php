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
                <h1>Registrar producto</h1>
            </div>
        </header>
       
        <?php
        $sql = "SELECT * FROM proveedor";
        $resultado = $conexion->query($sql); 
        ?>
            
        <div class="container">
            <form action="" method="post" class="row mt-4" <?php echo( isset($_POST['btn_Producto'])? 'hidden':'' );?>>
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
                    <button type="submit" id="alertP" name="btn_Producto" class="btn btn-outline-success">Guardar</button>
                </div>
    
            </form>
            <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
        </div>

   

   
   
    </main>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>


















