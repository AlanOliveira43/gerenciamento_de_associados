<?php
require 'config.php';

function cadastrar_associado($nome, $email, $cpf, $data_filiacao) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO associados (nome, email, cpf, data_filiacao) VALUES (:nome, :email, :cpf, :data_filiacao)");
    $stmt->execute([':nome' => $nome, ':email' => $email, ':cpf' => $cpf, ':data_filiacao' => $data_filiacao]);
}
function cadastrar_anuidade($ano, $valor) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO anuidades (ano, valor) VALUES (:ano, :valor)");
    $stmt->execute([':ano' => $ano, ':valor' => $valor]);
}
function calcular_anuidades_devidas($associado_id) {
    global $pdo;
    $data_filiacao = $pdo->query("SELECT data_filiacao FROM associados WHERE id = $associado_id")->fetchColumn();
    $ano_filiacao = date('Y', strtotime($data_filiacao));

    // Selecionar anuidades devidas
    $stmt = $pdo->prepare("SELECT a.ano, a.valor, c.pago
                           FROM anuidades a
                           LEFT JOIN cobrancas c ON a.id = c.anuidade_id AND c.associado_id = :associado_id
                           WHERE a.ano >= :ano_filiacao");
    $stmt->execute([':associado_id' => $associado_id, ':ano_filiacao' => $ano_filiacao]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function pagar_anuidade($associado_id, $anuidade_id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE cobrancas SET pago = 1 WHERE associado_id = :associado_id AND anuidade_id = :anuidade_id");
    $stmt->execute([':associado_id' => $associado_id, ':anuidade_id' => $anuidade_id]);
}
function verificar_status_associados() {
    global $pdo;
    $stmt = $pdo->query("SELECT a.nome, SUM(CASE WHEN c.pago = 0 THEN 1 ELSE 0 END) as anuidades_pendentes
                         FROM associados a
                         LEFT JOIN cobrancas c ON a.id = c.associado_id
                         GROUP BY a.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
