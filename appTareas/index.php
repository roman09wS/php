<?php include ("agregarTarea.php"); ?>
<!doctype html>
<html lang="en">

<head>
  <title>App de Tareas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="img/icono.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
  </header>
  <main class="container mt-5">
    <div class="card">
        <div class="card-header">Lista de tareas</div>

        <div class="card-body">
            <div class="mb-3">
                <form action="" method="post">
                    <label for="tarea" class="form-label">Tarea:</label>
                    <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="helpId" placeholder="Agregue el nombre de la tarea">
                    <input name="agregarTarea" id="agregarTarea" class="btn btn-primary mt-4" type="submit" value="Agregar Tarea">
                </form>
            </div>
            <ul class="list-group">
                <?php foreach ($resultado as $tareas) { ?>
                    <li class="list-group-item">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $tareas['id'];?>">
                            <input class="form-check-input float-start"
                            type="checkbox" 
                            value="<?php echo $tareas['estado'];?>" 
                            id=""
                            name="estado"
                            onChange="this.form.submit()"
                            <?php echo($tareas['estado'] == 1)?'checked':''; ?> >
                        </form>
                        <span 
                            class="float-start ms-2 <?php echo($tareas['estado'] == 1)?'text-decoration-line-through':'';?>">
                            <?php echo $tareas['tarea']?>
                        </span>
                        <h6>
                            <a href="?id=<?php echo $tareas['id']?>"><span class="badge bg-danger float-start ms-2">x</span></a>
                        </h6>
                        <!-- text-decoration-line-through -->
                    </li>
                <?php }?>                
            </ul>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
  </main>
  <footer>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>