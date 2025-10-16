<?php
require_once './app/model/AuthModel.php';
require_once './app/view/AuthView.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }

    // Mostrar formulario de login
    public function showLoginForm($request) {
        $this->view->mostrarLogin("", $request->user);
    }

    // Procesar login
    public function login($request) {
        if (empty($_POST['usuario']) || empty($_POST['password'])) {
            return $this->view->mostrarLogin("", $request->user);

        }

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $userFromDB = $this->model->getUsuario($usuario);

        if ($userFromDB && password_verify($password, $userFromDB->contraseña)) {
            $_SESSION['USER_ID'] = $userFromDB->id;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            $_SESSION['ADMIN'] = $userFromDB->admin;

            header("Location: " . BASE_URL);

            exit();
        } else {
            $this->view->mostrarLogin("Usuario o contraseña incorrectos", $request->user);
        }
    }

    // Cerrar sesión
    public function logout($request) {
        session_destroy();
        header("Location: " . BASE_URL . "login");
        exit();
    }

    // metodo para crear hashes xd
    public function generarHash($texto)
{
    $hash = password_hash($texto, PASSWORD_BCRYPT);
    echo "Hash generado para '$texto':<br><br><code>$hash</code>";
}
    // USAR Y BORRRAR!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

public function generarPassword($texto)
{
    $password = password_hash($texto, PASSWORD_BCRYPT);
    echo "Password generado para '$texto':<br><br><code>$password</code>";
}
}

