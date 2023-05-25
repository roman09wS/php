<?php
    if (isset($_REQUEST['submit'])) {
        echo "Nombre: " . $_REQUEST['nombre'] . "<br>";
        echo "Apellido: " . $_REQUEST['apellido'] . "<br>";
    }
?>

<form action="" method="post">
    <p>Nombre <input type="text" name="nombre"></p>
    <p>Apellido <input type="text" name="apellido"></p>
    <input type="submit" name="submit" value="Enviar" >
</form>