<?php
class MotoView {

    public function mostrarMotos($motos) {
        echo "<h1>Listado de Motos</h1><ul>";
        foreach ($motos as $m) {
            echo "<li>
                <a href='router.php?action=detalle/$m->id_moto'>$m->modelo</a> - $$m->precio - Tipo: $m->tipo
                </li>";
        }
        echo "</ul>";
    }

    public function mostrarDetalleMoto($moto) {
        echo "<h1>Detalle de la moto</h1>";
        echo "<p><b>Modelo:</b> $moto->modelo</p>";
        echo "<p><b>Precio:</b> $$moto->precio</p>";
        echo "<p><b>Tipo:</b> $moto->tipo</p>";
    }
}
