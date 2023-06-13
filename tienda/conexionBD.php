<?php

$conexion = new mysqli("localhost", "root", "", "tienda");
$sql = "SELECT * FROM proveedor";
$resultado = $conexion->query($sql);
?>