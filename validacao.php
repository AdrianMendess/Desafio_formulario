<?php
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
        return false;
    } else {
        return true;
    }
}
if (validaNome($nome)) {
    echo ("Nome válido");
    echo '<br>';
} else {
    echo ("Nome inválido");
    echo '<br>';
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
        return false;
    }

    // Verifica se é uma sequência repetida 
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores para validar
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}

if (validaCPF($cpf)) {
    echo 'CPF válido';
    echo '<br>';
} else {
    echo 'CPF inválido';
    echo '<br>';
}



// Validação de Email

$email = $_POST['email'];
function validaEmail($email)
{
    $emailLimpo = sanitizaInput($email);
    if (filter_var($emailLimpo, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (validaEmail($email)) {
    echo ("Email valido");
    echo '<br>';
} else {
    echo ("Email inválido");
    echo '<br>';
}


// Validação de telefone

$telefone = $_POST['telefone'];

function validaTelefone($telefone)
{
    $telefoneLimpo = sanitizaInput($telefone);
    $telefone = preg_replace('/[^0-9]/is', '', $telefoneLimpo);

    if (strlen($telefone) != 11) {
        return false;
    }
    return true;
}

if (validaTelefone($telefone)) {
    echo ('Telefone válido');
    echo '<br>';
} else {
    echo ("Telefone inválido");
    echo '<br>';;
}



// Validação de municipios

$cidade = $_POST['municipio'];
$municipios = ['saoLuis', 'raposa', 'lumiar', 'ribamar'];

function validaCidade($cidade, $municipios)
{
    $cidadeLimpa = sanitizaInput($cidade);
    echo $cidadeLimpa;
    if (in_array($cidadeLimpa, $municipios)) {
        return true;
    }
    return false;
}

if (validaCidade($cidade, $municipios)) {
    echo ("Cidade válida");
    echo '<br>';
} else {
    echo ("Cidade inválida");
    echo '<br>';
}
