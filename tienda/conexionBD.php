<?php

$conexion = new mysqli("localhost", "root", "", "tienda");

if (isset($_POST['btn_Producto'])) {
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcionP'];
    $costo = (float) $_POST['costoP'];
    $precio = (float) $_POST['pvp'];
    $cantidad = (int) $_POST['cantidad'];
    $proveedor = $_POST['provSelect'];
    try {
        $conexion->query("INSERT INTO producto (nombre,descripcion,costo,precio,cantidad,proveedor) VALUES ('$nombre','$descripcion',$costo,$precio,$cantidad,'$proveedor')");
        echo '<div class="alert alert-success" role="alert">Guardado con éxito!</div>';
    } catch (mysqli_sql_exception $th) {
        echo '<div class="alert alert-danger" role="alert">Error ya existe ese nombre!</div>';
    }
    // header('Location: index.php');
    // exit;
}

    
if (isset($_POST['btn_Proveedor'])) {
    $nombre = $_POST['nombreProveedor'];
    $producto = $_POST['prodSelect'];
    $ubi = $_POST['Ubicacion'];
    $cel = $_POST['telefono'];
    try {
        $conexion->query("INSERT INTO proveedor (nombre,producto,ubicacion,telefono) VALUES ('$nombre','$producto','$ubi','$cel')");
        echo '<div class="alert alert-success" role="alert">Guardado con éxito!</div>';

    } catch (mysqli_sql_exception $th) {
        echo '<div class="alert alert-danger" role="alert">Error ya existe ese numero telefonico!</div>';
    }

}

if (isset($_GET['idEliminarProd'])) {
    $id_producto = (int) $_GET['idEliminarProd'];
    $conexion->query("DELETE FROM producto WHERE id_producto = $id_producto");
    echo '<div class="alert alert-success" role="alert">Eliminado con éxito!</div>';
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
}

    



  
?>