<?php
require_once './controller/MotoController.php';
require_once './controller/CategoriaController.php';

$action = 'listar'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$motoController = new MotoController();
$categoriaController = new CategoriaController();

switch ($params[0]) {
    case 'listar':
        $motoController->listarMotos();
        break;
    case 'detalle':
        $motoController->mostrarDetalle($params[1]);
        break;
    case 'categorias':
        $categoriaController->listarCategorias();
        break;
    case 'motosCategoria':
        $motoController->listarPorCategoria($params[1]);
        break;
    default:
        echo "404 - Página no encontrada";
        break;
}
