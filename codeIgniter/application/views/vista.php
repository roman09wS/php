<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HolaMundo</title>
</head>
<body>
    <h2><?= $titulo ?></h2>
    <ul>
        <?php foreach ($animals as $ani): ?>
            <li><?= $ani?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>