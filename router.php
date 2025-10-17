<?php
require_once './app/controller/MotoController.php';
require_once './app/controller/CategoriaController.php';
// El usuario es webAdmin y la contraseña es admin 
require_once './app/controller/AuthController.php';
require_once './app/middleware/SessionMiddleware.php';
require_once './app/middleware/GuardMiddleware.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = $_GET['action'] ?? 'listarMotos';
$params = explode('/', $action);

// la pagina principal es listar motos
if (isset($params[0]) && $params[0]
    === '') {
    $params[0] = 'listarMotos';
}

// Crear request y ejecutar middleware de sesión
$request = new stdClass();
$request = (new SessionMiddleware())->run($request);


$motoController = new MotoController();
$categoriaController = new CategoriaController();
$authController = new AuthController();

switch ($params[0]) {
    
    // ------------------------- Motos -------------------------
    case 'listarMotos':
    $motoController->listarMotos($request);
    break;


    case 'detalle':
        $motoController->mostrarDetalle($params[1]);
        break;
    // ------------------------- Motos por categoría -------------------------
    case 'listarCategorias':
        $categoriaController->listarCategorias($request);
        break;
    case 'motosCategoria':
        $motoController->listarPorCategoria($params[1]);
        break;

    // CRUD protegido con login
    case 'formAltaMoto':
        $request = (new GuardMiddleware())->run($request);
        $motoController->mostrarFormAlta();
        break;

    case 'agregarMoto':
        $request = (new GuardMiddleware())->run($request);
        $motoController->agregarMoto();
        break;

    case 'formEditarMoto':
        $request = (new GuardMiddleware())->run($request);
        $motoController->mostrarFormEditar($params[1]);
        break;

    case 'editarMoto':
        $request = (new GuardMiddleware())->run($request);
        $motoController->editarMoto($params[1]);
        break;

    case 'eliminarMoto':
        $request = (new GuardMiddleware())->run($request);
        $motoController->eliminarMoto($params[1]);
        break;

    case 'formAltaCategoria':
        $request = (new GuardMiddleware())->run($request);
        $categoriaController->mostrarFormAlta();
        break;

    case 'agregarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $categoriaController->agregarCategoria();
        break;

    case 'formEditarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $categoriaController->mostrarFormEditar($params[1]);
        break;

    case 'editarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $categoriaController->editarCategoria($params[1]);
        break;

    case 'eliminarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $categoriaController->eliminarCategoria($params[1]);
        break;

    // ------------------------- Categorías -------------------------
    case 'categorias':
        $categoriaController->listarCategorias($request);
        break;

    // ------------------------- Autenticación -------------------------
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            $authController->login($request);
        else
            $authController->showLoginForm($request);
        break;

    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $authController->logout($request);
        break;
    //  --------!!!!!!!!!!!!!! USAR Y BORRRAR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    case 'hash':
    (new AuthController())->generarHash($params[1]);
    break;


}
