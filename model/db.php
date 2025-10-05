<?php

function getConnection() {
    try {
        $host = '127.0.0.1';     // o 'localhost'
        $dbname = 'concesionaria';
        $user = 'root';          // tu usuario de MySQL
        $password = '';          // tu contraseña de MySQL (vacía por defecto en XAMPP)

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        die(" Error de conexión a la BD: " . $e->getMessage());
    }
}
