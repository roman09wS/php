<?php 
include_once("conexionBD.php"); 
if(isset($_POST['ini']) and isset($_POST['fin'])){
    $inicio=($_POST['ini']);
    $final=($_POST['fin']);
}else{
    $inicio=date('Y-m-d');
    $final=date('Y-m-d');
}
?>
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
                        <h1 class="display-2">Reporte ventas</h1>
                    </div>
                    <form action="" method="post">
                        <div class="input-group mt-4 mb-4">
                            <input type="date" class="form-control " name="ini" value="<?php echo $inicio;?>"/>
                            <input type="date" class="form-control " name="fin" value="<?php echo $final;?>"/>
                            <button type="submit" name="btn_buscarVenta" class="btn btn-outline-success">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($_POST['ini']) and isset($_POST['fin'])) { 
                $ini=($_POST['ini']);
                $fin=($_POST['fin']);
                $consulta=$conexion->query("SELECT * FROM ventas WHERE fecha BETWEEN '$ini' and '$fin' ");
                $recaudo = $conexion->query("SELECT SUM(total) AS total FROM ventas WHERE estado = 'ACTIVO' AND fecha BETWEEN '$ini' and '$fin' ");
            }else{
                $consulta = $conexion->query("SELECT * FROM ventas");
                $recaudo = $conexion->query("SELECT SUM(total) AS total FROM ventas WHERE estado = 'ACTIVO' ");
            }?>

                <div class="container" <?php echo( (isset($_GET['idAnular'])) || (isset($_GET['idActivar'])) )? 'hidden' : '' ;?>>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Total recaudado: <?php
                            $col=$recaudo->fetch_array();
                            $total_recolectado = number_format($col['total'],2,',','.');
                            print_r($total_recolectado);
                            ?></h3>
                        </div>
                        <div class="col-12 mt-4">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <?php while ($row=$consulta->fetch_array()) { ?>
                                    <tr>
                                        <th><?php echo $row['producto'];?></th>
                                        <td><?php echo $row['cantidad'];?></td>
                                        <td><?php echo $row['total'];?></td>
                                        <td><?php echo $row['fecha'];?></td>
                                        <td><?php echo $row['estado'];?></td>
                                        <?php
                                        if ($row['estado'] == 'ACTIVO') { ?>
                                            <td>
                                                <a class="btn btn-outline-danger" onChange="this.form.submit()" href="?idAnular=<?php echo $row['id_ventas'];?>" name="anular">
                                                <i class="icon-edit">Anular</i></a>
                                            </td>
                                        <?php }else { ?>
                                            <td>
                                                <a class="btn btn-outline-success" onChange="this.form.submit()" href="?idActivar=<?php echo $row['id_ventas'];?>" name="activar">
                                                <i class="icon-edit">Activar</i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-2 d-grid mx-auto mt-4">
                    <a href="index.php" rel="noopener noreferrer"><button type="submit" id="alertP" name="" class="btn btn-outline-success">Volver a inicio</button></a>
                </div>

        <?php
        if (isset($_GET['idAnular'])) {
            $id_ventas = $_GET['idAnular'];
            $sql = $conexion->query("SELECT * FROM ventas WHERE id_ventas = $id_ventas");
            $row = $sql->fetch_array();

            $conexion->query("UPDATE ventas SET estado = 'INACTIVO' WHERE id_ventas = $id_ventas");

            $cantidad = (int) $row['cantidad'];
            $producto = $row['producto'];
            $conexion->query("UPDATE producto SET cantidad = cantidad - $cantidad WHERE nombre LIKE '%$producto%' ");
            echo '<div class="alert alert-success" role="alert">Cambio guardado con éxito!</div>';

        }elseif (isset($_GET['idActivar'])) {
            $id_ventas = $_GET['idActivar'];
            $sql = $conexion->query("SELECT * FROM ventas WHERE id_ventas = $id_ventas");
            $row = $sql->fetch_array();
            
            $conexion->query("UPDATE ventas SET estado = 'ACTIVO' WHERE id_ventas = $id_ventas");

            $cantidad = (int) $row['cantidad'];
            $producto = $row['producto'];
            $conexion->query("UPDATE producto SET cantidad = cantidad + $cantidad WHERE nombre LIKE '%$producto%' ");
            echo '<div class="alert alert-success" role="alert">Cambio guardado con éxito!</div>';

        }
        ?>
    </main>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>



