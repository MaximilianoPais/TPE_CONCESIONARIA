<?php
require_once './app/model/db.php'; // archivo de conexión

class MotoModel
{
    private $db;

    public function __construct()
    {
        $this->db = getConnection();
    }

    // (A) Listado de todas las motos
    public function getMotos()
    {
        $query = $this->db->prepare("SELECT * FROM motos");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // (A) Detalle de una moto
public function getMotoById(int $id): ?object 
{
    $query = $this->db->prepare("
        SELECT m.*, c.tipo_nombre AS tipo_nombre
        FROM motos m
        LEFT JOIN categorias c ON m.id_tipo = c.id_tipo
        WHERE m.id_moto = ?
    ");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $moto = $query->fetch(PDO::FETCH_OBJ);
    return $moto ?: null;
}


    // (B) Listado de motos por categoría
    public function getMotosByCategoria($id_tipo)
    {
        $query = $this->db->prepare("SELECT m.*, t.tipo_nombre AS tipo 
                                     FROM motos m 
                                     JOIN categorias t ON m.id_tipo = t.id_tipo
                                     WHERE m.id_tipo = ?");
        $query->execute([$id_tipo]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategorias()
    {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    // app/model/MotoModel.php
    public function insertMoto($modelo, $precio, $id_tipo, $caracteristicas, $imagen = null)
    {
        $query = $this->db->prepare("INSERT INTO motos (modelo, precio, id_tipo, caracteristicas, imagen) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$modelo, $precio, $id_tipo, $caracteristicas, $imagen]);
    }

    public function deleteMoto($id)
    {
        $query = $this->db->prepare("DELETE FROM motos WHERE id_moto = ?");
        $query->execute([$id]);
    }

    public function updateMoto($id, $modelo, $precio, $id_tipo, $caracteristicas, $imagen = null)
    {
        $query = $this->db->prepare("UPDATE motos SET modelo = ?, precio = ?, id_tipo = ?, caracteristicas = ?, imagen = ? WHERE id_moto = ?");
        $query->execute([$modelo, $precio, $id_tipo, $caracteristicas, $imagen, $id]);
    }



}



