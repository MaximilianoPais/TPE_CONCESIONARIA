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
    public function error($msg)
    {
        echo "<h2>$msg</h2><a href='" . BASE_URL . "listar'>Volver</a>";
    }
}