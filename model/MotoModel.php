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
        $this->view->mostrarMotos($motos);
    }

    // (A) Detalle de moto
    public function mostrarDetalle($id) {
        $moto = $this->model->getMotoById($id);
        $this->view->mostrarDetalleMoto($moto);
    }

    // (B) Motos por categoría
    public function listarPorCategoria($id_tipo) {
        $motos = $this->model->getMotosByCategoria($id_tipo);
        $this->view->mostrarMotos($motos);
    }
}

