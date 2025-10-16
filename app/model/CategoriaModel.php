<?php
require_once './app/model/db.php';

class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = getConnection();
    }

    // (B) Listado de todas las categorías
    public function getCategorias() {
        $query = $this->db->prepare("SELECT * FROM tipo_motos");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoriaById($id) {
        $query = $this->db->prepare("SELECT * FROM tipo_motos WHERE id_tipo = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
