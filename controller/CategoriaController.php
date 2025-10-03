<?php
require_once './model/CategoriaModel.php';
require_once './view/CategoriaView.php';

class CategoriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    // (B) Listado de categorías
    public function listarCategorias() {
        $categorias = $this->model->getCategorias();
        $this->view->mostrarCategorias($categorias);
    }

    
}
