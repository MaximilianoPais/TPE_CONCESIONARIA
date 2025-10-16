<?php
require_once './app/model/CategoriaModel.php';
require_once './app/view/CategoriaView.php';

class CategoriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    // (B) Listado de categorías
    public function listarCategorias($request) {
        $categorias = $this->model->getCategorias();
        $this->view->mostrarCategorias($categorias,$request->user);
    }

    
}
