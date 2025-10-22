<?php
require_once './app/model/config.php';

function getConnection(): PDO {
    try {
        $dsn = "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8";
        $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        autoDeploy($pdo); //se ejecuta una sola vez si no hay tablas

        return $pdo;

    } catch (PDOException $e) {
        die("Error de conexión a la BD: " . $e->getMessage());
    }
}

function autoDeploy(PDO $pdo): void {
    $query = $pdo->query('SHOW TABLES');
    $tables = $query->fetchAll();

    if (count($tables) == 0) {
        // Cargamos el SQL exportado desde phpMyAdmin
        $sqlFile = './concesionaria.sql';

        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $pdo->exec($sql);
        } else {
            die("Archivo SQL de despliegue automático no encontrado.");
        }
    }
}
