<?php
session_start();
include_once 'conexao.php';

// Validação de nome
function sanitizaInput($valor)
{ // Função para sanitizar input de todas as validações
    $valor = strip_tags($valor); // remove tags html
    $valor = trim($valor); //remove espaços no inicio e no final
    return $valor;
}


$nome = $_POST['nome'];

function validaNome($nome)
{
    $nomeLimpo = sanitizaInput($nome);
    $nome = preg_replace('/[^a-zA-ZÀ-ÿ\s]/', '', $nomeLimpo); //se nao for letras e espaços, remove
    if (strlen($nome) < 3) {
        return ['valido' => false, 'valor' => $nome];
    } else {
        return ['valido' => true, 'valor' => $nome];
    }
}


// Validação de CPF
$cpf = $_POST['cpf'];

function validaCPF($cpf)
{
    $cpfLimpo = sanitizaInput($cpf);
    //mostra somente numeros
    $cpf = preg_replace('/[^0-9]/is', '', $cpfLimpo);

    // Verifica se tem 11 dígitos
    if (strlen($cpf) != 11) {
        return ['valido' => false, 'valor' => $cpf];
    }

    // Verifica se é uma sequência repetida 
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return ['valido' => false, 'valor' => $cpf];
    }

    // Calcula os dígitos verificadores para validar
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return ['valido' => false, 'valor' => $cpf];
        }
    }

    return ['valido' => true, 'valor' => $cpf];
}



// Validação de Email

$email = $_POST['email'];
function validaEmail($email)
{
    $emailLimpo = sanitizaInput($email);
    if (filter_var($emailLimpo, FILTER_VALIDATE_EMAIL)) {
        return ['valido' => true, 'valor' => $email];
    } else {
        return ['valido' => false, 'valor' => $email];
    }
}


// Validação de municipios

$cidade = $_POST['municipio'];
$municipios = ['São Luís', 'Raposa', 'Paço do Lumiar', 'São José de Ribamar'];

function validaCidade($cidade, $municipios)
{
    $cidadeLimpa = sanitizaInput($cidade);
    if (in_array($cidadeLimpa, $municipios)) {
        return ['valido' => true, 'valor' => $cidade];
    }
    return ['valido' => false, 'valor' => $cidade];
}


// Validação de telefone

$telefone = $_POST['telefone'];

function validaTelefone($telefone)
{
    $telefoneLimpo = sanitizaInput($telefone);
    $telefone = preg_replace('/[^0-9]/is', '', $telefoneLimpo);

    if (strlen($telefone) != 11) {
        return ['valido' => false, 'valor' => $telefone];
    }
    return ['valido' => true, 'valor' => $telefone];
}


$resultNome = validaNome($nome);
$resultCpf = validaCPF($cpf);
$resultEmail = validaEmail($email);
$resultCidade = validaCidade($cidade, $municipios);
$resultTelefone = validaTelefone($telefone);

if ($resultNome['valido'] && $resultCpf['valido'] && $resultEmail['valido'] && $resultCidade['valido'] && $resultTelefone['valido']) {

    $stmt = $pdo->prepare("INSERT INTO inscricoes(nome, cpf, email, municipio, telefone) VALUES (:nome, :cpf, :email, :municipio, :telefone)");

    $stmt->execute([
        ':nome' => $resultNome['valor'],
        ':cpf' => $resultCpf['valor'],
        ':email' => $resultEmail['valor'],
        ':municipio' => $resultCidade['valor'],
        ':telefone' => $resultTelefone['valor']
    ]);
    echo "sucesso!";
} else {
    $erros = [];

    if (!$resultNome['valido']) {
        $erros[] = "Nome inválido - Deve conter pelo menos 3 letras.";
    }
    if (!$resultCpf['valido']) {
        $erros[] = "CPF inválido - Verifique os numeros digitados.";
    }
    if (!$resultEmail['valido']) {
        $erros[] = "Email inválido - Formato de email incorreto.";
    }
    if (!$resultCidade['valido']) {
        $erros[] = "Cidade inválida - Opção não disponivel.";
    }
    if (!$resultTelefone['valido']) {
        $erros[] = "Telefone inválido - Deve conter 11 digitos.";
    }

    $_SESSION['erros'] = $erros; // armazena as mensagens do que der erro e poderá ser usado no index.
    header('location: index.php');
    exit();
}
