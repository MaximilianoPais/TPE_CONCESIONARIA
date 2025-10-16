<?php
require_once './app/model/db.php';

class AuthModel {
    private $db;

    public function __construct() {
        $this->db = getConnection();
      
    }

    public function getUsuario($usuario) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
