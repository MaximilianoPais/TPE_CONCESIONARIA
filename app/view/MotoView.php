<?php
class MotoView
{
    public function mostrarMotos($motos, $categorias, $user = null): void
    {
        require './templates/motoLista.phtml';
    }

    public function mostrarDetalleMoto($moto, $categorias, $user = null): void
    {
        require './templates/motoDetalle.phtml';
    }

    public function mostrarFormAlta($categorias, $user = null)
    {
        require './templates/formAltaMoto.phtml';
    }

    public function mostrarFormEditar($moto, $categorias, $user = null)
    {
        require './templates/formEditMoto.phtml';
    }
    public function mostrarConfirmacionBorrado($moto) {
    require './templates/confirmarBorrado.phtml';
}

}


