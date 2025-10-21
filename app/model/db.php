<?php

function getConnection() {
    try {
        $host = 'localhost';     
        $dbname = 'concesionaria';
        $user = 'root';          
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        die(" Error de conexión a la BD: " . $e->getMessage());
    }
}
