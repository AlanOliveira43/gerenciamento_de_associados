<?php
require 'config.php';
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $associado_id = $_POST['associado_id'];
    $anuidade_id = $_POST['anuidade_id'];
    pagar_anuidade($associado_id, $anuidade_id);
    echo "Anuidade paga com sucesso!";
}

// Listar associados e suas anuidades devidas
$associado_id = 1; // Exemplo de ID
$anuidades = calcular_anuidades_devidas($associado_id);

echo "<h2>Anuidades Devidas</h2>";
foreach ($anuidades as $anuidade) {
    echo "Ano: {$anuidade['ano']}, Valor: {$anuidade['valor']}, Pago: " . ($anuidade['pago'] ? 'Sim' : 'Não') . "<br>";
}
?>

<form action="cobranca.php" method="POST">
    ID do Associado: <input type="number" name="associado_id" required><br>
    ID da Anuidade: <input type="number" name="anuidade_id" required><br>
    <button type="submit">Pagar Anuidade</button>
</form>
