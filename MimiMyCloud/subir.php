<?php 
//Mediante estos booleanos gestionamos los errores
$extensionInvalida = false;
$nombreRepetido = false;
$nombreVacio = false;
$ficheroVacio = false;
//Este es el array de los mimeType que estan permitidos
$permitido = ["image/gif", "image/png", "image/jpeg", "application/pdf"];
if ($_POST) {
    //Saneamos el nombre del archivo
    $nombreSaneado = htmlspecialchars(trim($_POST['nombre']));
    //Validamos el nombre comprobando que no sea una cadena vacia
    if ($nombreSaneado == "") {
        $nombreVacio = true;
    }         
    //Validamos los ficheros 
    if (
        $_FILES && isset($_FILES['fichero_usuario']) &&
        $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK &&
        $_FILES['fichero_usuario']['size'] > 0 ) {
            $ficheroNombre = $_FILES['fichero_usuario']['name'];
            //Comprobamos si la extension es valida
            if (in_array(finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["fichero_usuario"]["tmp_name"]), $permitido)) {
                //Miramos que el nombre no este vacio y construimos la ruta para que el fichero o imagen se guarde 
                if (!$nombreVacio) {
                    $destinoFichero = './ficheros/' . $nombreSaneado . "." . pathinfo($ficheroNombre, PATHINFO_EXTENSION);
                    $nombreFichero = $nombreSaneado . "." . pathinfo($ficheroNombre, PATHINFO_EXTENSION); 
                    //Comprobamos que el nombre no se repita y lo subimos
                    if (!file_exists($destinoFichero)) {
                        $seHaSubido = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $destinoFichero);
                    } else { //Si entra en el else el nombre esta repetido
                        $nombreRepetido = true;
                    }
                }
            } else {
                $extensionInvalida = true;
            }
        } else {
            $ficheroVacio = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'lengua.php';
?>

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
            <li><a href="index.php?idioma=<?= $idioma ?>"><?= getCadena("inicio") ?></a></li>
            <li><strong><a href="subir.php?idioma=<?= $idioma ?>"><?= getCadena("subir") ?></a></strong></li>
            <li><a href="cloud.php?idioma=<?= $idioma ?>"><?= getCadena("ficheros") ?></a></li>
        </nav>
        <br>
        <form action="#" method="GET">
            <select name="idioma">
                <option value="es" <?php if ($idioma == 'es') {
                                        echo 'selected';
                                    } ?>>Español</option>
                <option value="en" <?php if ($idioma == 'en') {
                                        echo 'selected';
                                    } ?>>English</option>
            </select>
            <input type="submit" value="Ok">
        </form>
    </header>
    <h1><?= getCadena('tituloSubir') ?></h1>
        <!-- EL fichero se sube correctamente -->
    <?php if (isset($seHaSubido) && $seHaSubido) { ?>
        <p><?= $nombreFichero . getCadena('ficheroSubido') ?></p>
        <a href="subir.php?idioma=<?= $idioma ?>"><?= getCadena('subirOtroFichero') ?></a>

    <?php } else { ?>
    <!-- Comprobamos si las variables existen y si el booleano da verdadero se muestra el error-->
        <form action="#" method="POST" enctype="multipart/form-data"><!--Comprobamos si hay post y si existe la variable, para que se muestre el nombre junto al mensaje de error -->
            <p><?= getCadena('nombreFichero') ?> <input type="text" name="nombre" value="<?php if($_POST && isset($nombreSaneado)){echo $nombreSaneado;} ?>" ></p>
            <?php if (isset($nombreVacio) && $nombreVacio) {
                echo getCadena('errorNombreVacio');
            }  ?>
            <p><?= getCadena('seleccionFichero') ?> <input type="file" name="fichero_usuario"></p>
            <?php if (isset($ficheroVacio) && $ficheroVacio) {
                echo getCadena('errorFicheroVacio');
            } 
            if (isset($extensionInvalida) && $extensionInvalida) {
                echo getCadena('errorExtension');
            }
            if (isset($nombreRepetido) && $nombreRepetido) {
                echo getCadena('errorNombreRepetido');
            }
            ?>
            <br>
            <input type="submit" value="<?= getCadena('subirFichero') ?>">
        </form>
    <?php } ?>
</body>

</html>