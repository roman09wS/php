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
                        <h1 class="display-2">Proveedores</h1>
                    </div>
                    <form action="" method="post">
                        <div class="input-group mt-4 mb-4">
                            <input type="search" class="form-control rounded" name="buscarProveedor" placeholder="Digite el nombre del proveedor" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" name="btn_buscarProveedor" class="btn btn-outline-success">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($_POST['buscarProveedor'])) { 
                $proveedor = $_POST['buscarProveedor'];
                $consultaProveedor=$conexion->query("SELECT * FROM proveedor WHERE nombre LIKE '%$proveedor%' ORDER BY nombre DESC");
            }else{
                $consultaProveedor=$conexion->query("SELECT * FROM proveedor");
            }?>


                <div class="container"<?php echo( (isset($_GET['idEditarProv'])) )? 'hidden' : '' ;?>>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <?php
                                while ($row=$consultaProveedor->fetch_array()) { 
                                ?>
                                <form action="" method="post">
                                    <tr>
                                        <th><?php echo $row['nombre'];?></th>
                                        <td><?php echo $row['ubicacion'];?></td>
                                        <td><?php echo $row['telefono'];?></td>
                                        <td>
                                            <a class="btn btn-outline-success" onChange="this.form.submit()" href="?idEditarProv=<?php echo $row['id_proveedor'] ?>">
                                            <i class="icon-edit">Editar</i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                                        </td>
                                    </tr>
                                </form>
        
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar proveedor</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar a <?php echo $row['nombre'];?>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-outline-danger" onChange="this.form.submit()" href="?idEliminarProv=<?php echo $row['id_proveedor'] ?>" title="Eliminar"><i class="icon-edit">Confirmar</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                </tbody>
                            </table>
                            <div class="col-2 d-grid mx-auto mt-4">
                                <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                            </div>
                        </div>
                    </div>
                </div>



        <?php if (isset($_GET['idEditarProv'])) {
            $sql = "SELECT * FROM producto";
            $resultado = $conexion->query($sql); 
            $id_proveedor = (int)  $_GET['idEditarProv'];
            $proveedor = $conexion->query("SELECT * FROM proveedor WHERE id_proveedor = $id_proveedor");
            while ($columna = $proveedor->fetch_array()) { ?>
            <div class="container">
                <form action="" method="post" class="row">
                    <div class="col-6 mb-4">
                        <label for="" class="form-label"><b>Nombre: </b></label>
                        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="<?php echo $columna['nombre'];?>" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Producto</label>
                        <select class="form-select form-select-lg" name="prodSelect" id="" required>
                            <option value="">Seleccione un producto</option>
                            <?php foreach ($resultado as $productos) { ?>
                            <option value="<?php echo $productos['nombre']?>"><?php echo $productos['nombre'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" name="ubicacion" id="" aria-describedby="helpId" placeholder="<?php echo $columna['ubicacion'];?>" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder="<?php echo $columna['telefono'];?>" required>
                    </div>

                    <div class="col-2 d-grid mx-auto mt-4">
                        <button type="submit" id="alertP" name="btn_ActualizarProv" class="btn btn-outline-success">Actualizar</button>
                    </div>
                </form>
                <div class="col-12 d-grid mx-auto mt-4">
                    <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                </div>
            </div>
            <?php } ?>
        
        <?php }?>

    <?php
    if (isset($_GET['idEliminarProv'])) {
    $id_proveedor = (int) $_GET['idEliminarProv'];
    $conexion->query("DELETE FROM proveedor WHERE id_proveedor = $id_proveedor");
    echo '<div class="alert alert-success" role="alert">Eliminado con éxito!</div>';
    }

    if (isset($_POST['btn_ActualizarProv'])) {
    $id_proveedor = (int) $_GET['idEditarProv'];
    $nombre = $_POST['nombre'];
    $producto = $_POST['prodSelect'];
    $ubicacion = $_POST['ubicacion'];
    $telefono = $_POST['telefono'];
    $conexion->query("UPDATE proveedor SET nombre = '$nombre',producto = '$producto' ,ubicacion = '$ubicacion',telefono = '$telefono' WHERE id_proveedor = $id_proveedor");
    echo '<div class="alert alert-success" role="alert">Actualizado con éxito!</div>';
    }

    ?>
    </main>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>