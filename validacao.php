<?php
// Validação de CPF
$cpf = $_POST['cpf'];

function validaCPF($cpf)
{
    //mostra somente numeros
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

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
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (validaEmail($email)) {
    echo("Email valido");
    echo '<br>';
} else {
    echo("Email inválido");
    echo '<br>';
}


// Validação de telefone

$telefone = $_POST['telefone'];

function validaTelefone($telefone)
{
    $telefone = preg_replace('/[^0-9]/is', '', $telefone);

    if (strlen($telefone) != 11) {
        return false;
    }
    return true;
}

if (validaTelefone($telefone)) {
    echo('Telefone válido');
    echo '<br>';
} else {
    echo("Telefone inválido");
    echo '<br>';;
}


// Validação de municipios

$cidade = $_POST['municipio'];
$municipios = ['saoLuis', 'raposa', 'lumiar', 'ribamar'];
function validaCidade($cidade, $municipios){
    if(in_array($cidade, $municipios)){
        return true;
    }
    return false;
}

if(validaCidade($cidade, $municipios)){
echo("Cidade válida");
echo '<br>';
} else {
    echo("Cidade inválida");
    echo '<br>';;
}