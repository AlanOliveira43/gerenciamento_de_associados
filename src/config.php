<?php
$host = 'localhost';
$dbname = 'associacao';
$username = 'seu_usuario';
$password = 'sua_senha';

try {
    // Conexão com PostgreSQL
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
