<?php
    $edad = $_REQUEST['edad'];
    $lenguaje = $_REQUEST['lenguaje'];
    echo "<i>La edad es: <i>",$edad,"<br>";
    echo "Este es el lenguaje: ",$lenguaje,"<br>";

    if ($edad>=18) {
        echo "ud es mayor de de edad ",$edad;
    }else{
        echo "ud es menor de de edad ",$edad;
    }
?>