<?php
class CategoriaView
{
    public function mostrarCategorias($categorias, $user=null)
    {
        
        require_once './templates/categoriaLista.phtml';
    }

    public function mostrarFormAlta()
    {
        require_once './templates/formAltaCategoria.phtml';
    }

    public function mostrarFormEditar($categoria)
    {
        require_once './templates/formEditCategoria.phtml';
    }
}