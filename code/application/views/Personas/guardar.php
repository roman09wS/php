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
                        'class'     => 'form-control input-lg', 
                    ];
                    echo form_input($data);
                    ?>
            </div>
            <div class="form-group">
                <label for=""><b>Genero:</b></label>
                <br>
                <?php
                    echo form_label('Masculino', 'genero');

                    $data = [
                        'name'      => 'genero',
                        'value'     => 'Masculino',
                        'class'     => 'form-check-input',
                        'checked'   => isset($genero)?true:false,
                    ];
                    echo form_radio($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    echo form_label('Femenino', 'genero');
                    if (isset($genero) && $genero == 'Femenino') {
                        $data = [
                            'name'      => 'genero',
                            'value'     => 'Femenino',
                            'class'     => 'form-check-input',
                            'checked'   => true,
                        ];
                    }else{
                        $data = [
                            'name'      => 'genero',
                            'value'     => 'Femenino',
                            'class'     => 'form-check-input',
                            'checked'   => false,
                        ];
                    }
                    echo form_radio($data);
                    ?>
            </div>
            <div class="form-group">
                <?php
                    $options = [
                    '' => 'Seleccione su estado',
                    'soltero'  => 'Soltero(contento)',
                    'casado'    => 'Casado(triste)',
                    'viudo'  => 'Viudo(contento)',
                    ];

                    echo form_dropdown('estado_civil', $options);
                   
                ?>
            </div>
            <div class="form-group">
                <h2 class="">Habilidades:</h2>
                <label for="">PHP</label>
                <?php
                    $data = [
                        'name'    => 'php',
                        'value'   => 'si sabe',
                        'class'   => 'form-check-input',
                    ];

                    echo form_checkbox($data);
                ?>
                <label for="">HTML</label>
                <?php
                    $data = [
                        'name'    => 'html',
                        'value'   => 'si sabe',
                        'class'   => 'form-check-input',
                    ];

                    echo form_checkbox($data);
                ?>
                <label for="">Python</label>
                <?php
                    $data = [
                        'name'    => 'python',
                        'value'   => 'si sabe',
                        'class'   => 'form-check-input',
                    ];

                    echo form_checkbox($data);
                ?>
                <label for="">AWS</label>
                <?php
                    $data = [
                        'name'    => 'aws',
                        'value'   => 'si sabe',
                        'class'   => 'form-check-input',
                    ];

                    echo form_checkbox($data);
                ?>
            </div>
            <a href=""></a>
            <?php
            $data = array(
            'name'          => 'mysubmit',
            'id'            => 'boton',
            'type'          => 'submit',
            'class'         => 'btn btn-outline-dark',
            'content'       => 'Enviar!'
            );

            echo form_button($data);

            // Would produce: <button name="button" id="button" value="true" type="reset">Reset</button>
            
            
            echo form_close();?>
            
            




       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>