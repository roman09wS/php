<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtener datos de API</title>
</head>
<body>
    <?php
    $ch = curl_init(); //inicializa una nueva sesion de curl
    for ($i = 1; $i <= 9; $i++) { 
        $url = 'https://pokeapi.co/api/v2/pokemon/'.$i.'';        
        curl_setopt($ch,CURLOPT_URL,$url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);           #lo que estas lineas de code, hace es validar
                                                                # que la api se conecte correctamente
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            echo "Error al conectarse a la API";
        } else {
            curl_close($ch);
            $pokemon_data = json_decode($response,true);

            echo '<h1>'.$pokemon_data['name'].'<h1>';
            ?>
            <img src="<?php echo $pokemon_data['sprites']['front_default'];?>" alt="">
            <ul>
                <li><strong>Nombre: </strong><?php echo $pokemon_data['name']; ?></li>
                <li><strong>Altura: </strong><?php echo $pokemon_data['height']; ?></li>
                <li><strong>Anchura: </strong><?php echo $pokemon_data['weight']; ?></li>

                <li><strong>Habilidades: </strong></li>
                <ul>
                    <?php
                    foreach ($pokemon_data['abilities'] as $ability){ ?>
                        <li><?php echo $ability['ability']['name'];?></li>
                    <?php } ?>
                </ul>
            </ul>
        <?php } 
    } ?>
</body>
</html>