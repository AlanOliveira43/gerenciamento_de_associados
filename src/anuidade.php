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

<form action="anuidade.php" method="POST">
    Ano: <input type="number" name="ano" required><br>
    Valor: <input type="text" name="valor" required><br>
    <button type="submit">Cadastrar Anuidade</button>
</form>
