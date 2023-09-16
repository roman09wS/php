<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Ejercicio 1</title>
</head>
<body style="background: rgb(6,21,98);
                 background: linear-gradient(90deg, rgba(6,21,98,1) 0%, rgba(37,9,121,1) 40%, rgba(0,174,209,1) 100%);margin-top: 50px;">
            <div class = "container ">
        <div class = "row justify-content-evenly">
            <div class = "col-md-6">
                <div class="text-center">
                    <h2 class="text-light">la empresa maneja 2 precios para sus productos</h2>
                </div>
                <form action="precios.php" class="form-control" method="$_POST">
                    <div class="mb-3">
                        <label class="form-label">Cuanto vendio al mes</label>
                        <input class="form-control" type="number" name="venta">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="precioSelect" id="">
                            <option value="" selected>Seleccione un Precio</option>
                            <option value="precio1">precio1</option>
                            <option value="precio2">precio2</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>