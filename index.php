<?php
session_start();
if(isset($_SESSION['erros'])){
    foreach ($_SESSION['erros'] as $erro){
        echo "<p>$erro</p>";
    }
    unset($_SESSION['erros']); // limpa após mostrar os erros
}
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

<body>

    <div class="box">
        <form action="validacao.php" method="post" id="form">
            <fieldset>

                <legend><b>Formulário de inscrições</b></legend>

                <div class="inputBox">
                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="inputuser"
                         />
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="cpf"
                        id="cpf"
                        class="inputuser"
                         />
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="inputuser"
                         />
                    <label for="email" class="labelInput">Email</label>
                </div>

                <div class="selectBox">
                    <select name="municipio" id="municipio">
                        <option value="São Luís">São Luís</option>
                        <option value="Raposa">Raposa</option>
                        <option value="Paço do Lumiar">Paço do Lumiar</option>
                        <option value="São José de Ribamar">São José de Ribamar</option>
                    </select>
                    <label for="municipio" class="labelInput">Município</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="telefone"
                        id="telefone"
                        class="inputuser"
                         />
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <input type="submit" name="enviar" id="enviar" value="Enviar"/>

            </fieldset>
        </form>

    </div>

</body>

</html>