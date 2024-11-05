<?php
require 'config.php';
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_filiacao = $_POST['data_filiacao'];
    cadastrar_associado($nome, $email, $cpf, $data_filiacao);
    echo "Associado cadastrado com sucesso!";
}
?>

<form action="associado.php" method="POST">
    Nome: <input type="text" name="nome" required><br>
    E-mail: <input type="email" name="email" required><br>
    CPF: <input type="text" name="cpf" required><br>
    Data de Filiação: <input type="date" name="data_filiacao" required><br>
    <button type="submit">Cadastrar</button>
</form>
