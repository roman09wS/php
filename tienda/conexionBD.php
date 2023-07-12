<?php

$conexion = new mysqli("localhost", "root", "", "tienda");

if (isset($_POST['btn_Producto'])) {
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcionP'];
    $costo = (float) $_POST['costoP'];
    $precio = (int) $_POST['pvp'];
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






    



  
?>