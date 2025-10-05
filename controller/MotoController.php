<?php
require_once './model/MotoModel.php';
require_once './view/MotoView.php';

class MotoController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new MotoModel();
        $this->view = new MotoView();
    }

    // (A) Listado de motos
    public function listarMotos() {
        $motos = $this->model->getMotos();
        $categorias = $this->model->getCategorias();
        $this->view->mostrarMotos($motos, $categorias);
    }

    // (A) Detalle de moto
    public function mostrarDetalle($id) {
        $moto = $this->model->getMotoById($id);
        $this->view->mostrarDetalleMoto($moto);
    }

    // (B) Motos por categoría
    public function listarPorCategoria($id_tipo) {
        $motos = $this->model->getMotosByCategoria($id_tipo);
        $categorias = $this->model->getCategorias();
        $this->view->mostrarMotos($motos, $categorias);
    }
}
