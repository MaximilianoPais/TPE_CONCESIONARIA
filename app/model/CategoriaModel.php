<?php
require_once './app/model/db.php';

class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = getConnection();
    }

    // (B) Listado de todas las categorías
    public function getCategorias() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoriaById($id) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE id_tipo = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertCategoria($tipo_nombre) {
        $query = $this->db->prepare("INSERT INTO categorias (tipo_nombre) VALUES (?)");
        $query->execute([$tipo_nombre]);
    }

    public function deleteCategoria($id) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE id_tipo = ?");
         $query->execute([$id]);
    }

    public function updateCategoria($id, $tipo_nombre) {
        $query = $this->db->prepare("UPDATE categorias SET tipo_nombre = ? WHERE id_tipo = ?");
        $query->execute([$tipo_nombre, $id]);
    }


}
