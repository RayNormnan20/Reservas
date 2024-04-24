<?php

require_once 'config/config.php';

require_once 'helpers/funciones.php';

// Verificar si existe la Ruta Am¿dmin
$isAdmin = strpos($_SERVER['REQUEST_URI'], '/' . ADMIN) !== false;
// Comprobar si existe  GET para crear URLs amigables
$ruta = empty($_GET['url']) ? 'principal/index' : $_GET['url'];
// Crear Array a partir de la ruta
$array = explode('/', $ruta );

// VAlidar si nos encontramos en ña ruta ADMIN
if ($isAdmin && (count($array) == 1 
|| (count($array) == 2 && empty($array[1]))) 
&& $array[0] == ADMIN) {
    // Crear controlador
    $controller = 'Admin';
    $metodo = 'login';
} else {
    $indiceUrl = ($isAdmin) ? 1 : 0;
    $controller = ucfirst($array[$indiceUrl]);
    $metodo = 'index';
}

// Validar metodos
$parametro = '';
$metdoIndice = ($isAdmin) ? 2 : 1;
if(!empty($array[$metdoIndice]) && $array[$metdoIndice] != '') {
    $metodo = $array[$metdoIndice];
}

// Validar Parametros
$parametro = '';
$parametroIndice = ($isAdmin) ? 3 : 2;
if(!empty($array[$parametroIndice]) && $array[$parametroIndice] != '') {
    for($i = $parametroIndice; $i < count($array); $i++) {
        $parametro .= $array[$i] . ',';

    }
    $parametro = trim($parametro, ',');
}

// Llamr Autoload
require_once "config/app/Autoload.php";


// Validar directorio de controladores
$dirControllers = ($isAdmin) ? 'controller/admin/' . $controller . '.php' : 'controller/principal/' . $controller . '.php';
if (file_exists($dirControllers)) {
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller -> $metodo($parametro);
    } else {
        echo 'METODO NO EXISTE';
    }
    
} else {
    echo 'COMTROLADOR NO EXISTE';
}

?>