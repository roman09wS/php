<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="formulario_dos.php" class="form-select" method="$_POST">
                    Edad: <input class="form-control" type="number" name="edad">
                    <select class="form-select" name="lenguaje" id="">
                        <option value="" selected>Seleccione un lenguaje</option>
                        <option value="php">PHP</option>
                        <option value="java">JAVA</option>
                        <option value="javaScript">javaScript</option>
                    </select>
                <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>