<?php
include_once("conexion.php"); 
$email = $_POST['email'];
$codigo = $_POST['codigo'];
$token = $_POST['token'];
$sql = $conexion->query("SELECT * FROM password WHERE email = '$email' AND codigo = $codigo AND token = '$token'");

echo $codigo.' '.$token.''.$email;
if (mysqli_num_rows($sql) > 0) {
    $fila = mysqli_fetch_row($sql);
    $fecha = $fila[4];
    $fecha_actual = date("Y-m-d h:m:s");
    $seconds = strtotime($fecha_actual) - strtotime($fecha);
    $minutos = $seconds / 60;
    if ($minutos > 20) {
        echo "Token vencido";
    }else {
        echo "Todo correcto";
    }
}else {
    echo "Error en el codigo";
}
?>