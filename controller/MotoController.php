<?php
require_once './model/MotoModel.php';
require_once './view/MotoView.php';

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
    public function listarMotos()
    {
        $motos = $this->model->getMotos();
        $categorias = $this->model->getCategorias();

        $categoriasPorId = [];
        foreach ($categorias as $c) {
            $categoriasPorId[$c->id_tipo] = $c;   // Mapeo por ID, la db tiene id_tipo empezando en 1 y no en 0, entonces armo un array asociativo
        }

        $this->view->mostrarMotos($motos, $categoriasPorId);
    }

    // (A) Detalle de moto
    public function mostrarDetalle($id)
    {
        $moto = $this->model->getMotoById($id);
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
}
