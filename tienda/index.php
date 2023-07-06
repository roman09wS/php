<?php include_once("conexionBD.php"); ?>
<!doctype html>
<html lang="es">

<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="img/icono.jpg">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                            <button type="submit" name="ventas" class="btn btn-outline-success">Registrar venta</button>
                        </div>
                    </form>
                    <a href="registrarProveedor.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Registrar proveedor</button></a>
                    <a href="registrarProducto.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Registrar producto</button></a>
                    <a href="producto.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Productos</button></a>
                    <a href="proveedor.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Proveedores</button></a>
                    <a href="reporte.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success mt-4">Reporte ventas</button></a>
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
                    $conexion->query("INSERT INTO ventas (producto,cantidad,total) VALUES ('$nombreTemp','$cantidad',$totalTemp)");
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
        
    </main>


    <footer class="footer py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; winderoman 2023</div>
                <div class="col-lg-4 my-3 my-lg-0" >
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>