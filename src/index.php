<?php
require 'config.php';

try {
    $stmt = $pdo->prepare("
        SELECT 
            associados.nome, 
            associados.email, 
            anuidades.ano, 
            anuidades.valor, 
            COALESCE(cobrancas.pago, 0) AS pago
        FROM 
            associados
        LEFT JOIN 
            cobrancas ON associados.id = cobrancas.associado_id
        LEFT JOIN 
            anuidades ON cobrancas.anuidade_id = anuidades.id
        ORDER BY 
            associados.nome, anuidades.ano;
    ");
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
    $resultados = []; // Inicializa $resultados como array vazio em caso de erro
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Associados</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .status-pago { color: green; }
        .status-pendente { color: red; }
    </style>
</head>
<body>
    <h1>Gerenciamento de Associados</h1>
    <p><a href="associado.php">Cadastrar novo associado</a> | <a href="anuidade.php">Gerenciar anuidades</a></p>

    <h2>Associados e Status de Anuidades</h2>
    <?php if (count($resultados) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ano</th>
                    <th>Valor (R$)</th>
                    <th>Status de Pagamento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $linha): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                        <td><?php echo htmlspecialchars($linha['email']); ?></td>
                        <td><?php echo htmlspecialchars($linha['ano']); ?></td>
                        <td><?php echo number_format($linha['valor'], 2, ',', '.'); ?></td>
                        <td class="<?php echo $linha['pago'] ? 'status-pago' : 'status-pendente'; ?>">
                            <?php echo $linha['pago'] ? 'Pago' : 'Pendente'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum associado ou anuidade encontrada.</p>
    <?php endif; ?>
</body>
</html>
