<?php
$conexion = new mysqli("localhost", "root", "", "gestion_user");

if (isset($_POST['btn_login'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    $sql = $conexion->query("SELECT * FROM usuarios WHERE (nombre = '$nombre' OR email = '$nombre')");
    $row = $sql->fetch_array();
    $numeroResultado = mysqli_num_rows($sql);

    if ($numeroResultado != 0 && password_verify($pass, $row['contrasena'])) {
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
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT); #encriptar password
    $email = $_POST['email'];
    if (!is_string($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert">Error en el Email</div>';
    }else{
        try {
            $sql = $conexion->query("INSERT INTO usuarios (nombre,contrasena,email) VALUES ('$nombre','$hashedPass','$email') ");
            echo '<div class="alert alert-primary" role="alert">Registrado con éxito!</div>';
            echo '<a class="btn btn-outline-primary" href="index.php">Iniciar sesion</a>';
        } catch (mysqli_sql_exception $th) {
            echo '<div class="alert alert-danger" role="alert">Error ya existe ese correo</div>';
        }
    }
}

if (isset($_POST['btn_restablecer'])) {
    $contrasena1 = $_POST['contrasena1'];
    $contrasena2 = $_POST['contrasena2'];
    if ($contrasena1 == $contrasena2) {
        $contraEncriptada = password_hash($contrasena1, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $sql = $conexion->query("UPDATE usuarios SET contrasena = '$contraEncriptada' WHERE email LIKE '%$email%' ");
        header('Location: ../login/index.php');
        exit;
    } else {
        echo '<div class="alert alert-primary" role="alert">Las contraseñas no coinciden!</div>';
    }
}
?>