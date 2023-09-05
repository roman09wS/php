<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <a href="/php/products/index.php/Productos/listado" class="btn btn-outline-dark mt-5 mb-5">Volver al listado</a>
        <?php echo form_open('');?>
            <div class="form-group">
                <?php
                    echo form_label('Serial', 'serial');

                    $data = [
                        'name'      => 'serial',
                        'value'     => $serial,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-sm', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Nombre', 'nombre');

                    $data = [
                        'name'      => 'nombre',
                        'value'     => $nombre,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-sm', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Descripcion', 'descripcion');

                    $data = [
                        'name'      => 'descripcion',
                        'type'      => 'text',
                        'value'     => $descripcion,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Costo', 'costo');

                    $data = [
                        'name'      => 'costo',
                        'type'      => 'number',
                        'value'     => $costo,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Precio', 'precio');

                    $data = [
                        'name'      => 'precio',
                        'type'      => 'number',
                        'value'     => $precio,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Cantidad', 'cantidad');

                    $data = [
                        'name'      => 'cantidad',
                        'type'      => 'number',
                        'value'     => $cantidad,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
           
            <?php
            ;
            
            echo form_close();?>
            
            




       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>