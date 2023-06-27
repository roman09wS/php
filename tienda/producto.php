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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 text-center">
                        <h1 class="display-2">Productos</h1>
                    </div>
                    <form action="" method="post" <?php echo( (isset($_GET['idEditarProd'])) || (isset($_GET['idEliminarProd'])) )? 'hidden' : '' ;?>>
                        <div class="input-group mt-4 mb-4">
                            <input type="search" class="form-control rounded" name="buscarProducto" placeholder="Digite el nombre del producto" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" name="btn_buscarProducto" class="btn btn-outline-success">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($_POST['buscarProducto'])) { 
                $producto = $_POST['buscarProducto'];
                $consultaProducto=$conexion->query("SELECT * FROM producto WHERE nombre LIKE '%$producto%' ORDER BY nombre DESC");
            }else{
                $consultaProducto=$conexion->query("SELECT * FROM producto");
            }?>

                <div class="container"<?php echo( (isset($_GET['idEditarProd'])) || (isset($_GET['idEliminarProd'])) )? 'hidden' : '' ;?>>
                    <div class="row">
                        <div class="col-12 mt-4">
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
                                            <a class="btn btn-outline-danger" onChange="this.form.submit()" href="?idEliminarProd=<?php echo $row['id_producto'] ?>" name="eliminarProducto"><i class="icon-edit">Eliminar</i></a>
                                        </td>            
                                    </tr>
                                </form>
                                <?php }?>
                                </tbody>
                            </table>
                            <div class="col-2 d-grid mx-auto mt-4">
                                <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                            </div>
                        </div>
                    </div>
                </div>



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
                            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" value="<?php echo $columna['nombre'];?>">
                        </div>

                        <div class="col-4 mb-4">
                            <label for="" class="form-label" name=""><b>Descripcion: </b></label>
                            <input class="form-control" name="descripcionP" id="" rows="3" value="<?php echo $columna['descripcion'];?>"></input>
                        </div>

                        <div class="col-4 mb-4">
                            <label for="" class="form-label">Costo</label>
                            <input type="text" class="form-control" name="costo" id="" aria-describedby="helpId" value="<?php echo $columna['costo'];?>">
                        </div>

                        <div class="col-4 mb-4">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" class="form-control" name="precio" id="" aria-describedby="helpId" value="<?php echo $columna['precio'];?>">
                        </div>

                        <div class="col-4 mb-4">
                            <label for="" class="form-label">Cantidad</label>
                            <input type="text" class="form-control" name="cantidad" id="" aria-describedby="helpId" value="<?php echo $columna['cantidad'];?>">
                        </div>

                        <div class="col-4 mb-4">
                            <label for="" class="form-label">Proveedor</label>
                            <select class="form-select form-select-lg" name="provSelect" id="">
                                <option value="<?php echo $columna['proveedor']?>"><?php echo $columna['proveedor'];?></option>
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

    <?php
    if (isset($_GET['idEliminarProd'])) {
        $id_producto = (int) $_GET['idEliminarProd'];
        $conexion->query("DELETE FROM producto WHERE id_producto = $id_producto");
        echo '<div class="alert alert-success" role="alert">Eliminado con éxito!</div>';
        echo '<a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>';
    }
    
    
    
    if (isset($_POST['btn_ActualizarProd'])) {
        $id_producto = (int) $_GET['idEditarProd'];
        $nombre = $_POST['nombre'];
        $descripcionP = $_POST['descripcionP'];
        $costo = (float) $_POST['costo'];
        $precio = (float) $_POST['precio'];
        $cantidad = (int) $_POST['cantidad'];
        $proveedor = $_POST['provSelect'];
        $conexion->query("UPDATE producto SET nombre = '$nombre', descripcion = '$descripcionP', costo = $costo, precio = $precio,cantidad = $cantidad,proveedor = '$proveedor' WHERE id_producto = $id_producto");
        echo '<div class="alert alert-success" role="alert">Actualizado con éxito!</div>';
        echo '<a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>';

    }

    ?>
    </main>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>