<?php
include_once 'conexao.php';

$stmt = $pdo -> prepare("SELECT municipio, COUNT(*) as total FROM inscricoes GROUP BY municipio ORDER BY total DESC; 
");
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('content-Type: application/json'); // Avisa ao navegador que a resposta é json
echo json_encode($resultado);