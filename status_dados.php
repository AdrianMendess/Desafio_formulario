<?php
include_once 'conexao.php';

// por municipio
$stmt = $pdo -> prepare("SELECT municipio, COUNT(*) as total FROM inscricoes GROUP BY municipio ORDER BY total DESC; 
");
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


// por dia
$stmt = $pdo -> prepare("SELECT DATE(criado_em) as dia, COUNT(*) as total FROM inscricoes WHERE MONTH(criado_em) = MONTH(CURDATE()) AND YEAR(criado_em) = YEAR(CURDATE()) GROUP BY dia ORDER BY total ASC;");
$stmt->execute();
$resultado1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dadosFinais = [
    'porMunicipio' => $resultado,
    'porDia' => $resultado1
];

header('content-Type: application/json'); // Avisa ao navegador que a resposta é json
echo json_encode($dadosFinais);