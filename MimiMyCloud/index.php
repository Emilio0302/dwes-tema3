<!DOCTYPE html>

<?php
require 'lengua.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <li>MimiMyCloud</li>
            <li><strong><a href="index.php?idioma=<?= $idioma?>"><?=getCadena("inicio")?></a></strong></li>
            <li><a href="subir.php?idioma=<?= $idioma?>"><?=getCadena("subir")?></a></li>
            <li><a href="cloud.php?idioma=<?= $idioma?>"><?=getCadena("ficheros")?></a></li>
        </nav>
        <br>
        <form action="#" method="GET">
            <select name="idioma">
                <option value="es" <?php if ($idioma == 'es') { echo 'selected'; }?>>Español</option>
                <option value="en" <?php if ($idioma == 'en') { echo 'selected'; }?>>English</option>
            </select>
            <input type="submit" value="Ok">
        </form>
    </header>
    <h2><?=getCadena('bienvenida')?> </h2>
    <p><?=getCadena('administrar')?></p>
    <a href="subir.php"><input type="submit" value="<?= getCadena('boton')?>"></a>

</body>

</html>