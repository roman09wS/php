<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <ul>
        <?php foreach ($menu as $item): ?>
            <li><a href="<?= $item['url']?>"><?= $item['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>

    <?php
        echo form_open('registro/create',array('method' => 'POST'));
        echo form_label('Nombre de usuario: ');
        echo form_input('username');
        echo "<br>";
        echo "<br>";
        echo form_label('Email: ');
        echo form_input(array('type' => 'email','name' => 'email')); 
        
        
        echo "<br>";
        echo form_label('Contraseña');
        echo form_password('password');

        echo "<br>";
        echo form_label('Confirmarcion de contraseña');
        echo form_password('password_confirm');

        echo "<br>";
        echo form_submit('submit',"Enviar Datos");

        echo form_close();
    ?>

    <?= isset($msg) ? $msg : '' ?>
</body>
</html>