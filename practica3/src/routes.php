<?php
require_once "../src/controllers/usuarioControlador.php";
//obtenemos en una variable el método de trabajo; get, put, delete, push
$method = $_SERVER['REQUEST_METHOD'];
//$_SERVER[INFORMACIÓN DEL SERVIDOR QUE DESEAMOS]: Variable reservada para obtener la información del array del servidor



$path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : include_once "error/response.html";
// Remueve "/" del inicio


//Path almacena la ruta o archivo desde donde hacemos la petición

//importante anexar el /index.php/+Path utilizado
//por ejemplo: http://localhost/practica2/public/index.php/prueba 

echo $path;
//Mostramos el final de la url

// Divide la ruta por "/" para obtener el endpoint y el posible parámetro
$segments = explode('/', $path);



// Captura la cadena de consulta completa después del "?" (por ejemplo: "id=123&nombre=juan")
$queryString = $_SERVER['QUERY_STRING'];

// Parseamos la cadena de consulta a un arreglo asociativo
parse_str($queryString, $queryParams);

// Extraemos los parámetros de la consulta
$id = isset($queryParams['id']) ? $queryParams['id'] : null;

$usuarioController = New usuarioController;


if ($path == "usuarios") {
    switch ($method) {
        case 'GET':
            if($id==null){
                $usuarioController ->allUsers();
            }else{
                $usuarioController ->getById($id);
            }
            

            break;
        default:
            Response::json(['error' => 'Método no permitido'], 405);
    }
}else{
    include "error/response.html";
}

?>