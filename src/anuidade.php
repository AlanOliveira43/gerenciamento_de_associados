<?php
require 'config.php';
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    cadastrar_anuidade($ano, $valor);
    echo "Anuidade cadastrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Anuidade</title>
</head>
<body>
    <form action="anuidade.php" method="POST">
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" required><br>
        
        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" required><br>
        
        <button type="submit">Cadastrar Anuidade</button>
    </form>
</body>
</html>
