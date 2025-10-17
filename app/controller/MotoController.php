<?php
require_once './app/model/MotoModel.php';
require_once './app/view/MotoView.php';

class MotoController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MotoModel();
        $this->view = new MotoView();
    }

    // (A) Listado de motos
    public function listarMotos($request): void
    {
        $motos = $this->model->getMotos();
        $categorias = $this->model->getCategorias();

        $categoriasPorId = [];
        foreach ($categorias as $c) {
            $categoriasPorId[$c->id_tipo] = $c;   // Mapeo por ID, la db tiene id_tipo empezando en 1 y no en 0, entonces armo un array asociativo
        }

        $this->view->mostrarMotos($motos, $categoriasPorId, $request->user);

    }

    // (A) Detalle de moto
    public function mostrarDetalle($id): void
    {
        $moto = $this->model->getMotoById($id);
        if (!$moto) {
            echo "<h2>La moto no existe.</h2><a href='" . BASE_URL . "'>Volver</a>";
            return;
        }

        $categorias = $this->model->getCategorias();
        $categoriasPorId = [];
        foreach ($categorias as $c) {
            $categoriasPorId[$c->id_tipo] = $c;
        }

        $this->view->mostrarDetalleMoto($moto, $categoriasPorId);
    }




    // (B) Motos por categoría
    public function listarPorCategoria($id_tipo)
    {
        $motos = $this->model->getMotosByCategoria($id_tipo);
        $categorias = $this->model->getCategorias();

        $categoriasPorId = [];
        foreach ($categorias as $c) {
            $categoriasPorId[$c->id_tipo] = $c;
        }
        $this->view->mostrarMotos($motos, $categoriasPorId);
    }
    public function mostrarFormAlta()
    {
        $categorias = $this->model->getCategorias();
        $this->view->mostrarFormAlta($categorias);
    }

    public function agregarMoto()
    {

        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $id_tipo = $_POST['id_tipo'];
        $caracteristicas = $_POST['caracteristicas'];
        $imagen = $_POST['imagen'] ?? null;
        // VALIDAR QUE VENGAN TODOS LOS DATOS Y QUE EL PRECIO SEA NUMERICO
        if (empty($modelo) || empty($precio) || empty($id_tipo) || empty($caracteristicas) || empty($imagen)) {
            $this->error('ERROR');
            return;
        }
        $this->model->insertMoto($modelo, $precio, $id_tipo, $caracteristicas, $imagen);
        header("Location: " . BASE_URL . "");
    }

    public function eliminarMoto($id)
    {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL . "login");
            die();
        }

        $this->model->deleteMoto($id);
        header("Location: " . BASE_URL . "");
    }

    public function mostrarFormEditar($id)
    {
        $moto = $this->model->getMotoById($id);
        $categorias = $this->model->getCategorias();
        $this->view->mostrarFormEditar($moto, $categorias);
    }

    public function editarMoto($id)
    {
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $id_tipo = $_POST['id_tipo'];
        $caracteristicas = $_POST['caracteristicas'];
        $imagen = $_POST['imagen'] ?? null;

        $this->model->updateMoto($id, $modelo, $precio, $id_tipo, $caracteristicas, $imagen);
        header("Location: " . BASE_URL . "");
    }
    private function error($msg)
    {
        echo "<h2>$msg</h2><a href='" . BASE_URL . "listar'>Volver</a>";
    }
}
