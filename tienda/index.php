<?php 
include_once("conexionBD.php");
?>
<!doctype html>
<html lang="es">

<head>
  <title>Tienda</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="img/icono.jpg">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <div class="p-5 bg-primary text-white text-center">
        <h1>Tienda Roman</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Admin</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="btn-group-horizontal" role="group" aria-label="Vertical radio toggle button group">
                        <button name="producto" type="submit"  class="btn btn-outline-primary">Registrar producto</button>
                        <button type="submit" name="proveedor" class="btn btn-outline-primary">Registrar proveedor</button>
                        <button type="submit" name="ventas" class="btn btn-outline-primary">Reporte de ventas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['producto'])) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div class="col-md-4">    
                            
                            <label for="" class="form-label">Nombre</label>
                            <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Nombre del producto</small>
                        </div>
        
                        <div class="col-md-4">
                            
                              <label for="" class="form-label">Descripcion</label>
                              <textarea class="form-control" name="" id="" rows="3"></textarea>
                              <small id="helpId" class="form-text text-muted">Descripcion del producto</small>
                        </div>
            
                        <div class="col-md-4">    
                            
                              <label for="" class="form-label">Costo</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Costo del producto</small>
                        </div>
        
        
                        <div class="col-md-4">    
                            
                              <label for="" class="form-label">Precio</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Precio a la venta</small>
                        </div>
        
                        <div class="col-md-4">    
                            
                              <label for="" class="form-label">Cantidad</label>
                              <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Cantidad de productos</small>
                            </div>
                            
                            <div class="col-md-4">    
                                <label for="" class="form-label">Proveedor</label>
                                <select class="form-select form-select-lg" name="provSelect" id="">
                                    <option value="">Seleccione un proveedor</option>
                                    <?php 
                                foreach ($resultado as $proveedores) { ?>
                                <option value="<?php echo $proveedores['nombre'];?>"><?php echo $proveedores['nombre']; ?></option>
                                <?php }?>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
  </main>
  <footer>
    <div class="container px-5">
        <div class="text-white-50 small">
            <div class="mb-2">&copy; Winder Román 2023 || 99% LEGAL.</div>
        </div>
    </div>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
