<?php
$conexion = new mysqli("localhost", "root", "", "gestion_user");

if (isset($_POST['btn_login'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    $sql = $conexion->query("SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasena = '$pass'");
    $row = $sql->fetch_array();
    $numeroResultado = mysqli_num_rows($sql);

    if ($numeroResultado != 0) {
        echo "BIENVENIDO ".$row['nombre'];
        echo '<div class="alert alert-success" role="alert">Eres un duro</div>';
    } else {
        echo "Error en el nombre o contraseña VERIFIQUE DE NUEVO";
    }
}

if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    $sql = $conexion->query("INSERT INTO usuarios (nombre,contrasena,email) VALUES ('$nombre','$pass','$email') ");
    echo '<div class="alert alert-success" role="alert">Registrado con éxito!</div>';
}
?>