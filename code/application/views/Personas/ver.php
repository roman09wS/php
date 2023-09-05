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
        <a href="/php/code/index.php/Personas/listado" class="btn btn-outline-dark mt-5 mb-5">Volver al listado</a>
        <?php echo form_open('');?>
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
                    echo form_label('Apellido', 'apellido');

                    $data = [
                        'name'      => 'apellido',
                        'value'     => $apellido,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-sm', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Edad', 'edad');

                    $data = [
                        'name'      => 'edad',
                        'type'      => 'number',
                        'value'     => $edad,
                        'readonly'  => 'readonly',
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <!-- <div class="form-group">
                <label for=""><b>Genero:</b></label>
                <br>
                <?php
                    // echo form_label('Masculino', 'genero');

                    // $data = [
                    //     'name'      => 'genero',
                    //     'value'     => 'Masculino',
                    //     'readonly'  => 'readonly',
                    //     'class'     => 'form-check-input',
                    //     'checked'   => isset($genero)?true:false,
                    // ];
                    // echo form_radio($data);
                    ?>
            </div> -->
            <div class="form-group">
                <?php
                    // echo form_label('Femenino', 'genero');
                    // if (isset($genero) && $genero == 'Femenino') {
                    //     $data = [
                    //         'name'      => 'genero',
                    //         'value'     => 'Femenino',
                    //         'readonly'  => 'readonly',
                    //         'class'     => 'form-check-input',
                    //         'checked'   => true,
                    //     ];
                    // }else{
                    //     $data = [
                    //         'name'      => 'genero',
                    //         'value'     => 'Femenino',
                    //         'class'     => 'form-check-input',
                    //         'checked'   => false,
                    //     ];
                    // }
                    // echo form_radio($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                // if (isset($estado_civil) && $estado_civil !== '') {
                //     $options = [
                //         $estado_civil => $estado_civil,
                //         'soltero'  => 'Soltero(contento)',
                //         'casado'    => 'Casado(triste)',
                //         'viudo'  => 'Viudo(contento)'
                //     ];
                // }else {
                //     $options = [
                //     '' => 'Seleccione su estado',
                //     'soltero'  => 'Soltero(contento)',
                //     'casado'    => 'Casado(triste)',
                //     'viudo'  => 'Viudo(contento)'
                //     ];
                // }
                // echo form_dropdown('estado_civil', $options);
                ?>
            </div>
            <div class="form-group">
                <!-- <h2 class="">Habilidades:</h2>
                <label for="">PHP</label> -->
                <?php
                    // if (isset($php) && $php == 'si sabe') {
                    //     $data = [
                    //         'name'    => 'php',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  true
                    //     ];
                    // }else {
                    //     $data = [
                    //         'name'    => 'php',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  false
                    //     ];
                    // }

                    // echo form_checkbox($data);
                ?>
                <!-- <label for="">HTML</label> -->
                <?php
                    // if (isset($html) && $html == 'si sabe') {
                    //     $data = [
                    //         'name'    => 'html',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  true
                    //     ];
                        
                    // }else{
                    //     $data = [
                    //         'name'    => 'html',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  false
                    //     ];
                    // }

                    // echo form_checkbox($data);
                ?>
                <!-- <label for="">Python</label> -->
                <?php
                    //  if (isset($python) && $python == 'si sabe') {
                    //     $data = [
                    //         'name'    => 'python',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  true
                    //     ];
                        
                    // }else{
                    //     $data = [
                    //         'name'    => 'python',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  false
                    //     ];
                    // }

                    // echo form_checkbox($data);
                ?>
                <!-- <label for="">AWS</label> -->
                <?php
                    //   if (isset($aws) && $aws == 'si sabe') {
                    //     $data = [
                    //         'name'    => 'aws',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  true
                    //     ];
                        
                    // }else{
                    //     $data = [
                    //         'name'    => 'aws',
                    //         'value'   => 'si sabe',
                    //         'readonly'  => 'readonly',
                    //         'class'   => 'form-check-input',
                    //         'checked' =>  false
                    //     ];
                    // }
                    // echo form_checkbox($data);
                ?>
            </div>
            <a href=""></a>
            <?php echo form_close();?>             
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>