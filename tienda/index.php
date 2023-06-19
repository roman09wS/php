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
    <header>
        <div class="p-5 bg-dark text-white text-center">
            <h1>Tienda Roman</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <form <?php echo( (isset($_REQUEST['btn_Ventas'])) )? 'hidden' : '' ;?> action="" method="post">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="submit" name="createProducto" class="btn btn-outline-success">Registrar producto</button>
                            <button type="submit" name="createProveedor" class="btn btn-outline-success">Registrar proveedor</button>
                            <button type="submit" name="ventas" class="btn btn-outline-success">Registrar venta</button>
                            <button type="submit" name="reporteVentas" class="btn btn-outline-success">Reporte ventas</button>
                            <button type="submit" name="productos" class="btn btn-outline-success">Productos</button>

                        </div>
                    </form>
                    <a href="producto.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Productos</button></a>
                    <a href="proveedor.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Proveedores</button></a>
                </div>
            </div>

            <?php if( empty($_POST) && empty($_GET) ){ ?>
                <div class="row">
                <div class="col-12 mt-4">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://sportshub.cbsistatic.com/i/2022/06/18/8676a844-505a-4819-b2e8-04331e157e81/steam-deck.png" class="d-block w-100" alt="...">
                            </div>
                            
                            <div class="carousel-item">
                                <img src="https://www.cnet.com/a/img/resize/d52d29d837b5457c8709b4bed676ff3fbe67f002/hub/2014/10/31/30d31bec-0ab0-4b48-a852-a2ae9edbad6b/hidalgo-0581-003.jpg?auto=webp&fit=crop&height=675&width=1200" class="d-block w-100" alt="...">
                            </div>
                            
                            <div class="carousel-item">
                                <img src="https://graffica.info/wp-content/uploads/2021/01/patrick-dozkVhDyvhQ-unsplash-1024x683-1200x675.jpg" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="https://www.estar.eu/wp-content/uploads/2022/08/eSTAR_TV_58A1T2_cover-1200x675.png" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="https://www.mymobileindia.com/wp-content/uploads/2022/09/Why-Are-People-Rushing-To-Get-This-Stylish-New-SmartWatch-The-Health-Benefits-Are-Incredible-copy-1200x675.webp" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php }?>
            
        </div>

        <?php if (isset($_POST['createProducto'])){ 
            $sql = "SELECT * FROM proveedor";
            $resultado = $conexion->query($sql); 
            ?>
            <div class="container fataliti">
                <form action="" method="post" class="row mt-4">
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
            </div>
        <?php }?>

        <?php if (isset($_POST['createProveedor'])) { 
            $sql = "SELECT * FROM producto";
            $resultado = $conexion->query($sql);    
            ?>
            <div class="container">
                <form action="" method="post" class="row mt-4">
                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombreProveedor" id="" aria-describedby="helpId" placeholder="" required>
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
                        <input type="text" class="form-control" name="Ubicacion" id="" aria-describedby="helpId" placeholder="" required>
                        <small id="helpId" class="form-text text-muted">bajo el puente,etc</small>
                    </div>

                    <div class="col-6 mb-4">
                            <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder="" required>
                        <small id="helpId" class="form-text text-muted">telefono del perro</small>
                    </div>

                    <div class="col-2 d-grid mx-auto mt-4">
                        <button type="submit" id="alertP" name="btn_Proveedor" class="btn btn-outline-success">Guardar</button>
                    </div>
                </form>
            </div>
        <?php }?>

        <?php if (isset($_POST['ventas'])) { 
            $sql = "SELECT * FROM producto";
            $resultado = $conexion->query($sql);
            ?>
            <div class="container">
                <form action="" method="$_GET" class="row">
                    <div class="col-12 mb-4">
                        <label for=""  class="form-label">Seleccione el producto a vender</label>
                        <select <?php echo (isset($_GET['prodSelect'])) ?'disabled':'';?> class="form-select form-select-lg" name="prodSelect" id="" required onChange="this.form.submit()">
                            <option value="">Seleccione un producto</option>
                            <?php foreach ($resultado as $producto) { ?>
                            <option value="<?php echo $producto['id_producto'];?>"><?php echo $producto['nombre'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
        <?php }?>

        <?php if (isset($_GET['prodSelect'])) { 
            $id_producto = (int)  $_GET['prodSelect'];
            $producto = $conexion->query("SELECT * FROM producto WHERE id_producto = $id_producto");
            while ($columna = $producto->fetch_array()) { ?>
            <div class="container">
                <form <?php echo( (isset($_REQUEST['btn_Ventas'])) )? 'hidden' : '' ;?> action="" method="post" class="row">
                    <div class="col-12 mb-4">
                        <label for=""  class="form-label">Seleccione el producto a vender</label>
                        <select class="form-select form-select-lg" disabled>
                            <option value="">Seleccione un producto</option>
                        </select>
                    </div>
                    
                    <div class="col-6 mb-4">
                        <label for="" class="form-label"><b>Nombre: </b><?php echo $columna['nombre'];?></label>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="" class="form-label" name=""><b>Precio: </b><?php echo $columna['precio'];?></label>
                    </div>
                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" name="Cantidad" id="" aria-describedby="helpId" placeholder="" required>
                        <small id="helpId" class="form-text text-muted">Cantidad de <?php echo $columna['nombre'];?></small>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Dinero recibido</label>
                        <input type="text" class="form-control" name="Pago" id="" aria-describedby="helpId" placeholder="" required>
                        <small id="helpId" class="form-text text-muted">Con cuanto va a pagar</small>
                    </div>
                    <div class="col-2 d-grid mx-auto mt-4">
                        <button type="submit" id="alertP" name="btn_Ventas" class="btn btn-outline-success">Guardar</button>
                    </div>
                </form>
            </div>
            <?php } ?>
        
        <?php }?>

        <?php if (isset($_REQUEST['btn_Ventas'])) {
                
                $id_producto = (int) $_GET['prodSelect'];
                $cantidad = (int) $_REQUEST['Cantidad'];
                $dineroRecibido = (float) $_REQUEST['Pago'];
                
                $productoTemp = $conexion->query("SELECT * FROM producto WHERE id_producto = $id_producto");
                $row = $productoTemp->fetch_array();
                
                $stockTemp = $row['cantidad'];

                $precioTemp = (float) $row['precio'];
                $nombreTemp = $row['nombre'];
                $totalTemp = $precioTemp * $cantidad;
                $cambioTemp = $dineroRecibido - $totalTemp;

                if ($dineroRecibido >= $totalTemp && $cantidad <= $stockTemp) {
                    $conexion->query("INSERT INTO ventas (producto,cantidad,total) VALUES ('$nombreTemp','$cantidad','$totalTemp')");
                    $conexion->query("UPDATE producto SET cantidad = (cantidad - $cantidad) WHERE id_producto = $id_producto");
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 text-center">
                                    <h1 class="display-2">Factura</h1>
                                </div>
            
                                <table class="table">
                                    <thead class="table-success">
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Total a pagar</th>
                                        <th scope="col">Cambio</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                    <tr>
                                        <th><?php echo $row['nombre'];?></th>
                                        <td><?php echo $cantidad;?></td>
                                        <td><?php echo $precioTemp;?></td>
                                        <td><?php echo $totalTemp;?></td>
                                        <td><?php echo $cambioTemp;?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-2 d-grid mx-auto mt-4">
                                <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="col-2 d-grid mx-auto mt-4">
                        <div class="alert alert-danger" role="alert">
                            No tienes dinero suficiente! O la cantidad ingresada supera el stock del producto!
                        </div>
                        <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                    </div>
                    <?php
                }
                
            }
        ?>

        <?php if (isset($_REQUEST['reporteVentas'])) { 
            $reporte = $conexion->query("SELECT * FROM ventas");
            $row = $reporte->fetch_array();
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 text-center">
                            <h1 class="display-2">Reporte Ventas</h1>
                        </div>

                        <table class="table table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php while ($row=$reporte->fetch_array()) { ?>
                                    <tr>
                                        <th><?php echo $row['producto'];?></th>
                                        <td><?php echo $row['cantidad'];?></td>
                                        <td><?php echo $row['total'];?></td>
                                        <td><?php echo $row['fecha'];?></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isset($_REQUEST['productos'])) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 text-center">
                            <h1 class="display-2">Productos</h1>
                        </div>
                        
                        <form action="" method="post">
                            <div class="input-group mt-4 mb-4">
                                <input type="search" class="form-control rounded" name="buscarProducto" placeholder="Digite el nombre del producto" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" name="btn_buscarProducto" class="btn btn-outline-success">Buscar</button>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Proveedor</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if ( isset($_POST['btn_buscarProducto']) ) {
                                    $producto = $_POST['buscarProducto'];
                                    $consultaProducto=$conexion->query("SELECT * FROM producto WHERE nombre LIKE '%$producto%' ORDER BY nombre DESC");
                                } else {
                                    $consultaProducto=$conexion->query("SELECT * FROM producto");
                                }

                                 while ($row=$consultaProducto->fetch_array()) { 
                                ?>
                                <form action="" method="post">
                                    <tr>
                                        <th><?php echo $row['nombre'];?></th>
                                        <td><?php echo $row['descripcion'];?></td>
                                        <td><?php echo $row['costo'];?></td>
                                        <td><?php echo $row['precio'];?></td>
                                        <td><?php echo $row['cantidad'];?></td>
                                        <td><?php echo $row['proveedor'];?></td>
                                        <td>
                                            <a class="btn btn-outline-success" onChange="this.form.submit()" href="?idEditarProd=<?php echo $row['id_producto'] ?>" name="editarProducto">
                                            <i class="icon-edit">Editar</i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>

                                        </td>            
                                    </tr>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar proveedor</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar <?php echo $row['nombre'];?>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-outline-danger" onChange="this.form.submit()" href="?idEliminarProd=<?php echo $row['id_producto'] ?>" name="eliminarProducto"><i class="icon-edit">Confirmar</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php }?>
            
        <?php if (isset($_GET['idEditarProd'])) { 
            $sql = "SELECT * FROM proveedor";
            $resultado = $conexion->query($sql); 
            $id_producto = (int)  $_GET['idEditarProd'];
            $producto = $conexion->query("SELECT * FROM producto WHERE id_producto = $id_producto");
            while ($columna = $producto->fetch_array()) { ?>
            <div class="container">
                <form <?php echo( (isset($_POST['btn_ActualizarProd'])) )? 'hidden' : '' ;?> action="" method="post" class="row">
                    <div class="col-4 mb-4">
                        <label for="" class="form-label"><b>Nombre: </b></label>
                        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="<?php echo $columna['nombre'];?>" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="" class="form-label" name=""><b>Descripcion: </b></label>
                        <textarea class="form-control" name="descripcionP" id="" rows="3" placeholder="<?php echo $columna['descripcion'];?>" required></textarea>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="" class="form-label">Costo</label>
                        <input type="text" class="form-control" name="costo" id="" aria-describedby="helpId" placeholder="<?php echo $columna['costo'];?>" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="" class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" id="" aria-describedby="helpId" placeholder="<?php echo $columna['precio'];?>" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad" id="" aria-describedby="helpId" placeholder="<?php echo $columna['cantidad'];?>" required>
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
                        <button type="submit" id="alertP" name="btn_ActualizarProd" class="btn btn-outline-success">Actualizar</button>
                    </div>
                </form>
            </div>
            <?php } ?>
        
        <?php }?>
        
        
        
    </main>


    <footer>
        <div class="mt-5 p-4 bg-dark text-white text-center">
            <div class="mb-2">&copy; Winder Román 2023 || 99% LEGAL.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>