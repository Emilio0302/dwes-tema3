<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

// Este array contiene las traducciones
$cadenas = [
    'bienvenida' => [
        'es' => 'Bienvenid@ a mi sitio web',
        'en' => 'Welcome to my website'
    ],
    'inicio' => [
        'es' => 'Inicio',
        'en' => 'Home'
    ],
    'subir' => [
        'es' => 'Subir',
        'en' => 'Upload'
    ],
    'ficheros' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],
    'administrar' => [
        'es' => 'Desde aqui puedes empezar a administrar ficheros',
        'en' => 'From here you can start managing files'
    ],
    'boton' => [
        'es' => 'Empieza a subir ficheros',
        'en' => 'Start uploading files'
    ],
    'tituloSubir' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],
    'nombreFichero' => [
        'es' => 'Nombre del fichero:',
        'en' => 'File name:'
    ],
    'seleccionFichero' => [
        'es' => 'Selecciona el fichero:',
        'en' => 'Select file:'
    ],
    'subirFichero' => [
        'es' => 'Subir fichero',
        'en' => 'Upload file'
    ],
    'tusFicheros' => [
        'es' => 'Tus ficheros',
        'en' => 'Your files'
    ],
    'tusImagenes' => [
        'es' => 'Tus imagenes',
        'en' => 'Your images'
    ],
    'subirOtroFichero' => [
        'es' => 'Pulsa aquí para subir otro fichero',
        'en' => 'Press here to upload another file'
    ],
    'ficheroSubido' => [
        'es' => ' se ha subido correctamente',
        'en' => ' uploaded successfully'
    ],
    'errorFicheroVacio' => [
        'es' => 'Error: no hay fichero',
        'en' => 'Error: there is no file'
    ],
    'errorNombreVacio' => [
        'es' => 'Error: El campo no puede estar vacio',
        'en' => 'Error: The field cannot be empty'
    ],
    'errorNombreRepetido' => [
        'es' => 'Error: Ya existe un fichero con ese nombre',
        'en' => 'Error: A file with that name already exists'
    ],
    'errorExtension' => [
        'es' => 'Error: Esta extension no es valida',
        'en' => 'Error: This extension is not valid'
    ],
    'noHayFicheros' => [
        'es' => 'No hay ficheros subidos',
        'en' => 'There are no files uploaded'
    ],
    'noHayImagenes' => [
        'es' => 'No hay imagenes subidas',
        'en' => 'There are no images uploaded'
    ] 
];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}