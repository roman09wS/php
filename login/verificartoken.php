<?php
include_once("conexion.php"); 
$email = $_POST['email'];
$codigo = $_POST['codigo'];
$token = $_POST['token'];
$sql = $conexion->query("SELECT * FROM password WHERE email = $email AND codigo = $codigo AND token = $token");
?>