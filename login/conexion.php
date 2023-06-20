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
        header('Location: ../tienda/index.php');
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Error en el nombre o contraseña VERIFIQUE DE NUEVO</div>';
    }
}

if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    try {
        $sql = $conexion->query("INSERT INTO usuarios (nombre,contrasena,email) VALUES ('$nombre','$pass','$email') ");
        echo '<div class="alert alert-primary" role="alert">Registrado con éxito!</div>';
        echo '<a class="btn btn-outline-primary" href="index.php">Iniciar sesion</a>';
    } catch (mysqli_sql_exception $th) {
        echo '<div class="alert alert-danger" role="alert">Error ya existe ese correo</div>';
    }
}

if (isset($_POST['btn_restablecer'])) {
    $contrasena1 = $_POST['contrasena1'];
    $contrasena2 = $_POST['contrasena2'];
    if ($contrasena1 == $contrasena2) {
        $email = $_POST['email'];
        $nvContrasena = $_REQUEST['contrasena1'];
        $sql = $conexion->query("UPDATE usuarios SET contrasena = '$nvContrasena' WHERE email LIKE '%$email%' ");
        echo '<div class="alert alert-primary" role="alert">Contraseña actualizada exitosamente!</div>';
        echo '<a class="btn btn-outline-primary" href="index.php">Iniciar sesion</a>';
    } else {
        echo '<div class="alert alert-primary" role="alert">Las contraseñas no coinciden!</div>';
    }
}
?>