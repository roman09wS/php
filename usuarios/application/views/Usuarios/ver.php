<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <?php include('application/views/layouts/header.php');?>
    
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h4 class="fs-1 text-center mt-5 mb-5 font-monospace">Ver Usuario</h4>
                <img src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg" alt="" class="img-fluid">    
            </div>
        </div>
        
        
        <?php echo form_open(''); ?>
            <div class="row  text-center justify-content-center">
                <div class="col-4 ">
                    <div class="col-12">
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
                    </div>
                        
                    <div class="col-12">
                        <div class="form-group">
                            <?php
                                echo form_label('Password', 'passw');
            
                                $data = [
                                    'name'      => 'password',
                                    'type'      => 'password',
                                    'value'     => $password,
                                    'readonly'  => 'readonly',
                                    'class'     => 'form-control input-lg', 
                                ];
                                echo form_input($data);
                            ?>
                        </div>
                    </div>
    
                    <div class="col-12">    
                        <div class="form-group">
                            <?php
                                echo form_label('Correo', 'correo');
                      
                                $data = [
                                    'name'      => 'correo',
                                    'type'      => 'email',
                                    'value'     => $correo,
                                    'readonly'  => 'readonly',
                                    'class'     => 'form-control input-lg', 
                                ];
                                echo form_input($data);
                            ?>
                        </div>
                    </div>        
                </div>
            </div>
        <?= form_close(); ?>
    </div>
    <?php include('application/views/layouts/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>