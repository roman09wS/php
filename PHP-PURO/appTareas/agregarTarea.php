<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=apptarea','root','');
} catch (PDOException $e) {
    echo "Error de conexion".$e->getMessage();
}

if (isset($_POST['agregarTarea'])) {
    $tarea = $_POST['tarea'];
    $sql = 'INSERT INTO tarea (tarea) VALUES(?)';
    $sentencia = $conn->prepare($sql); // prepara la insercion 
    $sentencia->execute([$tarea]); //execute -> remplaza el signo de interrogacion
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM tarea WHERE id=?';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $estado = (isset($_POST['estado']))?1:0;
    $sql = 'UPDATE tarea SET estado = ? WHERE id = ?';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$estado,$id]);
}
$sql = "SELECT * FROM tarea";
$resultado = $conn->query($sql);
?>