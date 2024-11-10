<?php
$host = 'localhost';        // Servidor do PostgreSQL
$dbname = 'associacao';     // Nome do banco de dados criado
$user = 'seu_usuario';      // Usuário do PostgreSQL
$password = 'sua_senha';    // Senha do PostgreSQL
$port = '5432';             // Porta padrão do PostgreSQL

try {
    // Criar a conexão com o PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o banco de dados bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
