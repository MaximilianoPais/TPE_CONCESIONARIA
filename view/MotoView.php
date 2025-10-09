<?php
class MotoView
{

    public function mostrarMotos($motos, $categorias)
    {
        echo "<h1>Listado de Motos</h1><ul>";
        echo "<h2>Categorías</h2><ul>";
        foreach ($categorias as $c) {
            echo "<li>
                <a href='router.php?action=motosCategoria/$c->id_tipo'>$c->nombre</a>
                </li>";
        }
        echo "<li>
            <a href='router.php?action=listar'>Todas las categorías</a>
            </li>";
        echo "</ul>";
        foreach ($motos as $m) {
            echo "<li>
                <a href='router.php?action=detalle/$m->id_moto'>$m->modelo</a> - $$m->precio - Tipo: " . $categorias[$m->id_tipo]->nombre ."
                </li>";
        }
        echo "</ul>";
    }

    public function mostrarDetalleMoto($moto, $categorias)
    {
        echo "<h1>Detalle de la moto</h1>";
        echo "<p><b>Modelo:</b> $moto->modelo</p>";
        echo "<p><b>Precio:</b> $$moto->precio</p>";
        echo "<p><b>Tipo:</b> " . $categorias[$moto->id_tipo]->nombre . "</p>";
    }
}

