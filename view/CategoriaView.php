<?php
class CategoriaView
{
    public function mostrarCategorias($categorias)
    {
        if (empty($categorias)) {
            echo "<h1>No hay motos disponibles en esta categoría</h1>";
            

        } else {
            echo "<h1>Listado de Categorías</h1><ul>";
            foreach ($categorias as $c) {
                echo "<li>
                <a href='router.php?action=motosCategoria/$c->id_tipo'>$c->nombre</a>
                </li>";
            }
            echo "</ul>";
            
        }
    }
}
