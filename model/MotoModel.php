<?php
require_once './model/db.php'; // archivo de conexión

class MotoModel {
    private $db;

    public function __construct() {
        $this->db = getConnection();
    }

    // (A) Listado de todas las motos
    public function getMotos() {
        $query = $this->db->prepare("SELECT m.*, t.nombre AS tipo 
                                     FROM motos m 
                                     JOIN tipo_motos t ON m.id_tipo = t.id_tipo");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // (A) Detalle de una moto
    public function getMotoById($id) {
        $query = $this->db->prepare("SELECT m.*, t.nombre AS tipo 
                                     FROM motos m 
                                     JOIN tipo_motos t ON m.id_tipo = t.id_tipo
                                     WHERE id_moto = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // (B) Listado de motos por categoría
    public function getMotosByCategoria($id_tipo) {
        $query = $this->db->prepare("SELECT m.*, t.nombre AS tipo 
                                     FROM motos m 
                                     JOIN tipo_motos t ON m.id_tipo = t.id_tipo
                                     WHERE m.id_tipo = ?");
        $query->execute([$id_tipo]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
