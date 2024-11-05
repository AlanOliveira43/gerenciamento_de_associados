<?php
require 'config.php';
require 'funcoes.php';

$status = verificar_status_associados();
echo "<h2>Status dos Associados</h2>";
foreach ($status as $assoc) {
    echo "Nome: {$assoc['nome']}, Anuidades Pendentes: {$assoc['anuidades_pendentes']}<br>";
}
?>
