<?php

$conexion = new mysqli("localhost", "root", "", "tienda");
$sql = "SELECT * FROM proveedor";
$resultado = $conexion->query($sql);

if (isset($_POST['btn_Producto'])) {
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcionP'];
    $costo = (float) $_POST['costoP'];
    $precio = (float) $_POST['pvp'];
    $cantidad = (int) $_POST['cantidad'];
    $proveedor = $_POST['provSelect'];
    echo "Guardado con exito";
    $conexion->query("INSERT INTO producto (nombre,descripcion,costo,precio,cantidad,proveedor) VALUES('$nombre','$descripcion','$costo','$precio','$cantidad','$proveedor',)");
}
?>