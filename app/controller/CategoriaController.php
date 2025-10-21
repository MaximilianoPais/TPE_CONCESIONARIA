<?php
require_once './app/model/CategoriaModel.php';
require_once './app/view/CategoriaView.php';

class CategoriaController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    // (B) Listado de categorías
    public function listarCategorias($request)
    {
        $categorias = $this->model->getCategorias();
        $this->view->mostrarCategorias($categorias, $request->user);
    }


    public function agregarCategoria()
    {

        $tipo_nombre = $_POST['tipo_nombre'];
        $imagen = $_POST['imagen'] ?? null;
        // VALIDAR QUE VENGAN TODOS LOS DATOS
        if (empty($tipo_nombre)|| empty($imagen)) {
            $this->error('ERROR');
            return;
        }
        $this->model->insertCategoria($tipo_nombre, $imagen);
        header("Location: " . BASE_URL . "categorias");
    }



    public function mostrarFormAlta()
    {
        $this->view->mostrarFormAlta();

    }


    public function eliminarCategoria($id)
    {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL . "login");
            die();
        }

        $this->model->deleteCategoria($id);
        header("Location: " . BASE_URL . "");

    }


    public function mostrarFormEditar($id)
    {
        $categoria = $this->model->getCategoriaById($id);
        $this->view->mostrarFormEditar($categoria);
    }

    public function editarCategoria($id)
    {
        $tipo_nombre = $_POST['tipo_nombre'];
        $imagen = $_POST['imagen'] ?? null;
        // VALIDAR QUE VENGAN TODOS LOS DATOS
        if (empty($tipo_nombre)) {
            $this->error('ERROR');
            return;
        }
        $this->model->updateCategoria($id, $tipo_nombre,$imagen);
        header("Location: " . BASE_URL . "categorias");
    }


    private function error($msg)
    {
        echo "<h2>$msg</h2><a href='" . BASE_URL . "listar'>Volver</a>";
    }


}
