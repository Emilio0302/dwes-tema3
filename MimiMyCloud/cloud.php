<?php 
// Creamos un array para guaradar los ficheros y otro array para guardar las imagenes
$todosFicheros = scandir('./ficheros');
    $extensionImagenes = ['jpeg', 'gif', 'png'];
    $ficherosPdf = [];
    $imagenes = [];
    if ($todosFicheros !== false) {
        foreach ($todosFicheros as $fic) {
            $extension = pathinfo($fic, PATHINFO_EXTENSION);
            if ($extension == 'pdf') {
                $ficherosPdf[] = "$fic";
            } elseif (in_array($extension, $extensionImagenes)) {
                $imagenes[] = "$fic";
            }
        }
    }
?>
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
            <li><a href="index.php?idioma=<?= $idioma?>"><?=getCadena("inicio")?></a></li>
            <li><a href="subir.php?idioma=<?= $idioma?>"><?=getCadena("subir")?></a></li>
            <li><strong><a href="cloud.php?idioma=<?= $idioma?>"><?=getCadena("ficheros")?></a></strong></li>
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
    <h1><?=getCadena('tusFicheros')?> </h1>    
        <?php
        /*Comprobamos si hay algun fichero pdf y si hay un fichero lo mostramos con una lista y si no hay fichero mostramos 
        un mensaje de que no existe ningun fichero*/
            if ($ficherosPdf) {
                echo "<ul>";
                foreach ($ficherosPdf as $fic) {
                    $destinoFichero = "./ficheros/" . $fic;
                    echo "<li><a href='$destinoFichero' download>$fic</a></li>\n";
                }
                echo "</ul>";
            } else {
                echo getCadena('noHayFicheros');
            }
        ?>
    <h1><?=getCadena('tusImagenes')?> </h1>
        <?php 
        /*Comprobamos si hay alguna imagen y si hay una imagen la mostramos y si no hay imagen mostramos 
        un mensaje de que no existe ninguna imagen*/
            if ($imagenes) {        
                foreach ($imagenes as $fic) {
                    $destinoFichero = "./ficheros/" . $fic;
                    echo "<img src='$destinoFichero' alt='imagen'";
                }
            } else {
                echo getCadena('noHayImagenes');
            }
        ?>

</body>
</html>