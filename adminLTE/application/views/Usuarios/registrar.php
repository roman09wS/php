<!DOCTYPE html>
<html lang="es">
<head>
	<title>Bootstrap 5 Website Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		.fakeimg {
			height: 200px;
			background: #aaa;
		}
	</style>
</head>
<body >

<?php include("application/views/layouts/header.php");?>

  <div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h4 class="fs-1 text-center mt-5 mb-5 font-monospace">Registrar Usuario</h4>
            <img src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg" alt="" class="img-fluid">    
        </div>
    </div>
    
    
    <?php echo form_open(''); ?>
    <div class="row  text-center justify-content-center">
        <div class="col-4 ">

            <div class="col-12">
                <div class="form-group mt-4">
                    <?php
                    echo form_label('Nombre', 'nombre');
        
                    $data = [
                    'name'      => 'nombre',
                    'value'     => $nombre,
                    'class'     => 'form-control mb-2 mt-2 ',
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
                    'value'     =>  $password,
                    'class'     => 'form-control mb-2 mt-2',
                    ];
                    echo form_input($data);
                    ?>
                </div>
            </div>
    
            <div class="col-12">
                <div class="form-group">
                  <?php
                  echo form_label('correo', 'correo');
          
                  $data = [
                    'name'      => 'correo',
                    'type'      => 'email',
                    'value'     => $correo,
                    'class'     => 'form-control mb-2 mt-2',
                  ];
                  echo form_input($data);
                  ?>
                </div>
            </div>        
            <div class="col-12 text-center">
                <?php
                    $data = array(
                        'name'          => 'mysubmit',
                        'id'            => 'boton',
                        'type'          => 'submit',
                        'class'         => 'mt-3 btn btn-outline-dark mb-4',
                        'content'       => 'Enviar!'
                    );
    
                    echo form_button($data);
                ?>
            </div>
        </div>
        
    </div>
        <?= form_close(); ?>
  </div>
  <!--img https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg -->
  <?php include('application/views/layouts/footer.php')?>
</body>
</html>