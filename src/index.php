<?php
require 'config.php';

try {
    $pdo = new PDO("pgsql:host=localhost;dbname=user_database", "user", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Associados</title>
    <link rel="stylesheet" href="/src/styles.css">
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .status-pago { color: green; }
        .status-pendente { color: red; }
        .btn-refresh {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Gerenciamento de Associados</h1>
    <p>
        <a href="associado.php">Cadastrar novo associado</a> | 
        <a href="anuidade.php">Gerenciar anuidades</a>
    </p>
    
    <a href="index.php" class="btn-refresh">Atualizar</a>

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
